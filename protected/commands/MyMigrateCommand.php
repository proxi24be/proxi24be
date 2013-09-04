<?php

class MyMigrateCommand extends CConsoleCommand
{
	/**
	 * Execute the migration script.
	 * @return int The status of the executed script.
	 */
	public function actionExecute()
	{
		echo "*** Warning this action will reset all the previous settings ! ***" . PHP_EOL;
		echo "Do you want to continue ? (yes or no) ";
		$input = fgets(STDIN);
		if (strpos($input, 'yes') !== false)
		{
		// $pwd = exec('pwd');
		// $command = "$pwd/yiic migrate";
		// system($command);
		}
		else
		{
			echo 'operation aborted.' . PHP_EOL;
		}
	}
	
	/**
	 * Init the RBAC tables to the default roles.
	 * @return int The status of the executed script.
	 */
	public function actionInitRbac()
	{
		try
		{
			include_once('configure/RbacBusinessRule.inc.php');
			$connection = Yii::app()->rbac_db;
			$connection->createCommand("delete from auth_item;")->execute();
        	$connection->createCommand("delete from auth_item_child;")->execute();
        	$connection->createCommand("delete from auth_assignment;")->execute();

			// Yii by default has implemented an CAuthManager.
			// So it is more convenient to use that class (the default schema of the tables
			// have been inspired by Yii).
			$auth_manager = Yii::app()->authManager;
	        $auth_manager->createRole("authenticated");
	        $auth_manager->createRole("pro");
	        $auth_manager->createRole("amateur");
	        $auth_manager->createRole("admin");

	        $auth_manager->createTask("read public ads");
	        $auth_manager->createTask("edit own ads");

	        $auth_manager->createOperation('read_ads');
	        $auth_manager->createOperation('crud_own_ads', 'The owner is able to do whatever she/he wants (CRUD) with her/his ads', $rbac_business_rule['edit own ads']);

	        $auth_manager->addItemChild('pro', 'authenticated');
	        $auth_manager->addItemChild('amateur', 'authenticated');
	        $auth_manager->addItemChild('admin', 'authenticated');
	        $auth_manager->addItemChild('authenticated', 'edit own ads');

	        //The owner can do whatever he/she wants with his/her ads.
	        $auth_manager->addItemChild('edit own ads', 'crud_own_ads');
		}
		catch(Exception $e)
		{
			echo $e->getMessage() .PHP_EOL;
		}
	}

	/**
	 * copy the database dev into the folder test.
	 * @return int status of the executed command.
	 */
	public function actionCopyTestDatabase()
	{
		$pwd = exec('pwd');
		$command = sprintf('cp %s/data/dev/proxy24.dev.sqlite %s/data/test/proxy24.test.sqlite', $pwd, $pwd);
		exec($command);
		$command = sprintf('cp %s/data/dev/rbac.dev.sqlite %s/data/test/rbac.test.sqlite', $pwd, $pwd);
		exec($command);
	}

	public function actionInitI18n()
	{
		try
		{
			$connection = Yii::app()->i18n_db;
			$connection->createCommand("delete from language;")->execute();
			$connection->createCommand("insert into language('language') values('fr');")->execute();
			$connection->createCommand("insert into language('language') values('en');")->execute();
			$connection->createCommand("insert into language('language') values('nl');")->execute();
			echo 'operation completed.' . PHP_EOL; 
		}
		catch(Exception $e)
		{
			echo $e->getMessage() . PHP_EOL;
		}
	}
}
<?php

Yii::import('application.commands.angular_app.*');

class GenerateCommand extends CConsoleCommand
{
	private $_template_folder;

	public function actionAngularApp()
	{
		try
		{
			echo PHP_EOL;
			echo "*** Warning this action will create an angularjs skeleton (or replace the existing one) ! ***" . PHP_EOL;
			echo "Do you want to continue ? (yes or no) ";
			$continue = fgets(STDIN);
			if('yes' == strtolower(trim($continue)))
			{
				echo PHP_EOL;
				echo 'Please enter the name of the angular application (case-sensitive): ';
				$angular_app = trim(fgets(STDIN));
				echo PHP_EOL;

				if(empty($angular_app))
					throw new Exception('operation aborted: the application name cannot be empty !');

				if(strlen($angular_app) <= 5)
					throw new Exception('operation aborted: the application name is a little too short !');

				echo 'Please enter the module name (case-sensitive): ';
				$module_name = trim(fgets(STDIN));
				$path = Yii::getPathOfAlias('application.modules.' . $module_name);
				echo PHP_EOL;
			
				if(!file_exists($path))
					throw new Exception('Sorry the module specified does not exist !');

				$js_skeleton = new JsSkeleton("$path/javascript/$angular_app", Yii::getPathOfAlias('application.commands.angular_app.js'));
				$js_skeleton->create($angular_app);

				$php_skeleton = new PhpSkeleton($path, Yii::getPathOfAlias('application.commands.angular_app.php'));
				$php_skeleton->create($angular_app, $module_name);
				echo 'The skeleton has been created !' . PHP_EOL;
			}
			else
				echo 'operation aborted.' . PHP_EOL;
		}
		catch(Exception $e)
		{
			echo $e->getMessage() . PHP_EOL;	
		}
	}
}
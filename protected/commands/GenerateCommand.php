<?php

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
				$this->_template_folder = Yii::getPathOfAlias('application.commands.angular_app');
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

				$this->_createSkeletton($angular_app, $module_name);

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

	private function _createSkeletton($application_name, $module_name)
	{
		$date = date('d-m-Y h:m:s');
		$content = file_get_contents($this->_template_folder . '/application.tpl');
		$content = str_replace
		(
			array('{APPLICATION_NAME}', '{DATE}'),
			array($application_name, $date),
			$content
		);
		$path = Yii::getPathOfAlias('application.modules.' . $module_name . '.javascript');
		$angular_application_path = strtolower("$path/$application_name");
		$angular_controller_path = "$angular_application_path/controller";
		$angular_model_path = "$angular_application_path/model";

		// check if the folder javascript exists.
		if(!file_exists($path))
			mkdir($path);

		// check if the folder $application_name exists.
		if(!file_exists($angular_application_path))
			mkdir($angular_application_path);
		
		// create the route files of the angular app.
		file_put_contents("$angular_application_path/$application_name.js", $content);

		// check if the controller folder exists.
		if(!file_exists($angular_controller_path))
			mkdir($angular_controller_path);

		$content = file_get_contents($this->_template_folder . '/controller.tpl');
		$content = str_replace
		(
			array('{APPLICATION_NAME}', '{DATE}'),
			array($application_name, $date),
			$content
		);
		file_put_contents("$angular_controller_path/DefaultController.js", $content);

		// check if the model folder exists.
		if(!file_exists($angular_model_path))
			mkdir($angular_model_path);

		$content = file_get_contents($this->_template_folder . '/model.tpl');
		$content = str_replace
		(
			array('{APPLICATION_NAME}', '{DATE}'),
			array($application_name, $date),
			$content
		);
		file_put_contents("$angular_model_path/CrudModel.js", $content);
	}
}
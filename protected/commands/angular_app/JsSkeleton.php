<?php

class JsSkeleton extends Skeleton
{
	public function create($application_name, $module_name = null)
	{
		
		$date = date('d-m-Y h:m:s');
		
		$this->createRequiredFolders(array('controller', 'model'));

		$application_template = file_get_contents($this->_template_folder . '/application.tpl');
		$application_template = str_replace
		(
			array('{APPLICATION_NAME}', '{DATE}'),
			array($application_name, $date),
			$application_template
		);

		$controller_template = file_get_contents($this->_template_folder . '/controller.tpl');
		$controller_template = str_replace
		(
			array('{APPLICATION_NAME}', '{DATE}'),
			array($application_name, $date),
			$controller_template
		);


		$model_template = file_get_contents($this->_template_folder . '/model.tpl');
		$model_template = str_replace
		(
			array('{APPLICATION_NAME}', '{DATE}'),
			array($application_name, $date),
			$model_template
		);

		$this->createTemplates(
			array
			(
				"$application_name.js" => $application_template,
				"controller/DefaultController.js" => $controller_template,
				"model/CrudModel.js" => $model_template,

			));
	}
}
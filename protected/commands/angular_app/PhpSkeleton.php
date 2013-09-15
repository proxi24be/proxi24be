<?php

class PhpSkeleton extends Skeleton
{
	public function create($application_name, $module_name = null)
	{
		$date = date('d-m-Y h:m:s');
		$this->createRequiredFolders(array("views/$application_name"));
		$application_template = file_get_contents($this->_template_folder . '/application.tpl');
		$application_template = str_replace
		(
			array('{APPLICATION_NAME}', '{DATE}', '{application_name}', '{MODULE_NAME}'),
			array($application_name, $date, strtolower($application_name), $module_name),
			$application_template
		);

		$controller_template = file_get_contents($this->_template_folder . '/controller.tpl');
		$controller_template = str_replace
		(
			array('{APPLICATION_NAME}', '{DATE}'),
			array($application_name, $date),
			$controller_template
		);

		// the path is case sensitive !
		$this->createTemplates(
			array
			(
				'views/'.strtolower($application_name).'/application.php' => $application_template,
				"controllers/$application_name"."Controller.php" => $controller_template,
			));
	}
}
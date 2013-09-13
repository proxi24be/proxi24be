<?php

abstract class Skeleton
{
	// This is the main folder.
	protected $_base_folder;
	// The folder where the templates used 
	// remain.
	protected $_template_folder;

	public abstract function create($application_name);

	public function __construct($base_folder, $template_folder)
	{
		$this->_template_folder = $template_folder;

		// this is a convention.
		$this->_base_folder = strtolower($base_folder);
		if(!file_exists($this->_base_folder))
			return mkdir($this->_base_folder, 0775, true);
	}

	public function createFolder($folder_to_create)
	{
		$folder = strtolower($this->_base_folder . '/' . $folder_to_create);
		if(!file_exists($folder))
			return mkdir($folder);
		else
			return true;
	}

	public function createRequiredFolders(array $folders)
	{
		foreach($folders as $folder)
		{
			$this->createFolder($folder);
		}
	}

	public function createTemplates(array $templates)
	{
		foreach($templates as $template => $content)
		{
			$this->createTemplate($template, $content);
		}
	}

	public function createTemplate($template, $content)
	{
		file_put_contents($this->_base_folder . '/' . $template, $content);
	}
}
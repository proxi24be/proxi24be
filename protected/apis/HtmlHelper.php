<?php

namespace application\apis;

interface HtmlHelper
{
	/**
	 * [getHtml description]
	 * @return string return the representation of the object in HTML.
	 */
	public function getHtml();

	/**
	 * [setConfiguration description]
	 * @param array $configuration A map is provided in order to define 
	 * the type of data (html, css attribute or event) that the class has 
	 * to generate.
	 */
	public function setConfiguration(array $configuration);

	/**
	 * [getConfiguration description]
	 * @return array return the configuration(stored in a array) object
	 * used for generating the html content.
	 */
	public function getConfiguration();
}
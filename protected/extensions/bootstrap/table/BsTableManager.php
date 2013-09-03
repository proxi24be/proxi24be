<?php

class BsTableManager
{
	private $_models;
	private $_attributes;

	public function __construct(array $models, array $attributes)
	{
		$this->_models = $models;
		$this->_attributes = $attributes;
	}

	public function printTable($htmlOptions)
	{
		$html = sprintf('<table class="%s">', $htmlOptions);
		$html .= $this->_getHead();
		$html .= $this->_getBody();
		$html .= '</table>';

		echo $html;
	}

	private function _getHead()
	{
		$html = '<thead>';
		$html .= '<tr>';

		foreach($this->_attributes as $attribute)
			$html .= '<th>' . $attribute . '</th>';
		
		$html .= '</tr></thead>';
		return $html;
	}

	private function _getBody()
	{
		$html = '<tbody>';
		foreach($this->_models as $model)
		{
			$html .= '<tr>';
			foreach($this->_attributes as $attribute)
			{
				$html .= '<td>' . $model->{$attribute} . '</td>';
			}
			$html .='</tr>';	
		}
		$html .= '</tbody>';
		return $html;
	}

}
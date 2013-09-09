<?php

class TableWidget extends CWidget
{
	public $class;
	public $id;
	public $ths = array();
	public $models = array();
	public $tds = array();

	public function init()
	{
		$html = sprintf('<table id="%s" class="%s">', $this->id, $this->class);
		$html .= '<thead>';
		$html .= $this->_getHeaders();
		$html .= '</thead>';
		$html .= '<tbody>';
		$html .= $this->_getBody();
		echo $html;
	}

	public function run()
	{
		$html = '</tbody>';
		$html .= '</table>';
		echo $html;
	}

	private function _getHeaders()
	{
		$html='<tr>';
		foreach($this->ths as $header)
			$html .= '<th>' . $header . '</th>';

		return $html . '</tr>';
	}

	private function _getBody()
	{
		$html = '';
		foreach($this->models as $model)
		{
			$html .= '<tr>';
			foreach($this->tds as $td)
			{
				$html .= '<td>' . $model->$td . '</td>';
			}
			$html .= '</tr>';
		}
		return $html;
	}
}
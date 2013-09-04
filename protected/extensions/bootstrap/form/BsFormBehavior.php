<?php

class BsFormBehavior extends FormBehavior
{
	public function decorAttribute($html)
	{
		$html_decorated = '<div class="form-group">';
		$html_decorated .= $html;
		$html_decorated .= '</div>';
		return $html_decorated;
	}

	public function createHelpMessageTag($message)
	{
		return '<span class="help-block">' . $message . '</span>';
	}
}
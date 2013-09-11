<?php

/**
 * @param  string $flash      The id of the flash.
 * @param  string $type_alert Class css used to render the alert
 * for instance the following are valid : alert-danger, alert-warning, alert-success
 * and so on.
 * @return string             Html content compliant with Bootstrap 3.0
 */

class Flash extends CWidget
{
	public $flash;
	public $type_alert;

	public function init()
	{
		if(Yii::app()->user->hasFlash($this->flash))
		{
			$html = sprintf('<div class="alert %s">', $this->type_alert);
			$html .= Yii::app()->user->getFlash($this->flash);
			echo $html . '</div>';
		}
	}
}
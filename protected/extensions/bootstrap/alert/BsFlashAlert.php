<?php

class BsFlashAlert
{
	/**
	 * [printFlashAlert description]
	 * @param  string $flash      The id of the flash.
	 * @param  string $type_alert Class css used to render the alert
	 * for instance the following are valid : alert-danger, alert-warning, alert-success
	 * and so on.
	 * @return string             Html content compliant with Bootstrap 3.0
	 */
	public static function printFlashAlert($flash, $type_alert)
	{
		if(Yii::app()->user->hasFlash($flash))
		{
			$html = sprintf('<div class="alert %s">', $type_alert);
			$html .= Yii::app()->user->getFlash($flash);
			echo $html . '</div>';	
		}
	}

}
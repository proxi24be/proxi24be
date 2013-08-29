<?php

use application\apis as MyApis;

Yii::import('application.apis.GenerateHtml');

class GenerateHtmlTest extends CTestCase
{
	public function testSimpleHtml()
	{
		$configuration = array(
			'form'=> array(
				'htmlOptions' => array('role'=>'form'),
				'div'=> array(
					'htmlOptions' => array('class'=>'form-group'),
					'label'=> array(
						'htmlOptions' => array('for'=>'test'),
					),
					'input'=> array(
						'htmlOptions'=> array('name'=>'test'),
					)
				),
			),
		);
		
		$html = MyApis\GenerateHtml::generate($configuration);
		$this->assertTrue(strpos($html, 'form') !== false);
		$this->assertTrue(strpos($html, 'div') !== false);
		$this->assertTrue(strpos($html, 'label') !== false);
		$this->assertTrue(strpos($html, 'form-group') !== false);
	}
}
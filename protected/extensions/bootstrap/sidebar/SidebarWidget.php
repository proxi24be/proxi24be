<?php

class SidebarWidget extends CWidget
{
	public $items = array();
	public $id;

	public function init()
	{
		printf('<div id="%s" class="well">', $this->id);
		$this->widget('zii.widgets.CMenu', 
			array(
				'items'=> $this->items,
				'htmlOptions'=> array('class'=> 'nav nav-pills nav-stacked'),
			));
	}

	public function run()
	{
		echo '</div>';
	}
}

?>
<?php

return array(
	'auth_item_child1'=>array(
		'parent' => 'authenticated',
		'child' => 'public_read',
	),
	'auth_item_child2'=>array(
		'parent' => 'admin',
		'child' => 'authenticated',
	),
	'auth_item_child3'=>array(
		'parent' => 'admin',
		'child' => 'admin_delete',
	),
);
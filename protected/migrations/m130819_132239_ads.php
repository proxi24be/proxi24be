<?php

class m130819_132239_ads extends CDbMigration
{
	public function up()
	{
		$this->createTable('ads', array(
			'id' => 'pk',
			'user_id' => 'integer',
			'description' => 'varchar2(1024)',
			'update_time' => 'integer',
			'create_time' =>'integer',
			));
	}

	public function down()
	{
		$this->dropTable('ads');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
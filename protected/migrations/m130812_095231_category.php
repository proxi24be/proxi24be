<?php

class m130812_095231_category extends CDbMigration
{
	public function up()
	{
		$this->createTable("category",
			array(
				'id' => 'pk',
				'description' => 'varchar2(256) NOT NULL',
				'create_time' => 'integer NOT NULL',
				'update_time' => 'integer NOT NULL',
				));
	}

	public function down()
	{
		$this->dropTable("category");
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
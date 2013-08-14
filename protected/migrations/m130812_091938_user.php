<?php

class m130812_091938_user extends CDbMigration
{
	public function up()
	{
		$this->createTable('user',
			array(
			'id' => 'pk',
			'first_name' => 'varchar2(256) NOT NULL',
			'last_name' => 'varchar2(256) NOT NULL',
			'create_time'=>'integer NOT NULL',
			'update_time'=>'integer NOT NULL',
			'email'=>'varchar2(256) NOT NULL',
			'last_connection'=>'integer NOT NULL',
			'locked'=>'integer NOT NULL',
			'password'=>'varchar2(256) NOT NULL',
			));
	}

	public function down()
	{
		$this->dropTable("user");
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
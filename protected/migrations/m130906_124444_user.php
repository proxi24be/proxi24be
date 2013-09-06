<?php

class m130906_124444_user extends CDbMigration
{
	public function up()
	{
		$this->dropTable('user');
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
			"constraint u_email unique ('email')",
			));
	}

	public function down()
	{
		$this->dropTable('user');
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
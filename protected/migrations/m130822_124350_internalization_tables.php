<?php

class m130822_124350_internalization_tables extends CDbMigration
{
	public function up()
	{
		$this->setDbConnection(Yii::app()->i18n_db);

		$this->createTable('source_message', array(
				'id'=>'pk',
				'category'=>'varchar2(256)',
				'message'=>'varchar2(8096)',
				"constraint u_category_message unique ('category', 'message')",
			));

		$this->createTable('message', array(
				'id'=>'integer',
				'language'=>'varchar2(16)',
				'translation'=>'varchar2(8096)',
				"primary key ('id','language')",
            	"foreign key ('id') references 'source_message' ('id') on delete cascade on update restrict",
            	"foreign key ('language') references 'language' ('language') on delete cascade on update restrict",
			));

		$this->createTable('language', array(
				'id'=>'pk',
				'language'=>'varchar2(16)',
				'description'=>'varchar2(8096)',
			));
	}

	public function down()
	{
		$this->setDbConnection(Yii::app()->i18n_db);
		$this->dropTable('message');
		$this->dropTable('source_message');
		$this->dropTable('language');
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
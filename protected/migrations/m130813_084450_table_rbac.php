 <?php

class m130813_084450_table_rbac extends CDbMigration
{
	public function up()
	{
        // The field names are exactly how the YII script described them.
        // If we alter the name the authmanager component may not work correctly !
        // However it is possible to add additional fields !

        $this->setDbConnection(Yii::app()->rbac_db);
        $this->createTable('auth_item', array(
            'name' => 'varchar2(256) NOT NULL',
            'type' => 'integer NOT NULL',
            'description' => 'text',
            'bizrule' => 'text',
            'data' => 'text',
            'create_time'=> 'integer',
            'update_time'=> 'integer',
            "PRIMARY KEY ('name')",
        ));

        $this->createTable('auth_item_child', array(
            'parent' => 'varchar2(256) NOT NULL',
            'child' => 'varchar2(256) NOT NULL',
            'create_time'=> 'integer',
            'update_time'=> 'integer',
            "primary key ('parent','child')",
            "foreign key ('parent') references 'auth_item' ('name') on delete cascade on update cascade",
            "foreign key ('child') references 'auth_item' ('name') on delete cascade on update cascade",
        ));

        $this->createTable('auth_assignment', array(
            'itemname' => 'varchar2(256) NOT NULL',
            'userid' => 'integer NOT NULL',
            'bizrule' => 'text',
            'data' => 'text',
            'create_time'=> 'integer',
            'update_time'=> 'integer',
            "primary key ('itemname','userid')",
            "foreign key ('itemname') references 'auth_item' ('name') on delete cascade on update cascade",
        ));
	}

	public function down()
	{
        $this->setDbConnection(Yii::app()->rbac_db);
        $this->dropTable('auth_assignment');
        $this->dropTable('auth_item_child');
        $this->dropTable('auth_item');
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



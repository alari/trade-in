<?php

class m121010_121128_servicePath extends EDbMigration
{
	public function up()
	{
        $this->addColumn('{{service}}', 'path', 'varchar(200) DEFAULT NULL');
        $this->createIndex("service_path", "{{service}}", "path", true);
	}

	public function down()
	{
		echo "m121010_121128_servicePath does not support migration down.\n";
		return false;
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
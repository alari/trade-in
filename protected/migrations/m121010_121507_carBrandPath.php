<?php

class m121010_121507_carBrandPath extends EDbMigration
{
	public function up()
	{
        $this->addColumn('{{car_brand}}', 'path', 'varchar(200) DEFAULT NULL');
        $this->createIndex("service_path", "{{car_brand}}", "path", true);
	}

	public function down()
	{
		echo "m121010_121507_carBrandPath does not support migration down.\n";
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
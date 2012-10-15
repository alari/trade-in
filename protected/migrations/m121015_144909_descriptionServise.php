<?php

class m121015_144909_descriptionServise extends EDbMigration
{
	public function up()
	{
        $this->addColumn('{{service}}', 'description', 'text');
	}

	public function down()
	{
		echo "m121015_144909_descriptionServise does not support migration down.\n";
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
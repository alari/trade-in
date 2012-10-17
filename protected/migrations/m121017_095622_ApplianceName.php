<?php

class m121017_095622_ApplianceName extends EDbMigration
{
	public function up()
	{
        $this->addColumn('{{appliance}}', 'name', 'varchar (64)');
	}

	public function down()
	{
		echo "m121017_095622_ApplianceName does not support migration down.\n";
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
<?php

class m121004_122448_mailStatus extends EDbMigration
{
	public function up()
	{
        $this->addColumn("{{negotiation}}", "mail_status", "varchar (10)");
        $this->addColumn("{{appliance}}", "mail_status", "varchar (10)");
	}

	public function down()
	{
		echo "m121004_122448_mailStatus does not support migration down.\n";
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
<?php

class m120925_150712_serviceForm extends EDbMigration
{
	public function up()
	{
        $this->addColumn("{{negotiation}}", "ransom", "int");
        $this->addColumn("{{negotiation}}", "offset", "int");
        $this->addColumn("{{negotiation}}", "commission", "int");

        $this->addColumn("{{negotiation}}", "disrepair", "int");
        $this->addColumn("{{negotiation}}", "unliquidated", "int");
        $this->addColumn("{{negotiation}}", "inappropriate", "int");

	}

	public function down()
	{
		echo "m120925_150712_serviceForm does not support migration down.\n";
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
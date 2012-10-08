<?php

class m121001_073313_applianceForm extends EDbMigration
{
	public function up()
	{
        $this->addColumn("{{appliance}}", "color", "varchar (100)");
        $this->addColumn("{{appliance}}", "mileage", "int");
        $this->addColumn("{{appliance}}", "salon", "varchar (20)");
        $this->addColumn("{{appliance}}", "condition", "varchar (60)");
        $this->addColumn("{{appliance}}", "year", "YEAR");
        $this->addColumn("{{appliance}}", "engine", "varchar (50)");
        $this->addColumn("{{appliance}}", "volume", "decimal (2,1)");
        $this->addColumn("{{appliance}}", "gearbox", "varchar (50)");
        $this->addColumn("{{appliance}}", "transmission", "varchar (20)");
        $this->addColumn("{{appliance}}", "desired_price", "varchar (200)");

	}

	public function down()
	{
		echo "m121001_073313_applianceForm does not support migration down.\n";
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
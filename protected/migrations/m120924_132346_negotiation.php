<?php

class m120924_132346_negotiation extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{negotiation}}', array(
            'id' => 'pk',
            'hash' => 'varchar (64)',
            'service_id' => 'int',
            'appliance_id' => 'int',
            'manager_name' => 'varchar (200)',
            'price' => 'int',
            'status' => 'tinytext',
            'comment' => 'tinytext',
        ));

        $this->addForeignKey("negotiation_service", "{{negotiation}}", "service_id", "{{service}}", "id");
        $this->addForeignKey("negotiation_appliance", "{{negotiation}}", "appliance_id", "{{appliance}}", "id", "CASCADE", "CASCADE");
	}

	public function down()
	{
		echo "m120924_132346_negotiation does not support migration down.\n";
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
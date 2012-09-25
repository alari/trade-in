<?php

class m120924_090148_tradeIn extends CDbMigration
{
	public function up()
	{
        $this->createTable('{{service}}', array(
            'id' => 'pk',
            'title' => 'varchar (200) NOT NULL',
            'email' => 'varchar (200) NOT NULL',
            'phone' => 'int',
            'address' => 'tinytext',
        ));

        $this->createTable('{{car_brand}}', array(
            'id' => 'pk',
            'title' => 'varchar (200) NOT NULL',
        ));

        $this->createTable('{{car_brand_to_service}}', array(
            'car_brand_id' => 'int',
            'service_id' => 'int',
            'PRIMARY KEY (`car_brand_id`, `service_id`)',
        ));

        $this->createTable('{{appliance}}', array(
            'id' => 'pk',

            'email' => 'varchar (200) NOT NULL',
            'hash' => 'varchar (64)',
            'car_brand_id' => 'int',
            'car_model' => 'varchar (60)',
        ));

        $this->addForeignKey("car_brand", "{{appliance}}", "car_brand_id", "{{car_brand}}", "id");

        $this->addForeignKey("service", "{{car_brand_to_service}}", "service_id", "{{service}}", "id", "CASCADE", "CASCADE");
        $this->addForeignKey("brand", "{{car_brand_to_service}}", "car_brand_id", "{{car_brand}}", "id", "CASCADE", "CASCADE");

	}

	public function down()
	{
        $this->dropTable('{{service}}');
        $this->dropTable('{{car_brand}}');
        $this->dropTable('{{car_brand_to_service}}');
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
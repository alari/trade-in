<?php

class m120925_083348_Image extends EDbMigration
{
	public function up()
	{

        $this->addColumn("{{service}}", "pic_holder_id", "int");
        $this->addForeignKey("service_pic", "{{service}}", "pic_holder_id", "{{images_holder}}", "id");

        $this->addColumn("{{car_brand}}", "pic_holder_id", "int");
        $this->addForeignKey("car_brand_pic", "{{car_brand}}", "pic_holder_id", "{{images_holder}}", "id");


        $this->addColumn("{{appliance}}", "list_holder_id", "int");
        $this->addForeignKey("appliance_list", "{{appliance}}", "list_holder_id", "{{images_holder}}", "id");

	}

	public function down()
	{
		echo "m120925_083348_Image does not support migration down.\n";
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
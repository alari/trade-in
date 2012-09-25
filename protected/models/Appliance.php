<?php

Yii::import('application.models._base.BaseAppliance');

class Appliance extends BaseAppliance implements ImagesHolderModel,IFormAdditionalFields
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function beforeSave(){
        parent::beforeSave();

        $this->hash = uniqid('user');

        return true;
    }

    public function relations()
    {
        $relations = parent::relations();

        $relations['listHolder'] = array(self::BELONGS_TO, 'ImagesHolder', 'list_holder_id');

        return $relations;
    }

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = array('list_holder_id', 'default', 'setOnEmpty' => true, 'value' => null);

        return $rules;
    }
    public function imageHolders()
    {
        return array(
            "list_holder_id" => "list"
        );
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['imagesHolder'] = array(
            'class' => 'imagesHolder.models.ImagesHolderBehavior'
        );

        return $behaviors;
    }

    public function additionalFields(){
        //$additionalFields = parent::additionalFields();

        return $additionalFields;
    }

}

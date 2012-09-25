<?php

Yii::import('application.models._base.BaseCarBrand');

class CarBrand extends BaseCarBrand implements ImagesHolderModel,IFormAdditionalFields
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function relations()
    {
        $relations = parent::relations();
        unset ($relations['tblServices']);

        $relations['picHolder'] = array(self::BELONGS_TO, 'ImagesHolder', 'pic_holder_id');
        $relations['services'] = array(self::MANY_MANY, 'Service', '{{car_brand_to_service}}(car_brand_id, service_id)');

        return $relations;
    }

    public function imageHolders()
    {
        return array(
            "pic_holder_id" => "pic"
        );
    }

    public function rules()
    {
        $rules = parent::rules();
        $rules [] = array('pic_holder_id', 'default', 'setOnEmpty' => true, 'value' => null);
        return $rules;
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
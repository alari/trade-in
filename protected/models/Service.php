<?php

Yii::import('application.models._base.BaseService');

class Service extends BaseService implements ImagesHolderModel,IFormAdditionalFields
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function relations()
    {
        $relations = parent::relations();
        unset ($relations['tblCarBrands']);

        $relations['carBrands'] = array(self::MANY_MANY, 'CarBrand', '{{car_brand_to_service}}(service_id, car_brand_id)');
        $relations['picHolder'] = array(self::BELONGS_TO, 'ImagesHolder', 'pic_holder_id');

        return $relations;
    }

    public function rules()
    {
        $rules = parent::rules();

        $rules[] = array("carBrands", "safe");
        $rules[] = array('pic_holder_id', 'default', 'setOnEmpty' => true, 'value' => null);

        return $rules;
    }
    public function imageHolders()
    {
        return array(
            "pic_holder_id" => "pic"
        );
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['imagesHolder'] = array(
            'class' => 'imagesHolder.models.ImagesHolderBehavior'
        );
        $behaviors['activerecord-relation'] = array(
            'class' => 'ext.yiiext.behaviors.activerecord-relation.EActiveRecordRelationBehavior',
        );
        return $behaviors;
    }

    public function additionalFields(){
        //$additionalFields = parent::additionalFields();

        return $additionalFields;
    }
}
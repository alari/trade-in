<?php

Yii::import('application.models._base.BaseAppliance');

class Appliance extends BaseAppliance implements ImagesHolderModel,IFormAdditionalFields
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function onAfterConstruct(){

        $this->hash = uniqid('user');
        $this->mail_status = 'wait';

        return true;
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
            'class' => 'imagesHolder.models.ImagesHolderBehavior',
            'editViews' => array(
                //'listHolder'=>'application.view.tradeIn._addImageForm'
                'listHolder'=>'application.views.tradeIn._addImageForm'
            ),
        );

        return $behaviors;
    }

    public function additionalFields(){
        //$additionalFields = parent::additionalFields();

        return $additionalFields;
    }



}

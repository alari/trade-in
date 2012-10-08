<?php

Yii::import('application.models._base.BaseNegotiation');

class Negotiation extends BaseNegotiation
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

    public function onAfterConstruct(){

        /*$this->hash = uniqid('service');
        $this->mail_status = 'wait';*/
        return true;
    }
}
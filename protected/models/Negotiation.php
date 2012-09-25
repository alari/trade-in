<?php

Yii::import('application.models._base.BaseNegotiation');

class Negotiation extends BaseNegotiation
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}
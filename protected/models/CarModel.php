<?php

Yii::import('application.models._base.BaseCarModel');

class CarModel extends BaseCarModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}
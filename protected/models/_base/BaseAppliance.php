<?php

/**
 * This is the model base class for the table "{{appliance}}".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Appliance".
 *
 * Columns in table "{{appliance}}" available as properties of the model,
 * followed by relations of table "{{appliance}}" available as properties of the model.
 *
 * @property integer $id
 * @property string $email
 * @property string $hash
 * @property integer $car_brand_id
 * @property string $car_model
 * @property integer $list_holder_id
 * @property string $color
 * @property integer $mileage
 * @property string $salon
 * @property string $condition
 * @property string $year
 * @property string $engine
 * @property string $volume
 * @property string $gearbox
 * @property string $transmission
 * @property string $desired_price
 * @property string $mail_status
 *
 * @property CarBrand $carBrand
 * @property ImagesHolder $listHolder
 * @property Negotiation[] $negotiations
 */
abstract class BaseAppliance extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return '{{appliance}}';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Appliance|Appliances', $n);
	}

	public static function representingColumn() {
		return 'email';
	}

	public function rules() {
		return array(
			array('email', 'required'),
			array('car_brand_id,car_model_id, list_holder_id, mileage', 'numerical', 'integerOnly'=>true),
			array('email, desired_price', 'length', 'max'=>200),
			array('hash , name', 'length', 'max'=>64),
			array('condition', 'length', 'max'=>60),
			array('volume', 'length', 'max'=>3),
			array('color', 'length', 'max'=>100),
			array('salon, transmission', 'length', 'max'=>20),
			array('year', 'length', 'max'=>4),
			array('engine, gearbox', 'length', 'max'=>50),
			array('hash, name, car_brand_id, car_model_id, list_holder_id, color, mileage, salon, condition, year, engine, volume, gearbox, transmission, desired_price', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, email, hash, car_brand_id, car_model_id, list_holder_id,  color, mileage, salon, condition, year, engine, volume, gearbox, transmission, desired_price, mail_status, name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'carBrand' => array(self::BELONGS_TO, 'CarBrand', 'car_brand_id'),
            'carModel' => array(self::BELONGS_TO, 'CarModel', 'car_model_id'),
			'listHolder' => array(self::BELONGS_TO, 'ImagesHolder', 'list_holder_id'),
			'negotiations' => array(self::HAS_MANY, 'Negotiation', 'appliance_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'email' => Yii::t('app', 'Email'),
			'hash' => Yii::t('app', 'Hash'),
			'car_brand_id' => Yii::t('app', 'Марка'),
			'car_model_id' => Yii::t('app', 'Модель'),
			'list_holder_id' => null,
			'color' => Yii::t('app', 'Цвет'),
			'mileage' => Yii::t('app', 'Пробег'),
			'salon' => Yii::t('app', 'Салон'),
			'condition' => Yii::t('app', 'Состояние'),
			'year' => Yii::t('app', 'Год выпуска'),
			'engine' => Yii::t('app', 'Двигатель'),
			'volume' => Yii::t('app', 'Объем'),
			'gearbox' => Yii::t('app', 'КПП'),
			'transmission' => Yii::t('app', 'Привод'),
			'desired_price' => Yii::t('app', 'Желаемая цена'),
			'carBrand' => Yii::t('app', 'Марка'),
            'carModel' => Yii::t('app', 'Модель'),
            'name' => Yii::t('app', 'Ваше имя'),
			'listHolder' => null,
			'negotiations' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('hash', $this->hash, true);
		$criteria->compare('car_brand_id', $this->car_brand_id);
		$criteria->compare('car_model_id', $this->car_model_id, true);
		$criteria->compare('list_holder_id', $this->list_holder_id);
		$criteria->compare('color', $this->color, true);
		$criteria->compare('mileage', $this->mileage);
		$criteria->compare('salon', $this->salon, true);
		$criteria->compare('condition', $this->condition, true);
		$criteria->compare('year', $this->year, true);
		$criteria->compare('engine', $this->engine, true);
		$criteria->compare('volume', $this->volume, true);
		$criteria->compare('gearbox', $this->gearbox, true);
		$criteria->compare('transmission', $this->transmission, true);
		$criteria->compare('desired_price', $this->desired_price, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}
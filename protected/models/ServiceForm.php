<?php

class ServiceForm extends CFormModel
{
    public $price;
    public $ransom;
    public $offset;
    public $commission;
    public $comment;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
            // name, email, subject and body are required

        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'price'=>Yii::t("app", 'Ваше предложение по цене'),
            'ransom'=>Yii::t("app", 'Выкуп'),
            'offset'=>Yii::t("app", 'В зачет'),
            'commission'=>Yii::t("app", 'На коммиссию'),
            'comment'=>Yii::t("app", 'Комментарий'),
        );
    }
}

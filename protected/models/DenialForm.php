<?php

class DenialForm extends CFormModel
{
    public $disrepair;
    public $unliquidated;
    public $inappropriate;
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
            'disrepair'=>Yii::t("app", 'Плохое техническое состояние'),
            'unliquidated'=>Yii::t("app", '"Неликвидная модель"'),
            'inappropriate'=>Yii::t("app", 'Неподходящая марка'),
            'comment'=>Yii::t("app", 'Комментарий'),
        );
    }
}
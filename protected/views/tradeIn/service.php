<?php
/**
 * Created by JetBrains PhpStorm.
 * User: egor
 * Date: 25.09.12
 * Time: 17:42
 * To change this template use File | Settings | File Templates.
 */

$appliance = new Appliance();
$applianceFormTitle = $appliance->attributeLabels();

$salonType = Yii::app()->params['appliance']['form']['salon'];
$conditionType = Yii::app()->params['appliance']['form']['condition'];
$engineType = Yii::app()->params['appliance']['form']['engine'];
$gearboxType = Yii::app()->params['appliance']['form']['gearbox'];
$transmissionType = Yii::app()->params['appliance']['form']['transmission'];

?>
Заявка  <? echo $model->appliance->carBrand;?> <? echo $model->appliance->carModel;?><br>
<br><br>
<?
    if(isset($model->appliance->carBrand->picHolder->images[0])){
        $image = $model->appliance->carBrand->picHolder->images[0];
        echo CHtml::image($image->getSrc('logo'));
    }
?>
<br><br>
<div>
    <div style="float: left; width: 50%;">
        <b><? echo $applianceFormTitle['carBrand']?>:</b> <? echo $model->appliance->carBrand?> <br>
        <b><? echo $applianceFormTitle['carModel']?>:</b> <? echo $model->appliance->carModel?> <br>
        <b><? echo $applianceFormTitle['mileage']?>:</b> <? echo $model->appliance->mileage?> км.<br>
        <b><? echo $applianceFormTitle['color']?>:</b> <? echo $model->appliance->color?> <br>
        <b><? echo $applianceFormTitle['salon']?>:</b> <? echo $salonType[$model->appliance->salon] ?> <br>
        <b><? echo $applianceFormTitle['condition']?>:</b> <? echo $conditionType[$model->appliance->condition] ?> <br>
    </div>
    <div style="float: left; width: 50%;">
        <b><? echo $applianceFormTitle['year']?>:</b> <? echo $model->appliance->year?> <br>
        <b><? echo $applianceFormTitle['engine']?>:</b> <? echo $engineType[$model->appliance->engine] ?> <br>
        <b><? echo $applianceFormTitle['volume']?>:</b> <? echo $model->appliance->volume?> л.<br>
        <b><? echo $applianceFormTitle['gearbox']?>:</b> <? echo $gearboxType[$model->appliance->gearbox] ?> <br>
        <b><? echo $applianceFormTitle['transmission']?>:</b> <? echo $transmissionType[$model->appliance->transmission] ?> <br>
        <b><? echo $applianceFormTitle['desired_price']?>:</b> <? echo $model->appliance->desired_price?> р.<br>
    </div>
</div>
<br><br>
<div style="clear: both;">
    Images :<br>
    <?foreach ($model->appliance->listHolder->images as $im) {
        echo CHtml::image($im->getSrc('tiny'));
    }?>
</div>

<br><br>
<?
if(isset($model->service->picHolder->images[0])){
    $image = $model->service->picHolder->images[0];
    echo CHtml::image($image->getSrc('logo'));
}
?>
<br>
<? echo $model->service->title;?>
<br><br>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'Service-form',
    'htmlOptions' => array(
        'class' => 'b-form',
    ),
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>

<?php //echo $form->errorSummary($modelForm); ?>
<div class="m-left">


    <div class="e-form-row">
        <?php echo $form->labelEx($formService, 'managerName', array("class" => "e-form-label")); ?>
        <?php echo $form->textField($formService, 'managerName', array("class" => "e-form-input")); ?>
        <?php echo $form->error($formService, 'managerName', array("class" => "e-form-error-message")); ?>
    </div>
    <div class="e-form-row">
        <?php echo $form->labelEx($formService, 'price', array("class" => "e-form-label")); ?>
        <?php echo $form->textField($formService, 'price', array("class" => "e-form-input")); ?>
        <?php echo $form->error($formService, 'price', array("class" => "e-form-error-message")); ?>
    </div>


        <?php echo $form->checkBox($formService, 'ransom', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'ransom', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'ransom', array("class" => "e-form-error-message")); ?>



        <?php echo $form->checkBox($formService, 'offset', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'offset', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'offset', array("class" => "e-form-error-message")); ?>


        <?php echo $form->checkBox($formService, 'commission', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'commission', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'commission', array("class" => "e-form-error-message")); ?>


    <div class="e-form-row">
        <?php echo $form->labelEx($formService, 'comment', array("class" => "e-form-label")); ?>
        <?php echo $form->textArea($formService, 'comment', array("class" => "e-form-input")); ?>
        <?php echo $form->error($formService, 'comment', array("class" => "e-form-error-message")); ?>
    </div>
</div>

    <?php echo CHtml::submitButton(Yii::t('app', 'Отправить'), array('class' => 'button product-actions__buy-offline product-actions__buy-online')); ?>
    <?php echo CHtml::link(Yii::t('app', 'Отказаться'), array('tradeIn/denial','hash'=>$model->hash)); ?>
</div>

<?php $this->endWidget(); ?>

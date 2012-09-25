<?php
/**
 * Created by JetBrains PhpStorm.
 * User: egor
 * Date: 25.09.12
 * Time: 17:42
 * To change this template use File | Settings | File Templates.
 */
?>
Заявка  <? echo $model->appliance->carBrand;?> <? echo $model->appliance->car_model;?><br>

Images :<br>
<?foreach ($model->appliance->listHolder->images as $im) {
    echo CHtml::image($im->getSrc('tiny'));
}?>

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

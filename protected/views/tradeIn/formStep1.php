<?php
/* @var $this ApplianceController */
/* @var $model Appliance */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'appliance-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'car_brand_id'); ?>
        <?php echo $form->dropDownList($model, 'car_brand_id',
        CHtml::listData(CarBrand::model()->findAll(), 'id', 'title')); ?>
        <?php echo $form->error($model,'car_brand_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'car_model'); ?>
        <?php echo $form->textField($model,'car_model',array('size'=>60,'maxlength'=>60)); ?>
        <?php echo $form->error($model,'car_model'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
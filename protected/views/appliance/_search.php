<?php
/* @var $this ApplianceController */
/* @var $model Appliance */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hash'); ?>
		<?php echo $form->textField($model,'hash',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'car_brand_id'); ?>
		<?php echo $form->textField($model,'car_brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'car_model'); ?>
		<?php echo $form->textField($model,'car_model',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
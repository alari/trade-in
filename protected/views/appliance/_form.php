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
		<?php echo $form->labelEx($model,'hash'); ?>
		<?php echo $form->textField($model,'hash',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'hash'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_brand_id'); ?>
		<?php echo $form->textField($model,'car_brand_id'); ?>
		<?php echo $form->error($model,'car_brand_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'car_model'); ?>
		<?php echo $form->textField($model,'car_model',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'car_model'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'list_holder_id'); ?>
		<?php echo $form->textField($model,'list_holder_id'); ?>
		<?php echo $form->error($model,'list_holder_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'color'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mileage'); ?>
		<?php echo $form->textField($model,'mileage'); ?>
		<?php echo $form->error($model,'mileage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salon'); ?>
		<?php echo $form->textField($model,'salon',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'salon'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'condition'); ?>
		<?php echo $form->textField($model,'condition',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'condition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'engine'); ?>
		<?php echo $form->textField($model,'engine',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'engine'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'volume'); ?>
		<?php echo $form->textField($model,'volume',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'volume'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gearbox'); ?>
		<?php echo $form->textField($model,'gearbox',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'gearbox'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'transmission'); ?>
		<?php echo $form->textField($model,'transmission',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'transmission'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desired_price'); ?>
		<?php echo $form->textField($model,'desired_price',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'desired_price'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
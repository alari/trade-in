<?php
/* @var $this CarBrandController */
/* @var $model CarBrand */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('ext.shared-core.widgets.ExtForm', array(
    "model"=>$model,
    'id' => 'car-brand-form',
    'enableAjaxValidation' => false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

    <?$form->inject()?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
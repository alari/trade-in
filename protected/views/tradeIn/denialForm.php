<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'Service-form',
    'htmlOptions' => array(
        'class' => 'denialform',
    ),
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
)); ?>
<div class="l_content">
<h2 class="b_content_diclineNotice"> Вы отказались от объявления "
<?php //echo $model->appliance->carBrand->title?> 
<?php echo $model->appliance->carModel->title?> == 
<?php echo $model->appliance->year?> " </h2>

<?php //echo $form->errorSummary($modelForm); ?>
	<h3 class="b_content_notice">Мы будем очень вам благодарны если вы укажите причину отказа:</h3>
<div class="b_content_denialform">

    <div class="b_content_denialform_box">
        <?php echo $form->checkBox($formService, 'disrepair', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'disrepair', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'disrepair', array("class" => "e-form-error-message")); ?>
    </div>

    <div class="b_content_denialform_box">
        <?php echo $form->checkBox($formService, 'unliquidated', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'unliquidated', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'unliquidated', array("class" => "e-form-error-message")); ?>
    </div>

    <div class="b_content_denialform_box">
        <?php echo $form->checkBox($formService, 'inappropriate', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'inappropriate', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'inappropriate', array("class" => "e-form-error-message")); ?>
    </div>


    <div class="b_content_denialform_box_texarea">
        <?php echo $form->labelEx($formService, 'comment', array("class" => "b_form_label")); ?>
        <?php echo $form->textArea($formService, 'comment', array("class" => "b_form_label__texarea")); ?>
        <?php echo $form->error($formService, 'comment', array("class" => "e-form-error-message")); ?>
    </div>
</div>
<div class="clear"></div>
<?php echo CHtml::submitButton(Yii::t('app', 'Отправить'), array('class' => 'b_content_bottom_submitbutton button product-actions__buy-offline product-actions__buy-online')); ?>


<?php $this->endWidget(); ?>
</div><!--l_content-->
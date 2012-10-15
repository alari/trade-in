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

<?php //echo $form->errorSummary($modelForm); ?>
	<h3 class="denialform-h3">Мы будем очень вам благодарны если вы укажите причину отказа:</h3>
<div class="denial-form_content">

    <div class="e-form-row">
        <?php echo $form->checkBox($formService, 'disrepair', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'disrepair', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'disrepair', array("class" => "e-form-error-message")); ?>
    </div>

    <div>
        <?php echo $form->checkBox($formService, 'unliquidated', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'unliquidated', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'unliquidated', array("class" => "e-form-error-message")); ?>
    </div>

    <div>
        <?php echo $form->checkBox($formService, 'inappropriate', array("class" => "e-form-input")); ?>
        <?php echo $form->labelEx($formService, 'inappropriate', array("class" => "e-form-label")); ?>
        <?php echo $form->error($formService, 'inappropriate', array("class" => "e-form-error-message")); ?>
    </div>


    <div class="e-form-row">
        <?php echo $form->labelEx($formService, 'comment', array("class" => "e-form-label__texarea")); ?>
        <?php echo $form->textArea($formService, 'comment', array("class" => "e-form-input")); ?>
        <?php echo $form->error($formService, 'comment', array("class" => "e-form-error-message")); ?>
    </div>
</div>
<div class="clear"></div>
<?php echo CHtml::submitButton(Yii::t('app', 'Отправить'), array('class' => 'button product-actions__buy-offline product-actions__buy-online')); ?>


<?php $this->endWidget(); ?>

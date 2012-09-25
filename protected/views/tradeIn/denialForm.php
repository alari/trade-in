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
        <?php echo $form->labelEx($formService, 'comment', array("class" => "e-form-label")); ?>
        <?php echo $form->textArea($formService, 'comment', array("class" => "e-form-input")); ?>
        <?php echo $form->error($formService, 'comment', array("class" => "e-form-error-message")); ?>
    </div>
</div>

<?php echo CHtml::submitButton(Yii::t('app', 'Отправить'), array('class' => 'button product-actions__buy-offline product-actions__buy-online')); ?>
</div>

<?php $this->endWidget(); ?>
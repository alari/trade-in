<div class="l_content">
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
<h2 class="b_content_acceptRequest_h2">Заявка  <? echo $model->appliance->carBrand;?> <? echo $model->appliance->carModel;?>
	<? if(isset($model->appliance->carBrand->picHolder->images[0])){
			$image = $model->appliance->carBrand->picHolder->images[0];
		} 
	?>
</h2><!--b_content_acceptrequest_h2-->
<div class="b_content_acceptRequestContentBox">

        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['carBrand']?>
			<span><? echo $model->appliance->carBrand?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['carModel']?>
			<span><? echo $model->appliance->carModel?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['mileage']?>
			<span><? echo $model->appliance->mileage?> км</span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['color']?>
			<span><? echo $model->appliance->color?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['salon']?>
			<span><? echo $salonType[$model->appliance->salon] ?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['condition']?>
			<span><? echo $conditionType[$model->appliance->condition] ?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['year']?>
			<span><? echo $model->appliance->year?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['engine']?>
			<span><? echo $engineType[$model->appliance->engine] ?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['volume']?>
			<span><? echo $model->appliance->volume?> л.</span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['gearbox']?>
			<span><? echo $gearboxType[$model->appliance->gearbox] ?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['transmission']?>
			<span><? echo $transmissionType[$model->appliance->transmission] ?></span>
		</div>
        <div class="b_content_acceptRequestContentBox__item">
			<? echo $applianceFormTitle['desired_price']?>
			<span><? echo $model->appliance->desired_price?> р.</span>
		</div>

</div><!--b_content_acceptRequestContentBox-->
<div class="clear"></div>
<div class="b_content_acceptRequestContentBox_imagesCar">
    <? foreach ($model->appliance->listHolder->images as $im) {
        echo '<div class="b_content_acceptRequestContentBox_imageCar">'.CHtml::image($im->getSrc('tiny')).'</div>';
    }?>
</div><!--b_content_acceptRequestContentBox_imagesCar-->
<div class="clear"></div>

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
<div class="b_content_acceptRequestContentBox_bottom">
	
	<div class="b_content_acceptRequestContentBox_bottom_form">
        <?php echo $form->labelEx($formService, 'managerName', array("class" => "b_content_acceptRequestContentBox_bottom_label")); ?>
        <?php echo $form->textField($formService, 'managerName', array("class" => "e-form-input")); ?>
        <?php echo $form->error($formService, 'managerName', array("class" => "e-form-error-message")); ?>
    </div>
    <div class="b_content_acceptRequestContentBox_bottom_form">
        <?php echo $form->labelEx($formService, 'price', array("class" => "b_content_acceptRequestContentBox_bottom_label")); ?>
        <?php echo $form->textField($formService, 'price', array("class" => "e-form-input")); ?>
        <?php echo $form->error($formService, 'price', array("class" => "e-form-error-message")); ?>
    </div>
	<div class="b_content_acceptRequestContentBox_bottom_form">
		<label class="b_content_acceptRequestContentBox_bottom_label">Салон готов предложить:</label>
		<div class="labelWrap">
			<div class="labelWrap__item"><?php echo $form->checkBox($formService, 'ransom', array("class" => "e-form-input")); ?>
			<?php echo $form->labelEx($formService, 'ransom', array("class" => "e-form-label")); ?>
			<?php echo $form->error($formService, 'ransom', array("class" => "e-form-error-message")); ?></div>
		
	
	
			<div class="labelWrap__item"><?php echo $form->checkBox($formService, 'offset', array("class" => "e-form-input")); ?>
			<?php echo $form->labelEx($formService, 'offset', array("class" => "e-form-label")); ?>
			<?php echo $form->error($formService, 'offset', array("class" => "e-form-error-message")); ?></div>
	
	
			<div class="labelWrap__item"><?php echo $form->checkBox($formService, 'commission', array("class" => "e-form-input")); ?>
			<?php echo $form->labelEx($formService, 'commission', array("class" => "e-form-label")); ?>
			<?php echo $form->error($formService, 'commission', array("class" => "e-form-error-message")); ?></div>
		</div>
	</div>
	<div class="clear"></div>
    <div class="e-form-row">
        <?php echo $form->labelEx($formService, 'comment', array("class" => "e-form-label")); ?>
        <?php echo $form->textArea($formService, 'comment', array("class" => "e-form-input")); ?>
        <?php echo $form->error($formService, 'comment', array("class" => "e-form-error-message")); ?>
    </div>
</div>

    <div class="b_content_acceptRequestContentBox_bottom_acceptButton"><?php echo CHtml::submitButton(Yii::t('app', 'Отправить'), array('class' => 'button product-actions__buy-offline product-actions__buy-online')); ?></div>
	<div class="b_content_acceptRequestContentBox_bottom_declineButton"><?php echo CHtml::link(Yii::t('app', 'Отказаться'), array('tradeIn/denial','hash'=>$model->hash)); ?></div>

<?php $this->endWidget(); ?>
</div>
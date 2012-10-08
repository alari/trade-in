<?php
/* @var $this ApplianceController */
/* @var $model Appliance */
/* @var $form CActiveForm */


$years = array();
$startYear = Yii::app()->params['appliance']['form']['year']['start'];
for($i=$startYear;$i<=date('Y');$i++){
    $years[$i] = $i;
}

$volumes = array();
$startVolume =  Yii::app()->params['appliance']['form']['volume']['startVolume'];
$endVolume =  Yii::app()->params['appliance']['form']['volume']['endVolume'];
for($i=$startVolume;$i<=$endVolume;$i+=0.1){
    $volumes["$i"] = $i;
}

$cs = Yii::app()->getClientScript();

$js = <<<EOP
$(function(){

                            $.ajax({
                                    url: '/tradeIn/GetBrandModel',
                                    type: 'post',
                                    data: 'brand='+$('.carBrand').val(),
                                    dataType: 'json',
                                    success: function(json) {
                                                   var options = '';
                                                   for (i in json) {
                                                        options += json[i];
                                                    }
                                                    $('.carModel').html(options);
                                                    $('.carModel').val('$model->car_model_id');
                                    }

                            });


    $('.carBrand').change(function(){
        var brand_id = $(this).val();
                            $.ajax({
                                    url: '/tradeIn/GetBrandModel',
                                    type: 'post',
                                    data: 'brand='+brand_id,
                                    dataType: 'json',
                                    success: function(json) {
                                                   var options = '';
                                                   for (i in json) {
                                                        options += json[i];
                                                    }
                                                    $('.carModel').html(options);
                                    }

                            });
    });



});
EOP;
// Register js code
$cs->registerScript('Yii.' . get_class($this) . '#form', $js, CClientScript::POS_READY);


?>
<? echo CHtml::link('Назад к списку предложений',array('tradeIn/account','hash'=>$model->hash))?>
<div class="form">

    <?php $form = $this->beginWidget('ext.shared-core.widgets.ExtForm', array(
    "model"=>$model,
    'id' => 'appliance-form',
    'enableAjaxValidation' => false,
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
        CHtml::listData(CarBrand::model()->findAll(), 'id', 'title'),array('class'=>'carBrand')); ?>
        <?php echo $form->error($model,'car_brand_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'car_model_id'); ?>
        <?php echo $form->dropDownList($model, 'car_model_id', array('Модель'),array('class'=>'carModel') ); ?>
        <?php echo $form->error($model,'car_model_id'); ?>
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
        <?php echo $form->dropDownList($model, 'salon', Yii::app()->params['appliance']['form']['salon']); ?>
        <?php echo $form->error($model,'salon'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'condition'); ?>
        <?php echo $form->dropDownList($model, 'condition', Yii::app()->params['appliance']['form']['condition']); ?>
        <?php echo $form->error($model,'condition'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'year'); ?>
        <?php echo $form->dropDownList($model, 'year', $years); ?>
        <?php echo $form->error($model,'year'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'engine'); ?>
        <?php echo $form->dropDownList($model, 'engine', Yii::app()->params['appliance']['form']['engine']); ?>
        <?php echo $form->error($model,'engine'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'volume'); ?>
        <?php echo $form->dropDownList($model, 'volume', $volumes); ?>
        <?php echo $form->error($model,'volume'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'gearbox'); ?>
        <?php echo $form->dropDownList($model, 'gearbox', Yii::app()->params['appliance']['form']['gearbox']); ?>
        <?php echo $form->error($model,'gearbox'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'transmission'); ?>
        <?php echo $form->dropDownList($model, 'transmission', Yii::app()->params['appliance']['form']['transmission']); ?>
        <?php echo $form->error($model,'transmission'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'desired_price'); ?>
        <?php echo $form->textField($model,'desired_price',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'desired_price'); ?>
    </div>

    <?$form->inject()?>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<? echo CHtml::link('Назад к списку предложений',array('tradeIn/account','hash'=>$model->hash))?>
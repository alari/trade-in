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
$cs->registerScriptFile('/files/load-image.min.js');
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


    $('.removePreview').live('click',function(){
        
		var id = $(this).parent().parent().find('input[type="file"]').attr('id');
		var inpfile = $(this).parent().parent();
		inpfile.find('input[type="file"]').remove();
		inpfile.append('<input type="file" name="'+ id +'" id="'+ id +'" class="upload-box">');
		$(this).parent().html('');

    });

    //previev image upload
       var prefixImageId = 'preview_';
       var imageContainer = false;
       var result = $('.well2'),
        load = function (e) {
            e = e.originalEvent;
            e.preventDefault();
            window.loadImage(
                (e.dataTransfer || e.target).files[0],
                function (img) {
                    /*if(imageContainer){
                        // img /// HTMLImageElement
                        $('#'+prefixImageId+e.target.id).remove();
                        img.id = prefixImageId+e.target.id;
                        result.append(img);
                    }else{*/
                        var container = $('#'+prefixImageId+e.target.id);
						container.find('.removePreview').remove();
                        container.append(img);
                        container.append('<img class="removePreview" src="/image/close-button.png" />');
                    //}

                },
                {
                    maxWidth: 73,
                    maxHeight: 73,
                    //canvas: true //canvas or img

                }
            );
        };

    $('input[type="file"]').live('change', load);
	
	$('.file_click').live('click',function(){
		$(this).parent().find('input[type="file"]').click();
	});
});

EOP;
// Register js code
$cs->registerScript('Yii.' . get_class($this) . '#form', $js, CClientScript::POS_READY);
 //ng-controller='MyController'
?>
	<h2>Заполните форму и получите предложения от салонов</h2>
<div class="form">
    <?php $form = $this->beginWidget('ext.shared-core.widgets.ExtForm', array(
    "model"=>$model,
    'enableAjaxValidation' => false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'email'); ?></legend>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'car_brand_id'); ?></legend>
        <?php echo $form->dropDownList($model, 'car_brand_id',
        CHtml::listData(CarBrand::model()->findAll(), 'id', 'title'),array('class'=>'carBrand')); ?>
        <?php echo $form->error($model,'car_brand_id'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'car_model_id'); ?></legend>
        <?php echo $form->dropDownList($model, 'car_model_id', array('Модель'),array('class'=>'carModel') ); ?>
        <?php echo $form->error($model,'car_model_id'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'color'); ?></legend>
        <?php echo $form->textField($model,'color',array('size'=>60,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'color'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'mileage'); ?></legend>
        <?php echo $form->textField($model,'mileage'); ?>
        <?php echo $form->error($model,'mileage'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'salon'); ?></legend>
        <?php echo $form->dropDownList($model, 'salon', Yii::app()->params['appliance']['form']['salon']); ?>
        <?php echo $form->error($model,'salon'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'condition'); ?></legend>
        <?php echo $form->dropDownList($model, 'condition', Yii::app()->params['appliance']['form']['condition']); ?>
        <?php echo $form->error($model,'condition'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'year'); ?></legend>
        <?php echo $form->dropDownList($model, 'year', $years); ?>
        <?php echo $form->error($model,'year'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'engine'); ?></legend>
        <?php echo $form->dropDownList($model, 'engine', Yii::app()->params['appliance']['form']['engine']); ?>
        <?php echo $form->error($model,'engine'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'volume'); ?></legend>
        <?php echo $form->dropDownList($model, 'volume', $volumes); ?>
        <?php echo $form->error($model,'volume'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'gearbox'); ?></legend>
        <?php echo $form->dropDownList($model, 'gearbox', Yii::app()->params['appliance']['form']['gearbox']); ?>
        <?php echo $form->error($model,'gearbox'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'transmission'); ?></legend>
        <?php echo $form->dropDownList($model, 'transmission', Yii::app()->params['appliance']['form']['transmission']); ?>
        <?php echo $form->error($model,'transmission'); ?>
    </div>

    <div class="row">
        <legend class="star"><?php echo $form->labelEx($model,'desired_price'); ?></legend>
        <?php echo $form->textField($model,'desired_price',array('size'=>60,'maxlength'=>200)); ?>
        <?php echo $form->error($model,'desired_price'); ?>
    </div>
</div>
<div class="sidebar">
	<p>Добавить файл</p>
    <?$form->inject()?>
</div>
<div class="clear"></div>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Отправить заявку' : 'Save'); ?>

    <?php $this->endWidget(); ?>


<?php
/* @var $this ApplianceController */
/* @var $data Appliance */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hash')); ?>:</b>
	<?php echo CHtml::encode($data->hash); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_brand_id')); ?>:</b>
	<?php echo CHtml::encode($data->car_brand_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('car_model')); ?>:</b>
	<?php echo CHtml::encode($data->car_model); ?>
	<br />


</div>
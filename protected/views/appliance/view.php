<?php
/* @var $this ApplianceController */
/* @var $model Appliance */

$this->breadcrumbs=array(
	'Appliances'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Appliance', 'url'=>array('index')),
	array('label'=>'Create Appliance', 'url'=>array('create')),
	array('label'=>'Update Appliance', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Appliance', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Appliance', 'url'=>array('admin')),
);
?>

<h1>View Appliance #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'email',
		'hash',
		'car_brand_id',
		'car_model',
	),
)); ?>

<?php
/* @var $this ApplianceController */
/* @var $model Appliance */

$this->breadcrumbs=array(
	'Appliances'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Appliance', 'url'=>array('index')),
	array('label'=>'Create Appliance', 'url'=>array('create')),
	array('label'=>'View Appliance', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Appliance', 'url'=>array('admin')),
);
?>

<h1>Update Appliance <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
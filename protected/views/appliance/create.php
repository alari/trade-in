<?php
/* @var $this ApplianceController */
/* @var $model Appliance */

$this->breadcrumbs=array(
	'Appliances'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Appliance', 'url'=>array('index')),
	array('label'=>'Manage Appliance', 'url'=>array('admin')),
);
?>

<h1>Create Appliance</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
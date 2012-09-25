<?php
/* @var $this ApplianceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Appliances',
);

$this->menu=array(
	array('label'=>'Create Appliance', 'url'=>array('create')),
	array('label'=>'Manage Appliance', 'url'=>array('admin')),
);
?>

<h1>Appliances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

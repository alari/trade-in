<?php
/* @var $this ServiceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Services',
);

$this->menu=array(
	array('label'=>'Create Service', 'url'=>array('create')),
	array('label'=>'Manage Service', 'url'=>array('admin')),
);
?>

<h1>Сервисы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

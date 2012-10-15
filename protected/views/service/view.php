<div class="service">
<?php
/* @var $this ServiceController */
/* @var $model Service */

$this->breadcrumbs=array(
	'Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Service', 'url'=>array('index')),
	array('label'=>'Create Service', 'url'=>array('create')),
	array('label'=>'Update Service', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Service', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Service', 'url'=>array('admin')),
);

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU');
$js = <<<EOP
$(function(){


        // Как только будет загружен API и готов DOM, выполняем инициализацию
        ymaps.ready(init);

        function init () {
            // Поиск координат
            ymaps.geocode('$model->address', { results: 1 }).then(function (res) {
                // Выбираем первый результат геокодирования
                var firstGeoObject = res.geoObjects.get(0);

                // Создаём карту.
                // Устанавливаем центр и коэффициент масштабирования.
                window.myMap = new ymaps.Map("map", {
                    center: firstGeoObject.geometry.getCoordinates(),
                    zoom: 16,
                    behaviors: ['default', 'scrollZoom']
                });

                myMap.controls
                        .add('zoomControl');


                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                    balloonContent: '$model->title'
                });
                // Добавляем полученную коллекцию на карту
                myMap.geoObjects.add(myPlacemark);

            }, function (err) {
                // Если геокодирование не удалось,
                // сообщаем об ошибке
                alert(err.message);
            })
        }
});
EOP;
// Register js code
$cs->registerScript('Yii.' . get_class($this) . '#map', $js, CClientScript::POS_READY);
?>

<h1>View Service #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        'title',
		'email',
		'phone',
		'address',
	),
)); ?>

<div id="map" style="width: 400px; height: 300px"></div>
</div>
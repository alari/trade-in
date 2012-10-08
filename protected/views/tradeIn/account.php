<?php

$modelNegotiations = array();
foreach ($model->negotiations as $negotiation) {

    $modelNegotiations[$negotiation->status][] = $negotiation;

}

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU');
$js = <<<EOP
$(function(){

    $('.closeMap').click(function(){
        $('#map'+$(this).attr('id')).html('');
        $('#map'+$(this).attr('id')).parent().fadeOut();
    });

    $('.getMap').click(function(){

        var address = $(this).attr('salon-address');
        var salonNane = $(this).attr('salon-name');
        var salonId = $(this).attr('salon-id');

        $('#map'+salonId).html('');
        $('#map'+salonId).parent().fadeIn();

        // Как только будет загружен API и готов DOM, выполняем инициализацию
        ymaps.ready(init);

        function init () {
            // Поиск координат
            ymaps.geocode(address, { results: 1 }).then(function (res) {
                // Выбираем первый результат геокодирования
                var firstGeoObject = res.geoObjects.get(0);

                // Создаём карту.
                // Устанавливаем центр и коэффициент масштабирования.
                window.myMap = new ymaps.Map("map"+salonId, {
                    center: firstGeoObject.geometry.getCoordinates(),
                    zoom: 15,
                    behaviors: ['default', 'scrollZoom']
                });

                myMap.controls
                        .add('zoomControl');


                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                    balloonContent: salonNane
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
});
EOP;
// Register js code
$cs->registerScript('Yii.' . get_class($this) . '#map', $js, CClientScript::POS_READY);

?>

  <? echo CHtml::link('Изменить анкету',array('tradeIn/accountUpdate','hash'=>$model->hash))?>
<? if (isset($modelNegotiations['tender'])) {?>
    <br><br>
        Предложения для вас:
    <table>
        <thead>

            <th>
                Салон
            </th>
            <th>
                Адрес и контакты
            </th>
            <th>
                Имя менеджера
            </th>
            <th>
                Комментарий
            </th>
            <th>
                Предлогаемая цена
            </th>

        </thead>
    <?foreach ($modelNegotiations['tender'] as $negotiation) { ?>
        <tr>

            <td>
                <? if(count($negotiation->service->picHolder->images)){
                    foreach ($negotiation->service->picHolder->images as $im) { ?>
                        <? echo CHtml::image($im->getSrc('tiny')); break; ?>
                   <? }
                } ?>
                <? echo $negotiation->service->title;?>
            </td>
            <td>
                <? echo $negotiation->service->address;?>
                <br>
                <span class="getMap" salon-address="<? echo $negotiation->service->address;?>" salon-id="<? echo $negotiation->service->id;?>" salon-name="<? echo $negotiation->service->title;?>">
                    показать на карте
                </span>
                <br>
                <? //echo $negotiation->service->phone;?>
                <? echo number_format($negotiation->service->phone,0,'.','-');?>
                <div class="map-block">
                    <div id="<? echo $negotiation->service->id;?>" class="closeMap">X</div>
                    <div id="map<? echo $negotiation->service->id;?>" style="width: 400px; height: 300px"></div>
                </div>
            </td>
            <td>
                <? echo $negotiation->manager_name;?>
            </td>
            <td>
                <? if ($negotiation->ransom || $negotiation->offset || $negotiation->commission ) {?> Салон готов предложить: <? }?>
                <?  $modelForm = new ServiceForm(); $translate = $modelForm->attributeLabels();?>
                <? echo (($negotiation->ransom == 1) ? $translate['ransom'].'<br>' : '' ); ?>
                <? echo (($negotiation->offset == 1) ? $translate['offset'].'<br>' : '' ); ?>
                <? echo (($negotiation->commission == 1) ? $translate['commission'].'<br>' : '' ); ?>
                <br>
                <? echo $negotiation->comment;?>
            </td>
            <td>
                <? echo number_format($negotiation->price,0,'.',' ');?> р.
            </td>

        </tr>
    <? }?>
    </table>
<? } ?>


<? if (isset($modelNegotiations['denial'])) {?>
    <br><br>
    Отказы:
    <table>
        <thead>

        <th>
            Салон
        </th>
        <th>
            Причина отказа
        </th>

        </thead>
        <?foreach ($modelNegotiations['denial'] as $negotiation) { ?>
        <tr>

            <td>

                <? echo $negotiation->service->title;?>
            </td>
            <td>

                <?  $modelForm = new DenialForm(); $translate = $modelForm->attributeLabels();?>
                <? echo (($negotiation->disrepair == 1) ? $translate['disrepair'].'<br>' : '' ); ?>
                <? echo (($negotiation->unliquidated == 1) ? $translate['unliquidated'].'<br>' : '' ); ?>
                <? echo (($negotiation->inappropriate == 1) ? $translate['inappropriate'].'<br>' : '' ); ?>
                <br>
                <? echo $negotiation->comment;?>
            </td>


        </tr>
        <? }?>
    </table>
<? } ?>
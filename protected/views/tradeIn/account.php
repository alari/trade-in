<div class="l_content">
<?php

$modelNegotiations = array();
foreach ($model->negotiations as $negotiation) {

    $modelNegotiations[$negotiation->status][] = $negotiation;

}

$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('http://api-maps.yandex.ru/2.0-stable/?load=package.standard&lang=ru-RU');
$js = <<<EOP
$(function(){
	
	$('.comment-read').click(function() {
      $('.comment-block').fadeIn();
    });
	
	
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
<div class="b-account">
<!--  <? echo CHtml::link('Изменить анкету',array('tradeIn/accountUpdate','hash'=>$model->hash), array("class"=>"b-account_content_link"))?>
<? if (isset($modelNegotiations['tender'])) {?>-->
        <span class="b_contnt_account_header_span">Предложения для вас:</span>
	<table class="b_content_account_table">
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

            <td class="b_content_account_table_td">
                <? if(count($negotiation->service->picHolder->images)){
                    foreach ($negotiation->service->picHolder->images as $im) { ?>
                        <? echo CHtml::image($im->getSrc('tiny')); break; ?>
                   <? }
                } ?>
                <? echo $negotiation->service->title;?>
            </td>
			
            <td class="b_content_account_table_td_position b_content_account_table_td">
                <span class="b_content_account_table_address"><? echo $negotiation->service->address;?>
                <span class="getMap" salon-address="<? echo $negotiation->service->address;?>" salon-id="<? echo $negotiation->service->id;?>" salon-name="<? echo $negotiation->service->title;?>">
                    <span class="viewmap">Посмотреть на карте</span>
                </span>
				<br>
                <? //echo $negotiation->service->phone;?>
                <? echo number_format($negotiation->service->phone,0,'.','-');?>
                <div class="map-block" style="display:none;"><div id="<? echo $negotiation->service->id;?>" class="closeMap"></div>
                    <div id="map<? echo $negotiation->service->id;?>" style="width: 400px; height: 300px"></div>
                </div>
            </td>
			
            <td class="b_content_account_table_td">
                <? echo $negotiation->manager_name;?>
            </td>
			
            <td class="b_content_account_table_td">
				<div class="comment-read">Читать</div>
				<div class="comment-block" style="display:none;">
					<div id="comment<? echo $negotiation->service->id;?>" >
					<? if ($negotiation->ransom || $negotiation->offset || $negotiation->commission ) {?> Салон готов предложить: <? }?>
					<?  $modelForm = new ServiceForm(); $translate = $modelForm->attributeLabels();?>
					<? echo (($negotiation->ransom == 1) ? $translate['ransom'].'<br>' : '' ); ?>
					<? echo (($negotiation->offset == 1) ? $translate['offset'].'<br>' : '' ); ?>
					<? echo (($negotiation->commission == 1) ? $translate['commission'].'<br>' : '' ); ?>
					<br>
					<? echo $negotiation->comment;?>
					</div>
				</div>
            </td>
			
            <td class="b_content_account_table_td_lastchild">
                <? echo number_format($negotiation->price,0,'.',' ');?> р.
            </td>

        </tr>
    <? }?>
    </table>
<? } ?>
<div class="b-account_bottom">
<? if (isset($modelNegotiations['denial'])) {?>
    <span class="b-account_bottom__span">Отказы:</span>
    <table class="b-account_bottom__table">
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
                <? echo $negotiation->comment;?>
            </td>


        </tr>
        <? }?>
    </table>
<? } ?>
</div>
</div>
</div>

<? foreach ($models as $model) { ?>
    <div>
        <? echo CHtml::link($model->title,$model->url());?>
    </div>
<? } ?>
<br>
<br>
<br>
<br>
<br>
<? foreach ($carBrands as $carBrand) { ?>
<div>
    <? echo CHtml::link($carBrand->title,$carBrand->url());?>
</div>
<? } ?>
<?php
/**
 * Created by JetBrains PhpStorm.
 * User: egor
 * Date: 25.09.12
 * Time: 17:42
 * To change this template use File | Settings | File Templates.
 */
?>
email : <? echo $model->email;?><br>
carBrand : <? echo $model->carBrand;?><br>
carModel : <? echo $model->car_model;?><br>
Images :<br>
<?foreach ($model->listHolder->images as $im) {
    echo CHtml::image($im->getSrc('tiny'));
}?>
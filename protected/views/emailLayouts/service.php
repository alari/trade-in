<?php
/**
 * Created by JetBrains PhpStorm.
 * User: egor
 * Date: 04.10.12
 * Time: 18:31
 * To change this template use File | Settings | File Templates.
 */
?>

Servece: <? echo $models[0]['service']['title'] ?>

<? foreach ($models as $model) { ?>
    <a href="<? echo Yii::app()->params['httpHost']?>/account/<? echo $model->hash ?>">CAR</a>
<? } ?>
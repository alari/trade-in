<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<meta name="language" content="ru" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
	
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>

<div class="l_body_frontcar"></div>
<div class="l_body_backcar"></div>

<div class="l_header">
	<div class="b_header__logo left">
		<a href="/"><img src="/image/logo.png" /></a>
	</div><!--b_header__menu-->
	<?php $this->widget('zii.widgets.CMenu',array(
		'items'=>array(
			array('label'=>'Главная', 'url'=>array('/tradeIn/index')),
			array('label'=>'Автосалоны', 'url'=>array('tradeIn/getServices')),
			array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
		),
		'itemCssClass' =>'b_header__menu__item',
		'htmlOptions' => array(
			'class'=>'b_header__menu',
		),
	)); ?>
	<!--b_header__menu-->
	<div class="clear"></div>
</div><!--l_header-->
<div class="l_wrapper">

		<?php echo $content; ?>
		
	<div class="clear"></div>

	<div class="l_footer">
		<?
			$criteria = new CDbCriteria;
			$criteria->join = 'LEFT JOIN tbl_held_image himg ON himg.holder_id = t.pic_holder_id';
			$criteria->condition = 'himg.holder_id is not null';
			$carBrands = CarBrand::model()->findAll($criteria);
			shuffle($carBrands);
			$i=0;
			echo '<ul class="b_footer_randomList">';
			foreach($carBrands as $brand){
			  $image = $brand->picHolder->images[0];
			  echo '<li class="b_footer_randomList__item">'.CHtml::image($image->getSrc('tiny'),$brand->title).'</li>';
			  if(++$i == 10) break;
			}
			echo '</ul>';
    	?>
	</div><!--l_footer-->
	<div class="l_license">
		<p class="b_license__p">Компания "Тактика"</p> <a href="http://itaktika.ru" title="Компания Тактика"><img src="/image/taktika_logo.png" alt="Компания Тактика" /></a>
	</div><!--l_license-->
</div><!--l_wrapper-->
</body>
</html>

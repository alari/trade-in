<?php /* @var $this Controller */ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
	<meta name="language" content="ru" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="front_car"></div>
<div class="back_car"></div>
<div class="bg_header">
	<div class="wrapper">
		<div class="header">
			<div class="logo">
				<a href="#"><img src="/assets/image/logo.png" /></a>
			</div>
			
			<div class="menu">
			<?php $this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Главная', 'url'=>array('/tradeIn/index')),
					array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about')),
					array('label'=>'Контакты', 'url'=>array('/site/contact')),
					array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
				),
				'itemCssClass' =>'li class',
				'htmlOptions' => array(
					'class'=>'ul class',
				),
			)); ?>
			</div><!-- mainmenu -->
			<div class="clear"></div>
			<div class="pusto">
				Это пустой блок
			</div>
		</div>
	</div>
</div>
<div class="wrapper">
	<div class="content">
		<?php echo $content; ?>
	</div>
	<div class="clear"></div>

	<div class="footer">
		<?
			$criteria = new CDbCriteria;
			$criteria->join = 'LEFT JOIN tbl_held_image himg ON himg.holder_id = t.pic_holder_id';
			$criteria->condition = 'himg.holder_id is not null';
			$carBrands = CarBrand::model()->findAll($criteria);
			shuffle($carBrands);
			$i=0;
			echo '<ul>';
			foreach($carBrands as $brand){
			  $image = $brand->picHolder->images[0];
			  echo '<li>'.CHtml::image($image->getSrc('tiny'),$brand->title).'</li>';
			  if(++$i == 10) break;
			}
			echo '</ul>';
    	?>
	</div><!-- footer -->
	<div class="license">
		<p>Компания "Тактика"</p> <a href="http://itaktika.ru" title="Компания Тактика"><img src="/assets/image/taktika_logo.png" alt="Компания Тактика" /></a>
	</div>
</div><!-- page -->
</body>
</html>

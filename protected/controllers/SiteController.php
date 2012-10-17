<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionParserLogo(){
        $brands = CarBrand::model()->findAll();

        foreach($brands as $brand){
            /*//$img = 'http://auto.dmir.ru/img/bglogo/'.str_replace(' ','-',strtolower(trim($brand->title))).'.jpg';
            $img = 'http://assets.a1.ru/brand/logo/5/'.str_replace(' ','',strtolower(trim($brand->title))).'-small_thumb.png';
            $headers_array = get_headers($img);//отсылаем запрос
            $request = $headers_array[0];//выбираем главный ответ сервера
            if ($request != 'HTTP/1.1 404 Not Found' && $request != 'HTTP/1.1 400 Bad Request' ){
                $im = new HeldImage();
                $im->holder_id = $brand->picHolder->id;
                $im->title = trim($brand->title);
                if ($im->save()) {
                    $im->setImageFile($img, 'png');
                    $im->save();
                }
            }*/

            $img = glob('img_brand/'.str_replace(' ','',strtolower(trim($brand->title))).'*');
            if (count($img) && file_exists($img['0'])){
                $im = new HeldImage();
                $im->holder_id = $brand->picHolder->id;
                $im->title = trim($brand->title);
                if ($im->save()) {
                    $im->setImageFile($img['0'], 'png');
                    $im->save();
                }
            }

        }


    }

    public function actionReSaveCarBrand(){

        foreach(CarBrand::model()->findAll() as $carBrand){
            $carBrand->save();
        }
    }

    public function actionAddMarks(){
        $marks = array(
            "Alfa Romeo" => "Alfa Romeo",
            "Audi" => "Audi",
            "BMW" => "BMW",
            "BYD" => "BYD",
            "Cadillac" => "Cadillac",
            "Cherry" => "Cherry",
            "Chevrolet" => "Chevrolet",
            "Chrysler" => "Chrysler",
            "Citroen" => "Citroen",
            "Daewoo" => "Daewoo",
            "Daihatsu" => "Daihatsu",
            "Derways" => "Derways",
            "Dodge" => "Dodge",
            "FAW" => "FAW",
            "Fiat" => "Fiat",
            "Ford" => "Ford",
            "Geely" => "Geely",
            "GMC" => "GMC",
            "Great Wall" => "Great Wall",
            "Honda" => "Honda",
            "HOWO" => "HOWO",
            "Hummer" => "Hummer",
            "Hyundai" => "Hyundai",
            "Infiniti" => "Infiniti",
            "Isuzu" => "Isuzu",
            "IVECO" => "IVECO",
            "Jaguar" => "Jaguar",
            "Jeep" => "Jeep",
            "KAWASAKI" => "KAWASAKI",
            "Kia" => "Kia",
            "Kubistar" => "Kubistar",
            "Lamberet" => "Lamberet",
            "Lancia" => "Lancia",
            "Land Rover" => "Land Rover",
            "Lexus" => "Lexus",
            "Lifan" => "Lifan",
            "Lincoln" => "Lincoln",
            "Mazda" => "Mazda",
            "Mercedes Benz" => "Mercedes Benz",
            "Mini" => "Mini",
            "Mitsubishi" => "Mitsubishi",
            "Narko" => "Narko",
            "Nissan" => "Nissan",
            "Nissan Datsun" => "Nissan Datsun",
            "Opel" => "Opel",
            "Peugeot" => "Peugeot",
            "Pontiac" => "Pontiac",
            "Porsche" => "Porsche",
            "Renault" => "Renault",
            "Renders" => "Renders",
            "SAAB" => "SAAB",
            "Sang Yong" => "Sang Yong",
            "Schimitz" => "Schimitz",
            "Seat" => "Seat",
            "Skoda" => "Skoda",
            "Ssang Yong" => "Ssang Yong",
            "Subaru" => "Subaru",
            "Suzuki" => "Suzuki",
            "Toyota" => "Toyota",
            "Volga" => "Volga",
            "Volkswagen" => "Volkswagen",
            "Volvo" => "Volvo",
            "Yutong" => "Yutong",
            "ВАЗ" => "ВАЗ",
            "ГАЗ" => "ГАЗ",
            "ЗАЗ" => "ЗАЗ",
            "ЗИЛ" => "ЗИЛ",
            "ИЖ" => "ИЖ",
            "УАЗ" => "УАЗ",
        );

        foreach($marks as $mark){
            $carBrand = new CarBrand();
            $carBrand->title = $mark;
            $carBrand->save();
        }


    }

    public function actionAddModels(){
        include('simple_html_dom.php');

        $brands = CarBrand::model()->findAll();

        foreach($brands as $brand){
            if( $curl = curl_init() ) {
                curl_setopt($curl, CURLOPT_URL, 'http://www.ctk-trade-in.ru/forms/comissionForm/');
                curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, "comission_brand=".$brand['title']);
                $out = curl_exec($curl);
                $html = str_get_html($out);

                curl_close($curl);

                foreach($html->find('select[name="comission_model"]') as $e){
                    foreach($e->find('option') as $option){
                        $model = new CarModel();
                        $model->title = $option->value;
                        $model->car_brand_id = $brand['id'];
                        $model->save();
                    }
                }


            }
        }

    }
}
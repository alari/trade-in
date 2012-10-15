<?php
/**
 * Created by JetBrains PhpStorm.
 * User: egor
 * Date: 24.09.12
 * Time: 16:24
 * To change this template use File | Settings | File Templates.
 */
class TradeInController extends Controller
{
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionApplyForm(){

        $this->render('formStep1',array());
    }

    public function actionAccount($hash){
        $status = 'tender';
        if($_POST){
            if($_POST['ServiceForm']){

                $model = Negotiation::model()->findByAttributes(array("hash"=>$hash));;
                $model->price = (int) str_replace(' ','',$_POST['ServiceForm']['price']);
                $model->ransom = $_POST['ServiceForm']['ransom'];
                $model->offset = $_POST['ServiceForm']['offset'];
                $model->commission = $_POST['ServiceForm']['commission'];
                $model->manager_name = $_POST['ServiceForm']['managerName'];
                $model->comment = $_POST['ServiceForm']['comment'];
                $model->status = $status;
                $model->save();
                $this->render('sendForm');
            }

        }else{

            $model = Appliance::model()->findByAttributes(array("hash"=>$hash));
            if(!is_object($model)){
                $model = Negotiation::model()->findByAttributes(array("hash"=>$hash));
                if($model->status == 'wait'){
                $formService = new ServiceForm();
                $this->render('service',array('model'=>$model,'formService' => $formService));
                }else{
                    $this->render('negotiationClosed');
                }
            }else{

            $this->render('account',array('model'=>$model));
            }
        }
    }

    public function actionDenial($hash){
        $status = 'denial';
        if($_POST){
            if($_POST['DenialForm']){
                $model = Negotiation::model()->findByAttributes(array("hash"=>$hash));
                $model->disrepair = $_POST['DenialForm']['disrepair'];
                $model->unliquidated = $_POST['DenialForm']['unliquidated'];
                $model->inappropriate = $_POST['DenialForm']['inappropriate'];
                $model->comment = $_POST['DenialForm']['comment'];
                $model->status = $status;
                $model->save();
                $this->render('sendForm');
            }
        }else{
            $model = Negotiation::model()->findByAttributes(array("hash"=>$hash));
            if($model->status == 'wait'){
                $formService = new DenialForm();
                $this->render('denialForm',array('formService' => $formService,'model'=>$model));
            }else{
                $this->render('negotiationClosed');
            }
        }
    }

    public function actionIndex()
    {
        $model=new Appliance;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Appliance']))
        {
            $model->attributes=$_POST['Appliance'];
            if($model->save()){

                foreach($model->carBrand->services as $service){
                    $negotiation = new Negotiation();
                    $negotiation->hash = uniqid('service');
                    $negotiation->mail_status = 'wait';
                    $negotiation->service_id = $service->id;
                    $negotiation->appliance_id = $model->id;
                    $negotiation->status = 'wait';
                    $negotiation->save();
                }

                $this->redirect(array('tradeIn/account','hash'=>$model->hash));
            }
        }

        $this->render('index',array(
            'model'=>$model,
        ));
    }

    public function actionAccountUpdate($hash)
    {
        $model= Appliance::model()->findByAttributes(array('hash'=>$hash));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Appliance']))
        {
            $model->attributes=$_POST['Appliance'];
            if($model->save())
                $this->redirect(array('tradeIn/account','hash'=>$model->hash));
        }

        $this->render('updateAccount',array(
            'model'=>$model,
        ));
    }

    public function actionGetBrandModel(){
        $brand = $_POST['brand'];
        if ($brand) {
            $model = CarModel::model()->findAllByAttributes(array('car_brand_id'=>$brand));

            $items = array();
            foreach ($model as $m) {
                $items[] = '<option value="'.$m->id.'">'.$m->title.'</option>';
            }
            echo CJSON::encode($items);
            Yii::app()->end();

        } else {
            echo "error";
            Yii::app()->end();
        }
    }

    public function actionGetServices($carBrand = 'all'){

        if($carBrand!='all'){

            $carBrandModel = CarBrand::model()->findByAttributes(array('path'=>$carBrand));

            $criteria = new CDbCriteria;
            $criteria->join = 'JOIN {{car_brand_to_service}} on t.id={{car_brand_to_service}}.service_id';
            $criteria->condition = 'car_brand_id='. $carBrandModel->id ;

            $services = Service::model()->findAll($criteria);
        }else{
            $services = Service::model()->findAll();
        }

        $carBrands = CarBrand::model()->findAll();

        $this->render('listServices',array(
            'models'=>$services,
            'carBrands' => $carBrands,
        ));
    }

}

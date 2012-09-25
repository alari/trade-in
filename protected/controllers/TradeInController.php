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

        if($_POST){
            if($_POST['ServiceForm']){
                $model = Negotiation::model()->findByAttributes(array("hash"=>$hash));;
                $model->price = $_POST['ServiceForm']['price'];
                $model->ransom = $_POST['ServiceForm']['ransom'];
                $model->offset = $_POST['ServiceForm']['offset'];
                $model->commission = $_POST['ServiceForm']['commission'];
                $model->comment = $_POST['ServiceForm']['comment'];
                $model->save();
                $this->render('sendForm');
            }

        }else{

            $model = Appliance::model()->findByAttributes(array("hash"=>$hash));
            if(!is_object($model)){
                $model = Negotiation::model()->findByAttributes(array("hash"=>$hash));
                $formService = new ServiceForm();
                $this->render('service',array('model'=>$model,'formService' => $formService));
            }else{

            $this->render('account',array('model'=>$model));
            }
        }
    }

    public function actionDenial($hash){

        if($_POST){
            if($_POST['DenialForm']){
                $model = Negotiation::model()->findByAttributes(array("hash"=>$hash));;
                $model->disrepair = $_POST['DenialForm']['disrepair'];
                $model->unliquidated = $_POST['DenialForm']['unliquidated'];
                $model->inappropriate = $_POST['DenialForm']['inappropriate'];
                $model->comment = $_POST['DenialForm']['comment'];
                $model->save();
                $this->render('sendForm');
            }
        }else{

        $formService = new DenialForm();
        $this->render('denialForm',array('formService' => $formService));

        }
    }

}

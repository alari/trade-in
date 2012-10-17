<?php
/**
 * Created by JetBrains PhpStorm.
 * User: egor
 * Date: 04.10.12
 * Time: 16:03
 * To change this template use File | Settings | File Templates.
 */
class EmailStackSenderCommand extends CConsoleCommand
{
    public function run(array $args) {
        $this->mailBuilder();
        echo "\n";

    }

    public function getAppliances(){

        $criteria = new CDbCriteria;
        $criteria->condition = 'mail_status = "wait"';

        $appliances = Appliance::model()->findAll($criteria);
        foreach($appliances as $appliance){
            $appliance->mail_status = 'processing';
            $appliance->save();
        }
       return $appliances;
    }

    public function getNegotiations(){
        $serviceNegotiations = array();

        $criteria = new CDbCriteria;
        $criteria->condition = 'mail_status = "wait"';

        $negotiations = Negotiation::model()->findAll($criteria);
        foreach ($negotiations as $negotiation) {
            $negotiation->mail_status = 'processing';
            $negotiation->save();
            $serviceNegotiations[$negotiation->service->id][] = $negotiation;
        }
        return $serviceNegotiations;

    }

    public function mailBuilder(){

        foreach($this->getAppliances() as $appliance){
            $layout = dirname(__FILE__)"/../views/emailLayouts/appliance.php";
            $content = $this->renderFile($layout, array('model'=>$appliance), true);
            Yii::app()->getModule("emailSender")->send($appliance->email, 'USER ACCOUNT', $content);

            $appliance->mail_status = 'sent';
            echo "user sent \n";
            $appliance->save();
        }

        foreach($this->getNegotiations() as $service){
            $serviceNegotiations = array();

            foreach($service as $negotiation){
                $serviceNegotiations[] = $negotiation;

            }

            $layout = dirname(__FILE__)"/../views/emailLayouts/service.php";
            $content = $this->renderFile($layout, array('models'=>$serviceNegotiations), true);
            Yii::app()->getModule("emailSender")->send($serviceNegotiations['0']['service']['email'], 'NEW APPLIANCE', $content);
            foreach($serviceNegotiations as $negotiation){
                $negotiation->mail_status = 'sent';
                echo "service sent \n";
                $negotiation->save();
            }
        }


    }

    /*private function mailContent($mail, $caller)
    {
        $layout = $mail["list"] ? : "email-layout";
       // $layout = is_file(getcwd() . "/views/emailLayouts/appliance.php") ? getcwd() . "/views/emailLayouts/$layout.php" : null;
        $layout = "/views/emailLayouts/appliance.php";

        return $caller->renderFile($layout, $mail, true);
    }*/



}

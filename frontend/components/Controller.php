<?php

namespace frontend\components;

class Controller extends \yii\web\Controller{

    public function beforeAction($action)
    {
        $sid = @$_COOKIE['MoodleSession'];
        if(isset($sid) && !empty($sid)){
            $mdl_session = \common\models\MdlSessions::find()->where("sid=:sid and userid!=:userid", [':sid' => $sid, ":userid" => 0])->one();
            if($mdl_session){
                if(!empty($mdl_session->sessdata)){
                    $sessdata = \common\models\MdlSessions::unserializesession(base64_decode($mdl_session->sessdata));
                    $user_id = $sessdata['USER']->id;
                    if(isset($user_id) && !empty($user_id)){
                        \common\models\MdlUser::login($user_id);
                    }
                    else{
                        \common\models\MdlUser::login($mdl_session->userid);
                    }
                }
                else{
                    \common\models\MdlUser::login($mdl_session->userid);
                }
            }
            else{
                \common\models\MdlUser::logout();
            }
        }


        if($action->id == 'ajax-cabinet'){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
}
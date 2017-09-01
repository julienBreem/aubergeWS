<?php
namespace app\controllers;

use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use Yii;

class ServiceController extends Controller
{
    public $modelClass = 'app\models\Spot';


       public function behaviors()
       {

           $behaviors = parent::behaviors();
           if($_SERVER['REQUEST_METHOD']!='OPTIONS'){
               //echo $_SERVER['REQUEST_METHOD'];exit;
               $behaviors['bearerAuth'] = [
                   'class' => HttpBearerAuth::className(),
               ];
           }
           return $behaviors;

        }

    public function actions()
    {
        //$actions = parent::actions();
        //unset($actions['index']);
        //return $actions;
        return [];
    }
}

<?php
namespace app\controllers;

use app\models\Category;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use Yii;

class CategoriesController extends Controller
{
    public $modelClass = 'app\models\Category';

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        if($_SERVER['REQUEST_METHOD']!='OPTIONS' AND $_SERVER['REQUEST_METHOD']!='GET'){
            //echo $_SERVER['REQUEST_METHOD'];exit;
            $behaviors['bearerAuth'] = [
                'class' => HttpBearerAuth::className(),
            ];
        }
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        return $actions;
    }
}

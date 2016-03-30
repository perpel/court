<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\components\register\License;
use common\models\Court;

class CourtController extends Controller {

	public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
        ];
    }


    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ]
        ];
    }


    public function actionRegister() {
        $model = new Court;
        $request = Yii::$app->request;
        if ($request->isPost) {
            exit("123");
        }
        $script = "";
    	// $license = new License;
    	// var_dump($license);
    	return $this->render('register', [
            "model" => $model, 
            "script" => $script
        ]);
    }



}
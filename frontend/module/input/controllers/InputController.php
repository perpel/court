<?php

namespace frontend\module\input\controllers;

use Yii;
use yii\web\Controller;
use common\models\Common;
use yii\data\Pagination;

class InputController extends Controller
{

    public $enableCsrfValidation = false;
    public $toolBar = [];
    public $years = [];
    public $andwhere = [];
    public $_model;
    public $_action;
    public $_year = "all";

    public function actions(){

        $this->years = Common::years( date("Y"), "1995" ); //get Years
        $this->toolBar = $this->toolBar(); //get toolbar

        $request = Yii::$app->request;
        /*
        * get action
        */
        $this->_action = $request->get("action");
        $className = "\\frontend\\module\\input\\models\\" . ucfirst( $this->_action );
        $class = new \ReflectionClass( $className ); 
        $this->_model  = $class->newInstanceArgs();

        /*
        * and where
        */
        
        if( $request->isPost ){
            $this->andwhere = $this->andwhere( $request->post(ucfirst( $this->_action )) ); //get andwhere
        }elseif( $request->get("year") && $request->get("year") != "all" ){
            $this->andwhere[] = ["like", "Year", $request->get("year")];
            $this->_year = $request->get("year");
        }

    }

    public function actionIndex()
    {

        $model_info = $this->_model->find()->where(["DepartID"=>"20032"]);
        if( !empty($this->andwhere) ){
            foreach ($this->andwhere as $value) {
                $model_info = $model_info->andWhere($value);
            }
        }

        //$model_info = $model_info->asArray()->all();
        $pages = new Pagination(['totalCount' =>$model_info->count(), 'pageSize' => '2']);
        $model_info = $model_info->offset($pages->offset)->limit($pages->limit)->asArray()->all();

        return $this->render('index', [
            "model"=>$this->_model,
            "model_info"=>$model_info, 
            "tool_bar"=>$this->toolBar,
            "title"=>$this->_model->type . "录入", 
            "years"=>$this->years,
            "action"=>$this->_action,
            "y"=>$this->_year,
             'pages' => $pages,
        ]);
    }


    protected function toolBar(){

        return [
            "import"=>"导入",
            "add"=>"增加",
            "edit"=>"编辑",
            "del"=>"删除",
            "save-as"=>"另存为",
            "print"=>"打印",
            "search"=>"条件查询",
        ];

    }


}

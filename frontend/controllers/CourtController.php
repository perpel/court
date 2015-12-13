<?php

namespace frontend\controllers;

/*use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;*/

use Yii;
use yii\web\Controller;
use common\models\Common;
use yii\data\Pagination;
use common\models\Court;
use common\models\CourtLevel;
use yii\filters\AccessControl;
/**
 * Court controller
 */
class CourtController extends Controller{


    public $layout = "main";
    public $toolBar = [];
    public $years = [];
    public $andwhere = [];
    public $_model;
    public $_action;
    public $_year = "all";
    /**
     * @inheritdoc
     */
   public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'show'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {

        $this->years = Common::years( date("Y"), "1995" ); //get Years
        $this->toolBar = $this->toolBar(); //get toolbar


       return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index', ["years"=>$this->years, "tool_bar"=>$this->toolBar, "y"=>"2012"]);
    }

    protected function toolBar(){

        return [
            "register"=>"注册法院",
            "edit"=>"编辑法院",
            "save-as"=>"另存为",
            "print"=>"打印",
        ];

    }

    public function actionShow($court){

        $objCourt = new Court;
        $objCourt->findCourtById($court);
        $ids = implode(",", $objCourt->activeTreeIds);

        $subQueryAuto = (new \yii\db\Query())->select('(select @rowNO :=0)');
        $subQueryCourt = (new \yii\db\Query())->select('courtname,courtnumber,prefix_flownumber,register_date, up_level,b.name as court_type_level')
        ->from(["a"=>'{{%court}}', "b"=>'{{%court_level}}'])->where("a.level = b.id AND a.id in ($ids)");
        $model_info = (new \yii\db\Query())->select('(@rowNO := @rowNo+1) as rowno, t.*')
        ->from(['d' => $subQueryAuto, 't'=>$subQueryCourt])->orderby("up_level");

        //$model_info = $model_info->asArray()->all();
        $pages = new Pagination(['totalCount' =>$model_info->count(), 'pageSize' => '15']);
        $model_info = $model_info->offset($pages->offset)->limit($pages->limit)->all();
        //$sql = "select (@rowNO := @rowNo+1) AS rowno,t.* from (SELECT courtname,courtnumber,prefix_flownumber,register_date,b.name as court_type_level FROM `case_court` as a, case_court_level as b WHERE a.level = b.id AND a.id in ($ids) ) t,(select @rowNO :=0) d";
        //$model_info = Court::findBySql($sql)->asArray()->all();

        $this->layout = "blank";
        return $this->render("show", ["court_info"=>$model_info, "pages"=>$pages]);
    }
}
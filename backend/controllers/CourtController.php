<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\LoginForm;
use yii\filters\VerbFilter;

use common\models\Court;
use common\models\CourtLevel;
use common\models\Common;
use yii\data\Pagination;

/**
 * Site controller
 */
class CourtController extends Controller
{
    /**
     * @inheritdoc
     */
    public $_toolbars;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {

        $this->_toolbars = $this->toolBar();
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {

        $court = 0;
        $objCourt = new Court;
        $objCourt->findCourtById($court);
        $ids = implode(",", $objCourt->activeTreeIds);

        $subQueryAuto = (new \yii\db\Query())->select('(select @rowNO :=0)');
        $subQueryCourt = (new \yii\db\Query())->select('a.id,courtname,courtnumber, up_level,prefix_flownumber,register_date,b.name as court_type_level')
        ->from(["a"=>'{{%court}}', "b"=>'{{%court_level}}'])->where("a.level = b.id AND a.id in ($ids)");
        $model_info = (new \yii\db\Query())->select('(@rowNO := @rowNo+1) as rowno, t.*')
        ->from(['d' => $subQueryAuto, 't'=>$subQueryCourt]);

        //$model_info = $model_info->asArray()->all();
        $pages = new Pagination(['totalCount' =>$model_info->count(), 'pageSize' => '15']);
        $model_info = $model_info->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', ["toolbars"=>$this->_toolbars, "model_info"=>$model_info, "pages"=>$pages]);
    }

    protected function toolBar(){

        return [
            "register"=>"注册法院",
            "edit"=>"编辑法院",
            "save-as"=>"另存为",
            "print"=>"打印",
        ];

    }

}
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
/**
 * Court controller
 */
class CourtController extends Controller{

    public function actionIndex(){

        $courts = Court::find()->joinWith('level')->all();
        var_dump($courts);exit;
        $this->layout = "blank";
        return $this->render("index");
    }

    public function actionShow($court){

        $objCourt = new Court;
        $objCourt->findCourtById($court);
        $ids = implode(",", $objCourt->activeTreeIds);

        $subQueryAuto = (new \yii\db\Query())->select('(select @rowNO :=0)');
        $subQueryCourt = (new \yii\db\Query())->select('courtname,courtnumber,prefix_flownumber,register_date,b.name as court_type_level')
        ->from(["a"=>'{{%court}}', "b"=>'{{%court_level}}'])->where("a.level = b.id AND a.id in ($ids)");
        $model_info = (new \yii\db\Query())->select('(@rowNO := @rowNo+1) as rowno, t.*')
        ->from(['d' => $subQueryAuto, 't'=>$subQueryCourt]);

        //$model_info = $model_info->asArray()->all();
        $pages = new Pagination(['totalCount' =>$model_info->count(), 'pageSize' => '15']);
        $model_info = $model_info->offset($pages->offset)->limit($pages->limit)->all();
        //$sql = "select (@rowNO := @rowNo+1) AS rowno,t.* from (SELECT courtname,courtnumber,prefix_flownumber,register_date,b.name as court_type_level FROM `case_court` as a, case_court_level as b WHERE a.level = b.id AND a.id in ($ids) ) t,(select @rowNO :=0) d";
        //$model_info = Court::findBySql($sql)->asArray()->all();

        $this->layout = "blank";
        return $this->render("show", ["court_info"=>$model_info, "pages"=>$pages]);
    }
}
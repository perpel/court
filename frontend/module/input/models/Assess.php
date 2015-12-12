<?php

namespace frontend\module\input\models;

use Yii;

/**
 * This is the model class for table "case_assess".
 *
 * @property integer $ID
 * @property string $DepartID
 * @property string $Type
 * @property string $Year
 * @property string $CaseNumber
 * @property string $Supervise
 * @property string $SuperviseTel
 * @property string $FlowNumber
 * @property string $Case
 * @property string $LitigantOne
 * @property string $LitigantTwo
 * @property string $EntrustDeparment
 * @property string $Undertaker
 * @property string $UndertakerTel
 * @property string $TransferMaterial
 * @property string $SubjectMatter
 * @property string $Agency
 * @property string $Assessor
 * @property string $AssessorTel
 * @property string $ChoiceWay
 * @property string $ChoicedDate
 * @property string $CaseClosedDate
 * @property string $PutOnRecordDate
 * @property string $SuspendedDate
 * @property string $EntrustDate
 * @property string $MaterialsCompletionDate
 * @property string $RetractDate
 * @property string $SiteSurveyDate
 * @property string $GetbackDate
 * @property integer $GetbackCycle
 * @property string $Progress
 * @property string $Money
 * @property string $ChargesDate
 * @property string $Fee
 * @property string $DeliveryCourtDate
 * @property string $FllowResult
 * @property string $Remark
 * @property integer $Cycle
 * @property integer $PutOnRecordCycle
 * @property integer $EntrustCycle
 */
class Assess extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $type = "评估";

    public static function tableName()
    {
        return 'case_assess';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartID', 'Year', 'CaseNumber', 'FlowNumber', 'Case'], 'required'],
            [['GetbackCycle', 'Cycle', 'PutOnRecordCycle', 'EntrustCycle'], 'integer'],
            [['DepartID', 'Money', 'Fee'], 'number'],
            [['SubjectMatter', 'Remark'], 'string'],
            [['ChoicedDate', 'CaseClosedDate', 'PutOnRecordDate', 'SuspendedDate', 'EntrustDate', 'MaterialsCompletionDate', 'RetractDate', 'SiteSurveyDate', 'GetbackDate', 'ChargesDate', 'DeliveryCourtDate'], 'safe'],
            [['Type'], 'string', 'max' => 10],
            [['Year'], 'string', 'max' => 12],
            [['CaseNumber', 'FlowNumber', 'Case', 'LitigantOne', 'LitigantTwo', 'TransferMaterial'], 'string', 'max' => 255],
            [['Supervise', 'SuperviseTel', 'Undertaker', 'UndertakerTel', 'Master', 'MasterTel', 'ChoiceWay', 'FllowResult'], 'string', 'max' => 50],
            [['EntrustDeparment'], 'string', 'max' => 128],
            [['Agency'], 'string', 'max' => 100],
            [['Progress'], 'string', 'max' => 36]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DepartID' => '部门ID',
            'Type' => '类型评估',
            'Year' => '年度',
            'CaseNumber' => '委托案号',
            'Supervise' => '督办人',
            'SuperviseTel' => '督办人电话',
            'FlowNumber' => '案件流水号',
            'Case' => '案由',
            'LitigantOne' => '当事人1',
            'LitigantTwo' => '当事人2',
            'EntrustDeparment' => '委托部门',
            'Undertaker' => '承办人',
            'UndertakerTel' => '承办人电话',
            'TransferMaterial' => '移交材料',
            'SubjectMatter' => '标的物',
            'Agency' => '评估机构',
            'Master' => '评估师',
            'MasterTel' => '评估师电话',
            'ChoiceWay' => '选定方式',
            'ChoicedDate' => '选定日期',
            'CaseClosedDate' => '收案日期',
            'PutOnRecordDate' => '立案日期',
            'SuspendedDate' => '暂缓日期',
            'EntrustDate' => '委托日期',
            'MaterialsCompletionDate' => '材料补全日期',
            'RetractDate' => '撤回日期',
            'SiteSurveyDate' => '现场勘察日期',
            'GetbackDate' => '结案日期',
            'GetbackCycle' => '结案周期',
            'Progress' => '进度',
            'Money' => '评估价',
            'ChargesDate' => '缴费日期',
            'Fee' => '评估费用',
            'DeliveryCourtDate' => '送达业务庭日期',
            'FllowResult' => '跟踪评查情况',
            'Remark' => '备注',
            'Cycle' => '评估周期',
            'PutOnRecordCycle' => '立案周期',
            'EntrustCycle' => '委托周期',
        ];
    }

    public static function tableTh(){

          return [
            'No' => '序号',
            'Cycle' => '评估周期',
            'Progress' => '进度',   
            'CaseNumber' => '原审案号',
            'EntrustDeparment' => '委托部门',
            'FlowNumber' => '委托案号',
            'Case' => '案由',
            'LitigantOne' => '当事人1',
            'LitigantTwo' => '当事人2',  
            'SubjectMatter' => '标的物',           
            'ChoiceWay' => '选定方式',
            'ChoicedDate' => '选定日期',
            'Agency' => '评估机构',           
            'CaseClosedDate' => '收案日期',
            'PutOnRecordDate' => '立案日期',
            'PutOnRecordCycle' => '立案周期',
            'TransferMaterial' => '移交材料',  
            'EntrustDate' => '委托日期',                    
            'EntrustCycle' => '委托周期',
            'SiteSurveyDate' => '勘验日期',
            'RetractDate' => '撤回日期',
            'SuspendedDate' => '暂缓日期',   
            'DeliveryCourtDate' => '送达业务庭日期',         
            'ChargesDate' => '缴费日期',
            'GetbackDate' => '结案日期',
            'GetbackCycle' => '结案周期',  
            'Money' => '评估价(万元)',   
            'FllowResult' => '跟踪评查情况', 
            'Undertaker' => '承办人',
            'UndertakerTel' => '承办人电话',  
            'Fee' => '评估费用',    
            'Master' => '评估师',
            'MasterTel' => '评估师电话', 
            'Supervise' => '督办人',
            'SuperviseTel' => '督办人电话',
            'Remark' => '备注',
            ];
    }

    public static function progress(){
        return [
            ""=>"选择进度",
            "委托"=>"委托",
            "暂缓"=>"暂缓",
            "撤回"=>"撤回",
            "完成"=>"完成",
        ];
    }

}

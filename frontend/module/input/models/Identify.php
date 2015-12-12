<?php

namespace app\module\input\models;

use Yii;

/**
 * This is the model class for table "{{%identify}}".
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
 * @property string $Identifior
 * @property string $IdentifiorTel
 * @property string $ChoiceWay
 * @property string $ChoicedDate
 * @property string $IdentifiedType
 * @property string $CaseClosedDate
 * @property string $PutOnRecordDate
 * @property string $SuspendedDate
 * @property string $EntrustDate
 * @property string $MaterialsCompletionDate
 * @property string $RetractDate
 * @property string $SiteSurveyDate
 * @property string $GetbackDate
 * @property string $Progress
 * @property string $DeliveryCourtDate
 * @property integer $GetbackCycle
 * @property string $FllowResult
 * @property string $Fee
 * @property string $Suggestion
 * @property string $SuggestionAdmissible
 * @property string $IdentifiedResult
 * @property string $Remark
 * @property integer $Cycle
 * @property integer $PutOnRecordCycle
 * @property integer $EntrustCycle
 * @property string $SourceIdentifiedDepartment
 * @property string $SourceIdentifiedResult
 */
class Identify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $type = "鉴定";

    public static function tableName()
    {
        return '{{%identify}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartID', 'Year', 'CaseNumber', 'FlowNumber', 'Case'], 'required'],
            [['GetbackCycle', 'Cycle', 'PutOnRecordCycle', 'EntrustCycle'], 'integer'],
            [['DepartID', 'Fee'], 'number'],
            [['SubjectMatter', 'IdentifiedResult', 'Remark'], 'string'],
            [['ChoicedDate', 'CaseClosedDate', 'PutOnRecordDate', 'SuspendedDate', 'EntrustDate', 'MaterialsCompletionDate', 'RetractDate', 'SiteSurveyDate', 'GetbackDate', 'DeliveryCourtDate'], 'safe'],
            [['Type'], 'string', 'max' => 10],
            [['Year', 'SuggestionAdmissible'], 'string', 'max' => 12],
            [['CaseNumber', 'FlowNumber', 'Case', 'LitigantOne', 'LitigantTwo', 'TransferMaterial', 'SourceIdentifiedDepartment', 'SourceIdentifiedResult'], 'string', 'max' => 255],
            [['Supervise', 'SuperviseTel', 'Undertaker', 'UndertakerTel', 'Master', 'MasterTel', 'ChoiceWay', 'IdentifiedType', 'FllowResult', 'Suggestion'], 'string', 'max' => 50],
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
            'CaseNumber' => '原审案号',
            'Supervise' => '督办人',
            'SuperviseTel' => '督办人电话',
            'FlowNumber' => '委托案号',
            'Case' => '案由',
            'LitigantOne' => '当事人1',
            'LitigantTwo' => '当事人2',
            'EntrustDeparment' => '委托部门',
            'Undertaker' => '承办人',
            'UndertakerTel' => '承办人电话',
            'TransferMaterial' => '移交材料',
            'SubjectMatter' => '标的物',
            'Agency' => '鉴定机构',
            'Master' => '鉴定人',
            'MasterTel' => '鉴定人电话',
            'ChoiceWay' => '选定方式',
            'ChoicedDate' => '选定日期',
            'IdentifiedType' => '鉴定类型',
            'CaseClosedDate' => '收案日期',
            'PutOnRecordDate' => '立案日期',
            'SuspendedDate' => '暂缓日期',
            'EntrustDate' => '委托日期',
            'MaterialsCompletionDate' => '材料补全日期',
            'RetractDate' => '撤回日期',
            'SiteSurveyDate' => '现场勘察日期',
            'GetbackDate' => '结案日期',
            'Progress' => '进度',
            'DeliveryCourtDate' => '送达业务庭日期',
            'GetbackCycle' => '结案周期',
            'FllowResult' => '跟踪评查情况',
            'Fee' => '鉴定费用',
            'Suggestion' => '鉴定意见',
            'SuggestionAdmissible' => '鉴定意见是否采信',
            'IdentifiedResult' => '鉴定结论',
            'Remark' => '备注',
            'Cycle' => '鉴定周期',
            'PutOnRecordCycle' => '立案周期',
            'EntrustCycle' => '委托周期',
            'SourceIdentifiedDepartment' => '原鉴定单位',
            'SourceIdentifiedResult' => '原鉴定结果',
        ];
    }

    public static function tableTh(){

        return [
            'No' => '序号',
            'Cycle' => '鉴定周期',
            'Progress' => '进度',
            'CaseNumber' => '鉴定案号',
            'EntrustDeparment' => '委托部门',           
            'FlowNumber' => '委托案号',
            'Case' => '案由',
            'LitigantOne' => '当事人1',
            'LitigantTwo' => '当事人2',   
            'TransferMaterial' => '移交材料',                   
            'IdentifiedType' => '鉴定类型',
            'Suggestion' => '鉴定要求',
            'CaseClosedDate' => '收案日期',
            'PutOnRecordDate' => '立案日期',  
            'PutOnRecordCycle' => '立案周期',       
            'ChoiceWay' => '选定方式',
            'ChoicedDate' => '选定日期',
            'Agency' => '鉴定机构',  
            'Fee' => '鉴定费用',            
            'EntrustDate' => '委托日期',                     
            'EntrustCycle' => '委托周期',
            'SiteSurveyDate' => '勘验日期',
            'IdentifiedResult' => '鉴定结论',    
            'GetbackDate' => '结案日期',
            'RetractDate' => '撤回日期',
            'GetbackCycle' => '结案周期',           
            'Supervise' => '督办人',
            'SuperviseTel' => '督办人电话',
            'Undertaker' => '承办人',
            'UndertakerTel' => '承办人电话',
            'SubjectMatter' => '标的物',
            'Master' => '鉴定人',
            'MasterTel' => '鉴定人电话',
            'SuspendedDate' => '暂缓日期',
            'DeliveryCourtDate' => '送达业务庭日期',
            'FllowResult' => '跟踪评查情况',
            'SourceIdentifiedDepartment' => '原鉴定单位',
            'SourceIdentifiedResult' => '原鉴定结果',
            'Remark' => '备注',
        ];

    }

    public static function IdentifyType(){
        return [
            ""=>"选择鉴定类型",
            "物证"=>"物证",
            "法医"=>"法医",
            "产品质量"=>"产品质量",
            "工程质量"=>"工程质量",
            "会计审计"=>"会计审计",
            "其他"=>"其他",         
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

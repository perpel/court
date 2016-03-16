<?php

use yii\db\Schema;
use yii\db\Migration;

class m151220_120052_project extends Migration
{
     const TBL_NAME = '{{%project}}';
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
           
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
        
            'ID' => Schema::TYPE_PK . " COMMENT '序号'",
            'DepartID' => Schema::TYPE_DECIMAL . "(18,0) NOT NULL COMMENT '部门ID'",
            'Type' => Schema::TYPE_STRING . "(32) DEFAULT '评估' COMMENT '类型评估'",
            'Year' => Schema::TYPE_STRING . "(12) NOT NULL COMMENT '年度'",
            'CaseNumber' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT '委托案号'",
            'Supervise' => Schema::TYPE_STRING . "(64) COMMENT '督办人'",
            'SuperviseTel' => Schema::TYPE_STRING . "(32) COMMENT '督办人电话'",
            'FlowNumber' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT '案件流水号'",
            'Case' => Schema::TYPE_STRING . "(255) NOT NULL COMMENT '案由'",
            'LitigantOne' => Schema::TYPE_STRING . "(255) COMMENT '当事人1'",
            'LitigantTwo' => Schema::TYPE_STRING . "(255) COMMENT '当事人2'",
            'EntrustDeparment' => Schema::TYPE_STRING . "(128) COMMENT '委托部门'",
            'Undertaker' => Schema::TYPE_STRING . "(64) COMMENT '承办人'",
            'UndertakerTel' => Schema::TYPE_STRING . "(64) COMMENT '承办人电话'",
            'TransferMaterial' => Schema::TYPE_STRING . "(255) COMMENT '移交材料'",
            'Agency' => Schema::TYPE_STRING . "(100) COMMENT '鉴定机构'",
            'Master' => Schema::TYPE_STRING . "(50) COMMENT '鉴定人'",
            'MasterTel' => Schema::TYPE_STRING . "(50) COMMENT '鉴定人电话'",
            'Claim' => Schema::TYPE_STRING . "(255) COMMENT '鉴定要求'",
            'ChoiceWay' => Schema::TYPE_STRING . "(50) COMMENT '选定方式'",
            'CaseClosedDate' => Schema::TYPE_DATE . " COMMENT '收案日期'",
            'ChoicedDate' => Schema::TYPE_DATE . " COMMENT '选定日期'",
            'CaseClosedDate' => Schema::TYPE_DATE . " COMMENT '收案日期'",
            'PutOnRecordDate' => Schema::TYPE_DATE . " COMMENT '初稿日期'",
            'SuspendedDate' => Schema::TYPE_DATE . " COMMENT '暂缓日期'",
            'EntrustDate' => Schema::TYPE_DATE . " COMMENT '委托日期'",
            'MaterialsCompletionDate' => Schema::TYPE_DATE . " COMMENT '材料补全日期'",
            'RetractDate' => Schema::TYPE_DATE . " COMMENT '撤回日期'",
            'SiteSurveyDate' => Schema::TYPE_DATE . " COMMENT '现场勘察日期'",
            'GetbackDate' => Schema::TYPE_DATE . " COMMENT '结案日期'",
            'GetbackCycle' => Schema::TYPE_INTEGER . " COMMENT '结案周期'",
            'Progress' => Schema::TYPE_STRING . "(36) COMMENT '进度'",
            'FllowResult' => Schema::TYPE_STRING . "(64) COMMENT '跟踪评查情况'",
            'Fee' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '鉴定费用'",
            'DeliveryCourtDate' => Schema::TYPE_DATE . " COMMENT '送达业务庭日期'",
            'Suggestion' => Schema::TYPE_STRING . "(64) COMMENT '鉴定意见'",
            'SourceIdentifiedDepartment' => Schema::TYPE_STRING . "(255) COMMENT '原鉴定单位'",
            'SourceIdentifiedResult' => Schema::TYPE_STRING . "(255) COMMENT '原鉴定结果'",
            'Remark' => Schema::TYPE_TEXT . " COMMENT '备注'",
            'Cycle' => Schema::TYPE_INTEGER . "(11) COMMENT '鉴定周期'",
            'PutOnRecordCycle' => Schema::TYPE_INTEGER . "(11) COMMENT '立案周期'",
            'EntrustCycle' => Schema::TYPE_INTEGER . "(11) COMMENT '委托周期'",
           
        ], $tableOptions);

        //$this->addForeignKey('fk_level_up_court', self::TBL_NAME, ['up_level'], self::TBL_NAME, ['id'], 'RESTRICT', 'CASCADE');
        //$this->addForeignKey('fk_level_court', self::TBL_NAME, ['level'], '{{%court_level}}', ['id'], 'RESTRICT', 'CASCADE');

    }

    public function safeDown()
    {
       $this->dropTable(self::TBL_NAME);
    }

}









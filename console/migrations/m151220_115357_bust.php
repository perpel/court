<?php

use yii\db\Schema;
use yii\db\Migration;

class m151220_115357_bust extends Migration
{
    

    const TBL_NAME = '{{%bust}}';
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
            'SubjectMatter' => Schema::TYPE_TEXT . " COMMENT '标的物'",
            'Agency' => Schema::TYPE_STRING . "(100) COMMENT '管理人/清算组'",
            'ChoiceWay' => Schema::TYPE_STRING . "(50) COMMENT '选定方式'",
            'CaseClosedDate' => Schema::TYPE_DATE . " COMMENT '收案日期'",
            'PutOnRecordDate' => Schema::TYPE_DATE . " COMMENT '立案日期'",
            'PutOnRecordCycle' => Schema::TYPE_INTEGER . "(11) COMMENT '立案周期'",
            'EntrustDate' => Schema::TYPE_DATE . " COMMENT '委托日期'",
            'EntrustCycle' => Schema::TYPE_INTEGER . "(11) COMMENT '委托周期'",
            'LiquidationDate' => Schema::TYPE_DATE . " COMMENT '开始清算日期'",
            'GetbackDate' => Schema::TYPE_DATE . " COMMENT '结案日期'",
            'Cycle' => Schema::TYPE_INTEGER . "(11) COMMENT '破产周期'",
            'Progress' => Schema::TYPE_STRING . "(36) COMMENT '进度'",
            'Fee' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '清算费用'",
            'FllowResult' => Schema::TYPE_STRING . "(64) COMMENT '跟踪评查情况'",
            'Remark' => Schema::TYPE_TEXT . " COMMENT '备注/结论'",

        ], $tableOptions);

        //$this->addForeignKey('fk_level_up_court', self::TBL_NAME, ['up_level'], self::TBL_NAME, ['id'], 'RESTRICT', 'CASCADE');
        //$this->addForeignKey('fk_level_court', self::TBL_NAME, ['level'], '{{%court_level}}', ['id'], 'RESTRICT', 'CASCADE');

    }

    public function safeDown()
    {
       $this->dropTable(self::TBL_NAME);
    }


}
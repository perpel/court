<?php

use yii\db\Schema;
use yii\db\Migration;

class m151211_140906_assess extends Migration
{
    const TBL_NAME = '{{%assess}}';
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB AUTO_INCREMENT=2';
        }

        $this->createTable(self::TBL_NAME, [

            'id' => $this->primaryKey(),
            'depart_num' => $this->string(12)->notNull(),
            'type' => $this->string(12)->notNull(),
            'year' => $this->string(12)->notNull(),
            'case_number' => $this->string(255)->notNull(),
            'supervise' => $this->string(50),
            'supervise_tel' => $this->string(50),
            'flow_number' => $this->string(255)->notNull(),
            'case' => $this->string(255)->notNull(),
            'litigant_one' => $this->string(255),
            'litigant_two' => $this->string(255),
            'entrust_deparment' => $this->string(128),
            'undertaker' => $this->string(50),
            'undertaker_tel' => $this->string(50),
            'transfer_material' => $this->string(255),
            'subject_matter' => $this->text(),
            'agency' => $this->string(100),
            'master' => $this->string(50),
            'master_tel' => $this->string(50),
            'choice_way' => $this->string(50),
            'choiced_date' => $this->date(),
            'case_closed_date' => $this->date(),
            'puton_record_date' => $this->date(),
            'suspended_date' => $this->date(),
            'entrust_date' => $this->date(),
            'materials_completion_date' => $this->date(),
            'retract_date' => $this->date(),
            'site_survey_date' => $this->date(),
            'getback_date' => $this->date(),
            'getback_cycle' => $this->integer()->defaultValue(0),
            'progress' => $this->string(36),
            'money' => $this->decimal(20,4),
            'charges_date' => $this->date(),
            'fee' => $this->decimal(20,4),
            'delivery_court_date' => $this->date(),
            'fllow_result' => $this->string(50),
            'remark' => $this->text(),
            'cycle' => $this->integer(11),
            'puton_record_cycle' => $this->integer(11),
            'entrust_cycle' => $this->integer(11),

        ], $tableOptions);



/*
        CREATE TABLE IF NOT EXISTS `case_assess` (
  `ID` int(18) unsigned NOT NULL,
  `DepartID` decimal(18,0) NOT NULL COMMENT '部门ID',
  `Type` varchar(10) DEFAULT '评估' COMMENT '类型评估',
  `Year` varchar(12) NOT NULL COMMENT '年度',
  `CaseNumber` varchar(255) NOT NULL COMMENT '委托案号',

  `Supervise` varchar(50) DEFAULT NULL COMMENT '督办人',
  `SuperviseTel` varchar(50) DEFAULT NULL COMMENT '督办人电话',
  `FlowNumber` varchar(255) NOT NULL COMMENT '案件流水号',


  `Case` varchar(255) NOT NULL COMMENT '案由',

  `LitigantOne` varchar(255) DEFAULT NULL COMMENT '当事人1',
  `LitigantTwo` varchar(255) DEFAULT NULL COMMENT '当事人2',

  `EntrustDeparment` varchar(128) DEFAULT NULL COMMENT '委托部门',
  `Undertaker` varchar(50) DEFAULT NULL COMMENT '承办人',
  `UndertakerTel` varchar(50) DEFAULT NULL COMMENT '承办人电话',
  `TransferMaterial` varchar(255) DEFAULT NULL COMMENT '移交材料',
  `SubjectMatter` text COMMENT '标的物',
  `Agency` varchar(100) DEFAULT NULL COMMENT '评估机构',
  `Master` varchar(50) DEFAULT NULL COMMENT '评估师',
  `MasterTel` varchar(50) DEFAULT NULL COMMENT '评估师电话',


  `ChoiceWay` varchar(50) DEFAULT NULL COMMENT '选定方式',
  `ChoicedDate` date DEFAULT NULL COMMENT '选定日期',
  `CaseClosedDate` date DEFAULT NULL COMMENT '收案日期',
  `PutOnRecordDate` date DEFAULT NULL COMMENT '立案日期',
  `SuspendedDate` date DEFAULT NULL COMMENT '暂缓日期',
  `EntrustDate` date DEFAULT NULL COMMENT '委托日期',
  `MaterialsCompletionDate` date DEFAULT NULL COMMENT '材料补全日期',
  `RetractDate` date DEFAULT NULL COMMENT '撤回日期',
  `SiteSurveyDate` date DEFAULT NULL COMMENT '现场勘察日期',
  `GetbackDate` date DEFAULT NULL COMMENT '结案日期',
  `GetbackCycle` int(11) DEFAULT NULL COMMENT '结案周期',


  `Progress` varchar(36) DEFAULT NULL COMMENT '进度',
  `Money` decimal(20,4) DEFAULT NULL COMMENT '评估价',
  `ChargesDate` date DEFAULT NULL COMMENT '缴费日期',
  `Fee` decimal(20,4) DEFAULT NULL COMMENT '评估费用',
  `DeliveryCourtDate` date DEFAULT NULL COMMENT '送达业务庭日期',
  `FllowResult` varchar(50) DEFAULT NULL COMMENT '跟踪评查情况',
  `Remark` text COMMENT '备注',
  `Cycle` int(11) DEFAULT NULL COMMENT '评估周期',
  `PutOnRecordCycle` int(11) DEFAULT NULL COMMENT '立案周期',
  `EntrustCycle` int(11) DEFAULT NULL COMMENT '委托周期'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
*/
        //$this->addForeignKey('fk_level_up_court', self::TBL_NAME, ['up_level'], self::TBL_NAME, ['id'], 'RESTRICT', 'CASCADE');
     //   $this->addForeignKey('fk_level_court', self::TBL_NAME, ['level'], '{{%court_level}}', ['id'], 'RESTRICT', 'CASCADE');

    }

    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }

}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m151220_102026_auction extends Migration
{
    

const TBL_NAME = '{{%auction}}';
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
            'Agency' => Schema::TYPE_STRING . "(100) COMMENT '拍卖机构'",
            'ChoiceWay' => Schema::TYPE_STRING . "(50) COMMENT '选定方式'",
            'CaseClosedDate' => Schema::TYPE_DATE . " COMMENT '收案日期'",
            'PutOnRecordDate' => Schema::TYPE_DATE . " COMMENT '立案日期'",
            'GetbackCycle' => Schema::TYPE_INTEGER . " COMMENT '结案周期'",
            'EntrustDate' => Schema::TYPE_DATE . " COMMENT '委托日期'",
            'Progress' => Schema::TYPE_STRING . "(36) COMMENT '进度'",
            'PutOnRecordCycle' => Schema::TYPE_INTEGER . "(11) COMMENT '立案周期'",
            'EntrustCycle' => Schema::TYPE_INTEGER . "(11) COMMENT '委托周期'",
            'GetbackDate' => Schema::TYPE_DATE . " COMMENT '结案日期'",
            'FllowResult' => Schema::TYPE_STRING . "(64) COMMENT '跟踪评查情况'",
            'Remark' => Schema::TYPE_TEXT . " COMMENT '备注'",
            'Cycle' => Schema::TYPE_INTEGER . "(11) COMMENT '拍卖周期'",
            'Master' => Schema::TYPE_STRING . "(50) COMMENT '拍卖师'",
            'Fee' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '拍卖费用'",
            'AnnouncementDate1' => Schema::TYPE_DATE . " COMMENT '第一次公告日期'",
            'TimeDate1' => Schema::TYPE_DATE . " COMMENT '第一次拍卖日期'",
            'Status1' => Schema::TYPE_STRING . "(15) COMMENT '第一次拍卖状态'",
            'StartAuctionPrice1' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '第一次起拍价'",
            'Price1' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '第一次拍卖价'",
            'AnnouncementDate2' => Schema::TYPE_DATE . " COMMENT '第二次公告日期'",
            'TimeDate2' => Schema::TYPE_DATE . " COMMENT '第二次拍卖日期'",
            'Status2' => Schema::TYPE_STRING . "(15) COMMENT '第二次拍卖状态'",
            'StartAuctionPrice2' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '第二次起拍价'",
            'Price2' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '第二次拍卖价'",
            'AnnouncementDate3' => Schema::TYPE_DATE . " COMMENT '第三次公告日期'",
            'TimeDate3' => Schema::TYPE_DATE . " COMMENT '第三次拍卖日期'",
            'Status3' => Schema::TYPE_STRING . "(15) COMMENT '第三次拍卖状态'",
            'StartAuctionPrice3' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '第三次起拍价'",
            'Price3' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '第三次拍卖价'",
            'AuctionStatus' => Schema::TYPE_STRING . "(15) COMMENT '拍卖状态'",
            'AuctionPrice' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '拍卖价格'",
            'AuctionDate' => Schema::TYPE_DATE . " COMMENT '拍卖日期'",
            'ArrivalDate' => Schema::TYPE_DATE . " COMMENT '拍卖款到帐日期'",
            'ArrivalCycle' => Schema::TYPE_DATE . " COMMENT '到帐周期'",
            'SuspendedDate' => Schema::TYPE_DATE . " COMMENT '暂缓日期'",
            'RetractDate' => Schema::TYPE_DATE . " COMMENT '撤回日期'",
            'ChargesDate' => Schema::TYPE_DATE . " COMMENT '缴费日期'",
            'SaleDate' => Schema::TYPE_DATE . " COMMENT '变卖日期'",
            'SalePrice' => Schema::TYPE_DECIMAL . "(20,4) COMMENT '变卖价格'",
            'SaleStatus' => Schema::TYPE_STRING . "(15) COMMENT '变卖状态'",

        ], $tableOptions);

        //$this->addForeignKey('fk_level_up_court', self::TBL_NAME, ['up_level'], self::TBL_NAME, ['id'], 'RESTRICT', 'CASCADE');
        //$this->addForeignKey('fk_level_court', self::TBL_NAME, ['level'], '{{%court_level}}', ['id'], 'RESTRICT', 'CASCADE');

    }

    public function safeDown()
    {
       $this->dropTable(self::TBL_NAME);
    }


}
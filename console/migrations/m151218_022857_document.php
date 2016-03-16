<?php

use yii\db\Schema;
use yii\db\Migration;

class m151218_022857_document extends Migration
{
    const TBL_NAME = '{{%document}}';
    public function safeUp()
    {
		
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
           
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
		
			'ID' => Schema::TYPE_PK . " COMMENT '序号'",
			'DepartmentNumber' => Schema::TYPE_INTEGER . "(11) NOT NULL",
			'Name' => Schema::TYPE_STRING . "(255)",
			'Assess' => Schema::TYPE_SMALLINT . "(4)",
			'Identify' => Schema::TYPE_SMALLINT . "(4)",
			'Auction' => Schema::TYPE_SMALLINT . "(4)",
			'Project' => Schema::TYPE_SMALLINT . "(4)",
			'Bust' => Schema::TYPE_SMALLINT . "(4)"
			
        ], $tableOptions);

       $this->batchInsert(self::TBL_NAME,
	   
	   ['ID', 'DepartmentNumber', 'Name', 'Assess', 'Identify', 'Auction', 'Project', 'Bust'], 
	   
	   [
		
		[17, 0, '撤回委托鉴定通知书', 0, 1, NULL, NULL, NULL],
		[18, 0, '鉴定材料补充函', 0, 1, NULL, NULL, NULL],
		[19, 0, '司法鉴定材料交接表', 0, 1, NULL, NULL, NULL],
		[20, 0, '司法鉴定委托书（三类）', 0, 1, NULL, NULL, NULL],
		[21, 0, '司法鉴定委托书', 0, 1, NULL, NULL, NULL],
		[22, 0, '预交鉴定费通知书', 0, 1, NULL, NULL, NULL],
		[23, 0, '撤回委托评估通知书', 1, NULL, NULL, NULL, NULL],
		[24, 0, '评估材料补充函', 1, NULL, NULL, NULL, NULL],
		[25, 0, '司法评估材料交接表', 1, NULL, NULL, NULL, NULL],
		[26, 0, '司法评估费用预交通知书', 1, NULL, NULL, NULL, NULL],
		[27, 0, '司法评估委托书', 1, NULL, NULL, NULL, NULL],
		[28, 0, '变卖通知函', NULL, NULL, 1, NULL, NULL],
		[29, 0, '撤回（暂缓）拍卖通知书', NULL, NULL, 1, NULL, NULL],
		[30, 0, '继续拍卖通知书', NULL, NULL, 1, NULL, NULL],
		[31, 0, '拍卖委托书', NULL, NULL, 1, NULL, NULL],
		[32, 0, '拍卖未成交告知函', NULL, NULL, 1, NULL, NULL],
		[33, 0, '拍卖移交表', NULL, NULL, 1, NULL, NULL],
		[34, 0, '优先购买权人通知书', NULL, NULL, 1, NULL, NULL]
	   
	   ]); 
		
		
    }

    public function safeDown()
    {
       $this->dropTable(self::TBL_NAME);
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m160102_040814_court_other extends Migration
{
    
    const TBL_NAME = '{{%court_option}}';
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
           
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
        
            'id'                => Schema::TYPE_PK . " COMMENT '序号'",
            'courtid'           => Schema::TYPE_INTEGER . " NOT NULL COMMENT '法院ID'",
            'print_inscription' => Schema::TYPE_STRING . "(255) DEFAULT '落款' COMMENT '打印落款'",
            'trial_number'      => Schema::TYPE_STRING . "(128) DEFAULT '000000' COMMENT '审判-法院代码'",
            'execute_number'    => Schema::TYPE_STRING . "(128) DEFAULT '000000' COMMENT '执行-法院代码'"
           
        ], $tableOptions);
        
    }

    public function safeDown()
    {
       $this->dropTable(self::TBL_NAME);
    }


}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m151218_081216_logs extends Migration
{
    

    const TBL_NAME = '{{%logs}}';
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
           
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
        
            'ID' => Schema::TYPE_PK . " COMMENT '序号'",
            'FlowNumber' => Schema::TYPE_STRING . "(255) NOT NULL",
            'InputMan' => Schema::TYPE_STRING . "(36) NOT NULL",
            'InputDate' => Schema::TYPE_DATETIME . " NOT NULL",
            'CtrlType' => Schema::TYPE_STRING . "(36)",
            'Department' => Schema::TYPE_STRING . "(255) NOT NULL",
     

        ], $tableOptions);

        //$this->addForeignKey('fk_level_up_court', self::TBL_NAME, ['up_level'], self::TBL_NAME, ['id'], 'RESTRICT', 'CASCADE');
        //$this->addForeignKey('fk_level_court', self::TBL_NAME, ['level'], '{{%court_level}}', ['id'], 'RESTRICT', 'CASCADE');

    }

    public function safeDown()
    {
       $this->dropTable(self::TBL_NAME);
    }


}
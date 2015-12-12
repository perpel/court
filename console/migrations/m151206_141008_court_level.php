<?php

use yii\db\Schema;
use yii\db\Migration;

class m151206_141008_court_level extends Migration
{
    const TBL_NAME = '{{%court_level}}';
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull()->unique(),
        ], $tableOptions);

       $this->insert(self::TBL_NAME, ['name' => '最高人民法院']);
       $this->insert(self::TBL_NAME, ['name' => '高级人民法院']);
       $this->insert(self::TBL_NAME, ['name' => '中级人民法院']);
       $this->insert(self::TBL_NAME, ['name' => '和基层人民法院']);
    }

    public function safeDown()
    {
        $this->dropTable(self::TBL_NAME);
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

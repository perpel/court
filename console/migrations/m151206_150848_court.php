<?php

use yii\db\Schema;
use yii\db\Migration;

class m151206_150848_court extends Migration
{
    const TBL_NAME = '{{%court}}';
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
            'id' => $this->primaryKey(),
            'courtname' => $this->string(255)->notNull()->unique(),
            'courtnumber' => $this->string(128)->notNull()->unique(),
            'prefix_flownumber' => $this->string()->notNull(),
            'level' => $this->integer()->notNull()->defaultValue(0),
            'up_level' => $this->integer()->notNull()->defaultValue(0),
            'register_date' => $this->date()->notNull(),
            'end_date' => $this->date()->notNull(),
            'register_number' => $this->string(255)->notNull(),
        ], $tableOptions);

        //$this->addForeignKey('fk_level_up_court', self::TBL_NAME, ['up_level'], self::TBL_NAME, ['id'], 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_level_court', self::TBL_NAME, ['level'], '{{%court_level}}', ['id'], 'RESTRICT', 'CASCADE');

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

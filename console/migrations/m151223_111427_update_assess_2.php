<?php

use yii\db\Schema;
use yii\db\Migration;

class m151223_111427_update_assess_2 extends Migration
{
    const TBL_NAME = '{{%assess}}';
    public function safeUp()
    {

        $this->addColumn(self::TBL_NAME, "SeizureDate", Schema::TYPE_DATE);

    }

    public function safeDown()
    {
        $this->dropColumn(self::TBL_NAME, "SeizureDate", Schema::TYPE_DATE);
    }
}

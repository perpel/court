<?php

use yii\db\Schema;
use yii\db\Migration;

class m151221_132815_patch_assess extends Migration
{
    const TBL_NAME = '{{%assess}}';
    public function safeUp()
    {

        $this->alterColumn(self::TBL_NAME, "RemainAssessDate", Schema::TYPE_DATE);
        $this->addColumn(self::TBL_NAME, "RemainAssessDay", Schema::TYPE_INTEGER);

    }

    public function safeDown()
    {
        $this->alterColumn(self::TBL_NAME, "RemainAssessDate", Schema::TYPE_INTEGER);
        $this->dropColumn(self::TBL_NAME, "RemainAssessDay");
    }
}

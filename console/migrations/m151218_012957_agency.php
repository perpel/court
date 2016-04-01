<?php

use yii\db\Schema;
use yii\db\Migration;

class m151218_012957_agency extends Migration
{
    const TBL_NAME = '{{%agency}}';
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
           
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
		
			'ID' => Schema::TYPE_PK . " COMMENT '序号'",
			'DepartID' => Schema::TYPE_STRING . "(255) NOT NULL",
			'Type' => Schema::TYPE_STRING . "(32) COMMENT '机构类型'",
			'Name' => Schema::TYPE_STRING . "(128) NOT NULL COMMENT '机构名称'",
			'LicenseNumber' => Schema::TYPE_STRING . "(32) COMMENT '执业证号'",
			'Contacts' => Schema::TYPE_STRING . "(32) COMMENT '联系人'",
			'ContactsPhone' => Schema::TYPE_STRING . "(32) COMMENT '联系人电话'",
			'LegalRepresentative' => Schema::TYPE_STRING . "(32) COMMENT '法定代表人'",
			'LegalRepresentativePhone' => Schema::TYPE_STRING . "(32) COMMENT '法定代表人电话'",
			'Tel' => Schema::TYPE_STRING . "(32) COMMENT '电话'",
			'Fax' => Schema::TYPE_STRING . "(32) COMMENT '传真'",
			'Qualification' => Schema::TYPE_STRING . "(32) COMMENT '资质'",
			'ServiceArea' => Schema::TYPE_STRING . "(32) COMMENT '服务范围'",
			'Remark' => Schema::TYPE_STRING . "(32) COMMENT '备注'",
			
        ], $tableOptions);

        //$this->addForeignKey('fk_level_up_court', self::TBL_NAME, ['up_level'], self::TBL_NAME, ['id'], 'RESTRICT', 'CASCADE');
        //$this->addForeignKey('fk_level_court', self::TBL_NAME, ['level'], '{{%court_level}}', ['id'], 'RESTRICT', 'CASCADE');

    }

    public function safeDown()
    {
       $this->dropTable(self::TBL_NAME);
    }


  
}

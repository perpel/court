<?php

use yii\db\Schema;
use yii\db\Migration;

class m151218_023901_document_template extends Migration
{
    const TBL_NAME = '{{%document_template}}';
    public function safeUp()
    {
		
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
           
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_NAME, [
		
			'ID' => Schema::TYPE_PK . " COMMENT '序号'",
			'DocumentID' => Schema::TYPE_INTEGER . "(11) NOT NULL",
			'URL' => Schema::TYPE_STRING . "(255) NOT NULL"
			
        ], $tableOptions);

       $this->batchInsert(self::TBL_NAME, 
	   
	   ['ID', 'DocumentID', 'URL'],
	   
	   [
		
		[13, 12, '/uploads/print/template/13.doc'],
		[14, 13, '/uploads/print/template/14.doc'],
		[15, 15, '/uploads/print/template/15.doc'],
		[16, 16, '/uploads/print/template/16.doc'],
		[17, 23, '/uploads/print/template/17.doc'],
		[18, 24, '/uploads/print/template/18.doc'],
		[19, 25, '/uploads/print/template/19.doc'],
		[20, 26, '/uploads/print/template/20.doc'],
		[21, 27, '/uploads/print/template/21.doc'],
		[22, 17, '/uploads/print/template/22.doc'],
		[23, 18, '/uploads/print/template/23.doc'],
		[24, 19, '/uploads/print/template/24.doc'],
		[25, 20, '/uploads/print/template/25.doc'],
		[26, 21, '/uploads/print/template/26.doc'],
		[27, 22, '/uploads/print/template/27.doc'],
		[28, 28, '/uploads/print/template/28.doc'],
		[29, 29, '/uploads/print/template/29.doc'],
		[30, 30, '/uploads/print/template/30.doc'],
		[31, 31, '/uploads/print/template/31.doc'],
		[32, 32, '/uploads/print/template/32.doc'],
		[33, 33, '/uploads/print/template/33.doc'],
		[34, 34, '/uploads/print/template/34.doc']
	   
	   ]); 
		
		
    }

    public function safeDown()
    {
       $this->dropTable(self::TBL_NAME);
    }
}

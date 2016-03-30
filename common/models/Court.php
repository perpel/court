<?php

namespace common\models;

use Yii;
use common\components\ListTree;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%court}}".
 *
 * @property integer $id
 * @property string $courtname
 * @property string $courtnumber
 * @property string $prefix_flownumber
 * @property integer $level
 * @property integer $up_level
 * @property string $register_date
 * @property string $end_date
 * @property string $register_number
 *
 * @property CourtLevel $level0
 * @property Court $upLevel
 * @property Court[] $courts
 */
class Court extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public static function tableName()
    {
        return '{{%court}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['courtname', 'courtnumber', 'prefix_flownumber', 'register_date', 'end_date', 'register_number'], 'required'],
            [['level', 'up_level'], 'integer'],
            [['register_date', 'end_date'], 'safe'],
            [['courtname', 'prefix_flownumber', 'register_number'], 'string', 'max' => 255],
            [['courtnumber'], 'string', 'max' => 128],
            [['courtname'], 'unique'],
            [['courtnumber'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'courtname' => '法院名称',
            'courtnumber' => '法院编号',
            'prefix_flownumber' => '流水号前缀',
            'level' => '法院等级',
            'up_level' => '上级法院',
            'register_date' => '注册日期',
            'end_date' => '有效期',
            'register_number' => '注册编号',
        ];
    }

    public static function CourtsWithSelect($node = 0) {
        
        $elements =  self::find()->select(['id', 'courtnumber', 'courtname', 'up_level'])
                                ->asArray()
                                ->all();

        $tree = new ListTree($elements, 'id', 'up_level', $node, 'courtnumber');
        $tree->defaultOption = "ADSAFSDFSD";
        $tree->lKey = "id";
        $tree->lNodeValue = "courtname";
        $tree->lNodeLevel = "level";
        
        return ArrayHelper::map($tree->listTree(), "key", "option");
    }

    

}

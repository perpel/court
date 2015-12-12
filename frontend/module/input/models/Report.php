<?php

namespace app\module\input\models;

use Yii;

/**
 * This is the model class for table "{{%report}}".
 *
 * @property integer $ID
 * @property integer $UID
 * @property string $Name
 * @property string $URL
 * @property string $Type
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%report}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UID', 'Name', 'Type'], 'required'],
            [['UID'], 'integer'],
            [['Name', 'URL'], 'string', 'max' => 255],
            [['Type'], 'string', 'max' => 36]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'UID' => 'Uid',
            'Name' => 'Name',
            'URL' => 'Url',
            'Type' => 'Type',
        ];
    }
}

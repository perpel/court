<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%court_level}}".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Court[] $courts
 */
class CourtLevel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%court_level}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourts()
    {
        return $this->hasMany(Court::className(), ['level' => 'id']);
    }
}

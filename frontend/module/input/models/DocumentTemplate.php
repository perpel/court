<?php

namespace app\module\input\models;

use Yii;

/**
 * This is the model class for table "{{%document_template}}".
 *
 * @property integer $ID
 * @property integer $DocumentID
 * @property string $URL
 */
class DocumentTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%document_template}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DocumentID', 'URL'], 'required'],
            [['DocumentID'], 'integer'],
            [['URL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DocumentID' => 'Document ID',
            'URL' => 'Url',
        ];
    }
}

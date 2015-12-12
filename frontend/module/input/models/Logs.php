<?php

namespace app\module\input\models;

use Yii;

/**
 * This is the model class for table "{{%logs}}".
 *
 * @property integer $ID
 * @property string $FlowNumber
 * @property string $InputMan
 * @property string $InputDate
 * @property string $CtrlType
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%logs}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FlowNumber', 'InputMan', 'InputDate', 'CtrlType'], 'required'],
            [['InputDate'], 'safe'],
            [['FlowNumber'], 'string', 'max' => 255],
            [['InputMan', 'CtrlType'], 'string', 'max' => 36]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'FlowNumber' => 'Flow Number',
            'InputMan' => 'Input Man',
            'InputDate' => 'Input Date',
            'CtrlType' => 'Ctrl Type',
        ];
    }
}

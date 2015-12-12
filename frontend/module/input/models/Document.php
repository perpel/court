<?php

namespace app\module\input\models;

use Yii;

/**
 * This is the model class for table "{{%document}}".
 *
 * @property integer $ID
 * @property integer $DepartmentNumber
 * @property string $Name
 * @property integer $Assess
 * @property integer $Identify
 * @property integer $Auction
 * @property integer $Projectcost
 * @property integer $Bust
 */
class Document extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%document}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DepartmentNumber'], 'required'],
            [['DepartmentNumber', 'Assess', 'Identify', 'Auction', 'Project', 'Bust'], 'integer'],
            [['Name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'DepartmentNumber' => 'Department Number',
            'Name' => 'Name',
            'Assess' => 'Assess',
            'Identify' => 'Identify',
            'Auction' => 'Auction',
            'Project' => 'Project',
            'Bust' => 'Bust',
        ];
    }

public static function tableTh(){

        return [
            'ID' => '序号',
            'DepartmentNumber' => '部门编号',
            'Name' => '名称',
            'Assess' => '评估',
            'Identify' => '鉴定',
            'Auction' => '拍卖',
            'Project' => '工程造价',
            'Bust' => '破产',
        ];
    }


}

<?php

namespace common\models;

use Yii;

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
    public $activeTreeIds = [];


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
    public function attributeLabels()
    {
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLevel0()
    {
        return $this->hasOne(CourtLevel::className(), ['id' => 'level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUpLevel()
    {
        return $this->hasOne(Court::className(), ['id' => 'up_level']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourts()
    {
        return $this->hasMany(Court::className(), ['up_level' => 'id']);
    }

    public function treeCourtsId($id){
        $courts = $this->find()->where(["up_level"=>$id])->asArray()->all();
        if(empty($courts)){
            return;
        }
        foreach ($courts as $v) {
            $this->treeCourtsId($v["id"]);
            $this->activeTreeIds[] = $v["id"];
        }
    }

    public function treeCourts($id){
        $courts = $this->find()->where(["up_level"=>$id])->all();
        if(empty($courts)){
            return;
        }
        foreach ($courts as $v) {
            if(!$this->hasSubCourts($v->id)){
                echo "<li><span class='folder end'></span><a target='court-list' href='index.php?r=court/show&court=$v->id'>$v->courtname</a>";
            }else{
                echo "<li><span class='folder'></span><a target='court-list' href='index.php?r=court/show&court=$v->id'>$v->courtname</a>";
                $this->subTreeCourts($v->id);
            }
            echo "</li>";
        }
    }

    private function hasSubCourts($id){
        if($this->find()->where(["up_level"=>$id])->all()){
                return true;
        }
        return false;
    }

    private function subTreeCourts($id){
        $courts = $this->find()->where(["up_level"=>$id])->all();
        if(empty($courts)){
            return;
        }
        echo "<ul>";
        foreach ($courts as $v) {
            if(!$this->hasSubCourts($v->id)){
                echo "<li><span class='folder end'></span><a target='court-list' href='index.php?r=court/show&court=$v->id'>$v->courtname</a>";
            }else{
                echo "<li><span class='folder'></span><a target='court-list' href='index.php?r=court/show&court=$v->id'>$v->courtname</a>";
                $this->subTreeCourts($v->id);
            }
            echo "</li>";
        }
        echo "</ul>";
    }

    public function findCourtById($id){
            $this->treeCourtsId($id);
            $this->activeTreeIds[] = $id;
            sort($this->activeTreeIds);
    }

}

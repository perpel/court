<?php

namespace common\components\register;

use Yii;
use common\components\register\Code;

class Register extends \yii\db\ActiveRecord {

	public static function tableName()
    {
        return '{{%court}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'name'], 'required'],  
            [['username', 'email'], 'string', 'max' => 255],  
            [['username'], 'unique'],  
            [['username'], 'match', 'pattern'=>'/^[a-z]\w*$/i'],  
            [['email'], 'unique'],  
            [['email'], 'email'],  
            ['status', 'default', 'value' => self::STATUS_ACTIVE],   
            ['auth_key', 'default', 'value' => self::AUTH_KEY],  
            ['role','default', 'value'=> self::ROLE_USER], 
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'name' => 'Name',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }


}
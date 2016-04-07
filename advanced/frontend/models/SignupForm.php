<?php
namespace frontend\models;

use frontend\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $name;
    public $email;
    public $password;
    public $court;
    public $status = 1;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '用户名已存在'],
            ['username', 'string', 'min' => 6, 'max' => 255],
            [['username'], 'match', 'pattern'=>'/^[a-z]\w*$/i', 'message' => '用户名格式（字母+数字）'],
            ['court', 'integer'],
            ['name', 'filter', 'filter' => 'trim'],
            ['name', 'required'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\frontend\models\User', 'message' => '邮箱已存在'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['court', 'validateCourt'],
        ];
    }


    public function validateCourt($attribute, $params) {
        if ($this->court == 0) {
            $this->addError($attribute, '请选择所属法院');
        }
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '账号',
            'name' => '姓名',
            'email' => '邮箱',
            'password' => '密码',
            'court' => '所属法院'
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->name = $this->name;
        $user->email = $this->email;
        
        $user->role = $this->court;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}

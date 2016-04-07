<?php
namespace frontend\models;

use frontend\models\User;
use Yii;
use yii\base\Model;
use yii\helpers\Html;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\frontend\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    public function attributeLabels() {
        return [
            "email" => '邮箱'
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
        }
        
        if (!$user->save()) {
            return false;
        }

        $resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);

        Yii::$app->session->setFlash('success', '申请重置成功，请按邮件地址进行密码重置，' . Html::a(Html::encode("点击重置密码"), $resetLink));

        return true;

        //var_dump($user);die;

        // return Yii::$app
        //     ->mailer
        //     ->compose(
        //         ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
        //         ['user' => $user]
        //     )
        //     ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->params['systemTitle'] . ' 机器人'])
        //     ->setTo($this->email)
        //     ->setSubject('Password reset for ' . \Yii::$app->name)
        //     ->send();

    }
}

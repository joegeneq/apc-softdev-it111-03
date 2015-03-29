<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $user_lastname;
    public $user_firstname;
    public $user_contactno;
    public $user_homeadd;
    public $user_actministry;
    public $user_attendance;
    public $user_type;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['user_lastname', 'user_firstname', 'user_contactno', 'user_homeadd', 'user_actministry', 'user_attendance'], 'string', 'max' => 45],
            [['user_type'], 'string', 'max' => 20],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->user_lastname = $this->user_lastname;
            $user->username = $this->username;
            $user->user_firstname = $this->user_firstname;
            $user->user_contactno = $this->user_contactno;
            $user->user_homeadd = $this->user_homeadd;
            $user->user_actministry = $this->user_actministry;
            $user->user_attendance = $this->user_attendance;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->user_type = $this->user_type;
            $user->generateAuthKey();
            if ($user->save()) {
                return $user;
            }
        }

        return null;
    }
}

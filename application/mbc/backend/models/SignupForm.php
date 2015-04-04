<?php
namespace backend\models;

use backend\models\AuthAssignment;
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
    public $user_name;
    public $user_contactno;
    public $user_homeadd;
    public $user_actministry;
    public $user_attendance;
    public $user_type;
    public $permissions;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['user_type', 'required', 'message' => 'Please choose the type of user.'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            [['user_name', 'user_contactno', 'user_homeadd', 'user_actministry', 'user_attendance'], 'string', 'max' => 45],
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
            $user->user_name = $this->user_name;
            $user->username = $this->username;
            $user->user_contactno = $this->user_contactno;
            $user->user_homeadd = $this->user_homeadd;
            $user->user_actministry = $this->user_actministry;
            $user->user_attendance = $this->user_attendance;
            $user->user_type = $this->user_type;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
/*            if ($user->save()) {
                
                //permissions
                $permissionList = $_POST['SignupForm']['permissions'];
                //foreach($permissionList as $value)
                //{
                    $newPermission = new AuthAssignment;
                    $newPermission->user_id = $user->id;
               //     $newPermission->item_name = $value;
                    $newPermission->item_name = $this->permissions;
                    $newPermission->save();
                //}
                
            }*/
            return $user;
        }

        return null;
    }
}

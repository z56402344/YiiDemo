<?php
namespace backend\models;

use common\models\Adminuser;
use yii\base\Model;
use common\models\User;
use yii\helpers\VarDumper;

/**
 * Resetpwd form
 */
class ResetpwdForm extends Model
{
    public $password;
    public $password_repeat;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'compare','compareAttribute'=>'password','message'=>'两次输入密码不一致'],

        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => '密码',
            'password_repeat' => '重输密码',

        ];
    }

    public function resetPassword($id)
    {
        if (!$this->validate()) {
            return null;
        }

        $admuser = Adminuser::findOne($id);
        $admuser->setPassword($this->password);
        $admuser->removePasswordResetToken();
        $admuser->generatePasswordResetToken();
//        $admuser->save(); VarDumper::dump($admuser->errors);exit(0);
        return $admuser->save() ? true : false;
    }
}

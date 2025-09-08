<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class UpdateForm extends Model
{
    public $full_name;
    public $nick_name;

    public $phone;
    public $phone1;
    public $email;
    public $password;
    public $user_status;

    public $ic;
    public $address;

    public $econtact1_fullname;
    public $econtact1_phone;
    public $econtact1_relation;
    public $econtact2_fullname;
    public $econtact2_phone;
    public $econtact2_relation;

    public $experience;
    public $position;
    public $illness;

    public $user_id;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name','nick_name','user_id'], 'trim'],
            [['full_name','nick_name','user_id'], 'required'],
            ['user_id', 'unique', 'targetClass' => User::class, 'message' => 'This user_id has already been taken.'],
            [['full_name','nick_name'], 'string', 'min' => 2, 'max' => 255],

            ['phone', 'trim'],
            ['phone', 'required'],
            // ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            [['phone', 'phone1'], 'string', 'min' => 8, 'max' => 16],
            ['user_id', 'string', 'min' => 6, 'max' => 16],

            ['ic', 'string', 'min' => 12, 'max' => 12],
            ['ic', 'required'],
            ['ic', 'trim'],

            [['phone1','address','econtact1_fullname','econtact1_phone','econtact1_relation','econtact2_fullname','econtact2_phone','econtact2_relation','illness'], 'safe'],

            [['position','experience'], 'required'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'This email address has already been taken.'],

            ['user_status', 'safe'],
            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->full_name = $this->full_name;
        $user->nick_name = $this->nick_name;
        $user->phone = $this->phone;
        $user->phone1 = $this->phone1;
        $user->ic = $this->ic;
        $user->user_status = 10;
        $user->address = $this->address;
        $user->econtact1_fullname = $this->econtact1_fullname;
        $user->econtact1_phone = $this->econtact1_phone;
        $user->econtact1_relation = $this->econtact1_relation;
        $user->econtact2_fullname = $this->econtact2_fullname;
        $user->econtact2_phone = $this->econtact2_phone;
        $user->econtact2_relation = $this->econtact2_relation;
        $user->position = implode(',',$this->position);
        $user->illness = $this->illness;
        $user->experience = $this->experience;
        $user->user_id = $this->user_id;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();

        return $user->save() && $this->sendEmail($user);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'email'),
            'full_name' => Yii::t('app', 'full_name'),
            'nick_name' => Yii::t('app', 'nick_name'),
            'experience' => Yii::t('app', 'experience'),
            'position' => Yii::t('app', 'position'),
            'ic' => Yii::t('app', 'ic'),
            'password' => Yii::t('app', 'password'),
            'address' => Yii::t('app', 'address'),
            'phone' => Yii::t('app', 'phone'),
            'phone1' => Yii::t('app', 'phone1'),
            'illness' => Yii::t('app', 'illness'),
            'econtact1_fullname' => Yii::t('app', 'econtact1_fullname'),
            'econtact1_phone' => Yii::t('app', 'econtact1_phone'),
            'econtact1_relation' => Yii::t('app', 'econtact1_relation'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' System'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}

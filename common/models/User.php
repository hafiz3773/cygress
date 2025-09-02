<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $user_status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;

    const USER_STUDENT = 10;
    const USER_SUPERADMIN = 1;
    const USER_ADMIN = 5;

    const USER_ARRAY = [
        1 => 'Super Admin',
        5 => 'Admin',
        10 => 'Student'
    ];

    const position_arr = [
//    Yii::t('app','register_p17') => Yii::t('app','register_p17'),
//    Yii::t('app','register_p18') => Yii::t('app','register_p18'),
        'Not applicable' => 'Not applicable',
        'All position' => 'All position',
        'GK' => 'Goal Keeper',
        'GD' => 'Goal Defence',
        'WD' => 'Wing Defense',
        'C' => 'Centre',
        'WA' => 'Wing Attack',
        'GA' => 'Goal Attack',
        'GS' => 'Goal Shooter'
    ];


    public $password;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $rules = [
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
//            [['username', 'email'], 'required'],
        ];

        if ($this->isNewRecord) {
//            $rules[] = [['password'], 'required'];
        }

        return $rules;
//        return [
//
//        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'nick_name' => Yii::t('app', 'Nick Name'),
            'ic' => Yii::t('app', 'I/C No'),
            'econtact1_fullname' => Yii::t('app', 'Emergency Contact Name (Person 1)'),
            'econtact1_phone' => Yii::t('app', 'Emergency Contact Phone (Person 1)'),
            'econtact1_address' => Yii::t('app', 'Emergency Contact Addressn (Person 1)'),
            'econtact2_fullname' => Yii::t('app', 'Emergency Contact Name (Person 2)'),
            'econtact2_phone' => Yii::t('app', 'Emergency Contact Phone (Person 2)'),
            'econtact2_address' => Yii::t('app', 'Emergency Contact Address (Person 2)'),
            'user_status' => Yii::t('app', 'User Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function getUserStatus()
    {
        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->user->identity;
            return $user->user_status;

//            if ($user_status) {
//                echo "Your phone number is: " . Html::encode($user_status);
//            } else {
//                echo "Your phone number is not available.";
//            }
//        } else {
//            echo "You are not logged in.";
//            return false;
        }
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            // Generate an ID starting with 'CY' followed by 4 random numbers
            $this->user_id = 'CY' . sprintf('%04d', random_int(0, 9999));
        }

        if (is_array($this->position)) {
            $this->position = implode(',', $this->position);
        }

        return parent::beforeSave($insert);
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function afterFind()
    {
        parent::afterFind();
        if (!empty($this->position) && !is_array($this->position)) {
            $this->position = explode(',', $this->position);
        }
    }

    public function beforeSaveXX($insert)
    {
        if (is_array($this->position)) {
            $this->position = implode(',', $this->position);
        }
        return parent::beforeSave($insert);
    }
}

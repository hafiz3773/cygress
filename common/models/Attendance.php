<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "attendance".
 *
 * @property int $id
 * @property int $training_id
 * @property string $user_id
 * @property int $fee
 * @property int $created_at
 * @property int $updated_at
 */
class Attendance extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'attendance';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['training_id', 'user_id'], 'required'],
            [['training_id', 'fee', 'created_at', 'updated_at'], 'integer'],
            [['user_id'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'training_id' => Yii::t('app', 'Training ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'fee' => Yii::t('app', 'Has Paid?'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getEvent()
    {
        return $this->hasOne(Training::className(), ['id' => 'training_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }

    public static function getAttendedEventList()
    {
        $trainings = Training::find()
            ->innerJoin('attendance', 'attendance.training_id = training.id')
            ->all();
        return ArrayHelper::map($trainings, 'id', 'title');
    }

    public static function isAlreadyAttended($training_id, $user_id)
    {
        return self::find()->where(['training_id' => $training_id, 'user_id' => $user_id])->exists();
    }

    /**
     * {@inheritdoc}
     * @return AttendanceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AttendanceQuery(get_called_class());
    }
}

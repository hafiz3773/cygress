<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "training".
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property int|null $date
 * @property string|null $file
 * @property int $created_at
 * @property int $updated_at
 */
class Training extends \yii\db\ActiveRecord
{
    public $date_temp;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'training';
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
            [['title'], 'required'],
            [['description'], 'string'],
            [['date', 'created_at', 'updated_at'], 'integer'],
            [['title','file'], 'string', 'max' => 255],
            [['file'], 'image', 'extensions' => ['jpg', 'jpeg', 'png', 'gif']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'date' => Yii::t('app', 'Training Date'),
            'file' => Yii::t('app', 'File'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getStudent()
    {
        return $this->hasMany(Attendance::className(), ['training_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return TrainingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TrainingQuery(get_called_class());
    }
}

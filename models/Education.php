<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "education".
 *
 * @property int $id
 * @property int $id_aspirant
 * @property string $specialization
 * @property string $department
 * @property string $educ_institution
 * @property string $time_start
 * @property string $time_finish
 * @property string $achive
 *
 * @property Aspirant $aspirant
 */
class Education extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'education';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_aspirant'], 'integer'],
            [['time_start', 'time_finish'], 'safe'],
            [['achive'], 'string'],
            [['specialization'], 'string', 'max' => 50],
            [['department', 'educ_institution'], 'string', 'max' => 100],
            [['id_aspirant'], 'exist', 'skipOnError' => true, 'targetClass' => Aspirant::className(), 'targetAttribute' => ['id_aspirant' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_aspirant' => 'Id Aspirant',
            'specialization' => 'Specialization',
            'department' => 'Department',
            'educ_institution' => 'Educ Institution',
            'time_start' => 'Time Start',
            'time_finish' => 'Time Finish',
            'achive' => 'Achive',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAspirant()
    {
        return $this->hasOne(Aspirant::className(), ['id' => 'id_aspirant']);
    }
}

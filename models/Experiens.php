<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "experiens".
 *
 * @property int $id
 * @property string $exwork
 * @property string $position
 * @property string $responsibilities
 * @property string $time_start
 * @property string $time_finish
 * @property int $id_aspirant
 *
 * @property Aspirant $aspirant
 */
class Experiens extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'experiens';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['responsibilities'], 'string'],
            [['time_start', 'time_finish'], 'safe'],
            [['id_aspirant'], 'integer'],
            [['exwork', 'position'], 'string', 'max' => 50],
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
            'exwork' => 'Exwork',
            'position' => 'Position',
            'responsibilities' => 'Responsibilities',
            'time_start' => 'Time Start',
            'time_finish' => 'Time Finish',
            'id_aspirant' => 'Id Aspirant',
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

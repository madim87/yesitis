<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vac_experience".
 *
 * @property int $id
 * @property string $value
 *
 * @property Vacancy[] $vacancies
 */
class VacExperience extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vac_experience';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['experience_id' => 'id']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_work_time".
 *
 * @property int $id
 * @property string $type_work
 *
 * @property Vacancy[] $vacancies
 */
class TypeWorkTime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_work_time';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_work'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_work' => 'Type Work',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['type_work_id' => 'id']);
    }
}

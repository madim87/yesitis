<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "technology".
 *
 * @property int $id
 * @property string $technology
 *
 * @property Vacancy[] $vacancies
 */
class Technology extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'technology';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['technology'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'technology' => 'Technology',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['id_tech_leng' => 'id']);
    }
}

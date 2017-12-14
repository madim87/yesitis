<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancy_category".
 *
 * @property int $id
 * @property string $name_category
 *
 * @property Vacancy[] $vacancies
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_category'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_category' => 'Name Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['id_category' => 'id']);
    }
}

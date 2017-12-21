<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vac_tech".
 *
 * @property int $id
 * @property int $id_vacancy
 * @property int $id_tech
 *
 * @property Vacancy $vacancy
 * @property Technology $tech
 */
class VacTech extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vac_tech';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_vacancy', 'id_tech'], 'integer'],
            [['id_vacancy'], 'exist', 'skipOnError' => true, 'targetClass' => Vacancy::className(), 'targetAttribute' => ['id_vacancy' => 'id']],
            [['id_tech'], 'exist', 'skipOnError' => true, 'targetClass' => Technology::className(), 'targetAttribute' => ['id_tech' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_vacancy' => 'Id Vacancy',
            'id_tech' => 'Id Tech',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancy()
    {
        return $this->hasOne(Vacancy::className(), ['id' => 'id_vacancy']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTech()
    {
        return $this->hasOne(Technology::className(), ['id' => 'id_tech']);
    }
}

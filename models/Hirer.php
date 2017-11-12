<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hirer".
 *
 * @property int $id
 * @property string $name_hirer
 * @property string $address
 *
 * @property Correspondence[] $correspondences
 * @property StatisticViewSummary[] $statisticViewSummaries
 * @property Vacancy[] $vacancies
 */
class Hirer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hirer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_hirer'], 'string', 'max' => 200],
            [['address'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_hirer' => 'Name Hirer',
            'address' => 'Address',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorrespondences()
    {
        return $this->hasMany(Correspondence::className(), ['id_hirer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatisticViewSummaries()
    {
        return $this->hasMany(StatisticViewSummary::className(), ['id_hirer' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacancies()
    {
        return $this->hasMany(Vacancy::className(), ['id_hirer' => 'id']);
    }
}

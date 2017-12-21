<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "summary".
 *
 * @property int $id
 * @property string $discription
 * @property int $id_aspirant
 * @property string $date_public
 *
 * @property StatisticViewSummary[] $statisticViewSummaries
 * @property Aspirant $aspirant
 */
class Summary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['discription'], 'string'],
            [['id_aspirant'], 'integer'],
            [['date_public'], 'safe'],
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
            'discription' => 'Discription',
            'id_aspirant' => 'Id Aspirant',
            'date_public' => 'Date Public',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatisticViewSummaries()
    {
        return $this->hasMany(StatisticViewSummary::className(), ['id_summary' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAspirant()
    {
        return $this->hasOne(Aspirant::className(), ['id' => 'id_aspirant']);
    }

    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    public function getTypeWorkTime()
    {
        return $this->hasOne(TypeWorkTime::className(),['id' => 'type_work_id']);
    }

    public function getTechnology(){
        return $this->hasMany(Technology::className(), ['id' => 'id_tech'])
            ->viaTable('summ_tech', ['id_summary' => 'id']);
    }

}

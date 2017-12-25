<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $name
 * @property string $demands
 * @property string $conditions
 * @property string $discription
 * @property string $shortDiscription
 * @property int $work_time
 * @property int $wage
 * @property string $date_public
 * @property int $id_hirer
 * @property int $id_category
 * @property int $id_tech_leng
 * @property int $experience_id
 * @property int $currency_id
 * @property int $type_work_id
 * @property int $status_id
 * @property string $adress
 * @property int $id_city
 * @property int $public
 *
 * @property VacTech[] $vacTeches
 * @property SkillStatus $status
 * @property VacancyCategory $category
 * @property Hirer $hirer
 * @property Technology $techLeng
 * @property City $city
 * @property Currency $currency
 * @property VacExperience $experience
 * @property TypeWorkTime $typeWork
 */
class Vacancy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['demands', 'conditions', 'discription'], 'string'],
            [['work_time', 'wage', 'id_hirer', 'id_category', 'id_tech_leng', 'experience_id', 'currency_id', 'type_work_id', 'status_id', 'id_city', 'public'], 'integer'],
            [['date_public'], 'safe'],
            [['public'],  'default', 'value' =>1],
            [['name', 'shortDiscription'], 'string', 'max' => 255],
            [['adress'], 'string', 'max' => 50],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SkillStatus::className(), 'targetAttribute' => ['status_id' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => VacancyCategory::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_hirer'], 'exist', 'skipOnError' => true, 'targetClass' => Hirer::className(), 'targetAttribute' => ['id_hirer' => 'id']],
            [['id_tech_leng'], 'exist', 'skipOnError' => true, 'targetClass' => Technology::className(), 'targetAttribute' => ['id_tech_leng' => 'id']],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['id_city' => 'id']],
            [['currency_id'], 'exist', 'skipOnError' => true, 'targetClass' => Currency::className(), 'targetAttribute' => ['currency_id' => 'id']],
            [['experience_id'], 'exist', 'skipOnError' => true, 'targetClass' => VacExperience::className(), 'targetAttribute' => ['experience_id' => 'id']],
            [['type_work_id'], 'exist', 'skipOnError' => true, 'targetClass' => TypeWorkTime::className(), 'targetAttribute' => ['type_work_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'demands' => 'Demands',
            'conditions' => 'Conditions',
            'discription' => 'Discription',
            'shortDiscription' => 'Short Discription',
            'work_time' => 'Work Time',
            'wage' => 'Wage',
            'date_public' => 'Date Public',
            'id_hirer' => 'Id Hirer',
            'id_category' => 'Id Category',
            'id_tech_leng' => 'Id Tech Leng',
            'experience_id' => 'Experience ID',
            'currency_id' => 'Currency ID',
            'type_work_id' => 'Type Work ID',
            'status_id' => 'Status ID',
            'adress' => 'Adress',
            'id_city' => 'Id City',
            'public' => 'Public',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacTeches()
    {
        return $this->hasMany(VacTech::className(), ['id_vacancy' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillStatus()
    {
        return $this->hasOne(SkillStatus::className(), ['id' => 'status_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(VacancyCategory::className(), ['id' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHirer()
    {
        return $this->hasOne(Hirer::className(), ['id' => 'id_hirer']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTechLeng()
    {
        return $this->hasOne(Technology::className(), ['id' => 'id_tech_leng']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'id_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Currency::className(), ['id' => 'currency_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVacExperience()
    {
        return $this->hasOne(VacExperience::className(), ['id' => 'experience_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getTypeWorkTime()
    {
        return $this->hasOne(TypeWorkTime::className(), ['id' => 'type_work_id']);
    }
}

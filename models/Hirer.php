<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hirer".
 *
 * @property int $id
 * @property string $name_hirer
 * @property string $working
 * @property string $description
 * @property string $short_desc
 * @property string $email
 * @property string $telephone
 * @property string $site
 * @property int $year_begin
 * @property int $id_city
 * @property string $address
 * @property int $user_id
 * @property int $people
 *
 * @property Correspondence[] $correspondences
 * @property City $city
 * @property User $user
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
            [['description', 'short_desc'], 'string'],
            [['year_begin', 'id_city', 'user_id', 'people'], 'integer'],
            [['name_hirer'], 'string', 'max' => 200],
            [['working'], 'string', 'max' => 250],
            [['email'], 'string', 'max' => 50],
            [['telephone', 'site'], 'string', 'max' => 21],
            [['address'], 'string', 'max' => 400],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['id_city' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file'=>'Photo',
            'name_hirer' => 'Name Hirer',
            'working' => 'Working',
            'description' => 'Description',
            'short_desc' => 'Short Desc',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'site' => 'Site',
            'year_begin' => 'Year Begin',
            'id_city' => 'Id City',
            'address' => 'Address',
            'user_id' => 'User ID',
            'people' => 'People',
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
    public function getCity()
    {
        return $this->hasOne(City::className(), ['id' => 'id_city']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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

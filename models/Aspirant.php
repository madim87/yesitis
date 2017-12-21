<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aspirant".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $age
 * @property string $address
 * @property int $user_id
 * @property int $id_city
 *
 * @property City $city
 * @property User $user
 * @property Correspondence[] $correspondences
 * @property Experiens[] $experiens
 * @property Summary[] $summaries
 */
class Aspirant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aspirant';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['age', 'user_id', 'id_city'], 'integer'],
            [['name', 'surname', 'patronymic'], 'string', 'max' => 50],
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
            'name' => 'Name',
            'surname' => 'Surname',
            'patronymic' => 'Patronymic',
            'age' => 'Age',
            'address' => 'Address',
            'user_id' => 'User ID',
            'id_city' => 'Id City',
        ];
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
    public function getCorrespondences()
    {
        return $this->hasMany(Correspondence::className(), ['id_aspirant' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperiens()
    {
        return $this->hasMany(Experiens::className(), ['id_aspirant' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummaries()
    {
        return $this->hasMany(Summary::className(), ['id_aspirant' => 'id']);
    }

}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancy".
 *
 * @property int $id
 * @property string $discription
 * @property int $id_hirer
 * @property int $id_category
 * @property int $id_tech_leng
 * @property string $date_public
 *
 * @property Technology $techLeng
 * @property VacancyCategory $category
 * @property Hirer $hirer
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
            [['discription'], 'string'],
            [['id_hirer', 'id_category', 'id_tech_leng'], 'integer'],
            [['date_public'], 'safe'],
            [['id_tech_leng'], 'exist', 'skipOnError' => true, 'targetClass' => Technology::className(), 'targetAttribute' => ['id_tech_leng' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => VacancyCategory::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_hirer'], 'exist', 'skipOnError' => true, 'targetClass' => Hirer::className(), 'targetAttribute' => ['id_hirer' => 'id']],
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
            'id_hirer' => 'Id Hirer',
            'id_category' => 'Id Category',
            'id_tech_leng' => 'Id Tech Leng',
            'date_public' => 'Date Public',
        ];
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
}

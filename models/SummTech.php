<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "summ_tech".
 *
 * @property int $id
 * @property int $id_summary
 * @property int $id_tech
 *
 * @property Technology $tech
 * @property Summary $summary
 */
class SummTech extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'summ_tech';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_summary', 'id_tech'], 'integer'],
            [['id_tech'], 'exist', 'skipOnError' => true, 'targetClass' => Technology::className(), 'targetAttribute' => ['id_tech' => 'id']],
            [['id_summary'], 'exist', 'skipOnError' => true, 'targetClass' => Summary::className(), 'targetAttribute' => ['id_summary' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_summary' => 'Id Summary',
            'id_tech' => 'Id Tech',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTech()
    {
        return $this->hasOne(Technology::className(), ['id' => 'id_tech']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSummary()
    {
        return $this->hasOne(Summary::className(), ['id' => 'id_summary']);
    }
}

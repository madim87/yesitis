<?php

use yii\db\Migration;

/**
 * Handles adding experience_id to table `vacancy`.
 */
class m171214_203159_add_experience_id_column_to_vacancy_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

 //       $this->addForeignKey('vacancy-to-curr', 'vacancy', 'currency_id', 'currency', 'id');
 //       $this->addForeignKey('vacancy-to-type', 'vacancy', 'type_work_id', 'type_work_time', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding id_experience to table `summary`.
 */
class m171221_160238_add_id_experience_column_to_summary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('summary','id_experience',$this->integer());
        $this->addForeignKey('summ-to-experience','summary','id_experience','vac_experience','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

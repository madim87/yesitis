<?php

use yii\db\Migration;

/**
 * Handles adding type_work_id to table `summary`.
 */
class m171220_180628_add_type_work_id_column_to_summary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('summary','type_work_id',$this->integer());
        $this->addForeignKey('summary-to-typework','summary','type_work_id','type_work_time','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

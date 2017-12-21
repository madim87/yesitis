<?php

use yii\db\Migration;

/**
 * Handles adding id_cat to table `summary`.
 */
class m171221_181359_add_id_cat_column_to_summary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('summary','id_cat',$this->integer());
        $this->addForeignKey('summ-to-cat','summary','id_cat','vacancy_category','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

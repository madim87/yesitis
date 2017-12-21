<?php

use yii\db\Migration;

/**
 * Handles adding wage to table `summary`.
 */
class m171220_174520_add_wage_column_to_summary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('summary','wage',$this->integer());
        $this->addColumn('summary','currency_id',$this->integer());
        $this->addForeignKey('summary-to-currency','summary','currency_id','currency','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

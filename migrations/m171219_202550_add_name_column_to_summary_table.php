<?php

use yii\db\Migration;

/**
 * Handles adding name to table `summary`.
 */
class m171219_202550_add_name_column_to_summary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('summary','name',$this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

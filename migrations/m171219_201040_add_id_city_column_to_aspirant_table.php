<?php

use yii\db\Migration;

/**
 * Handles adding id_city to table `aspirant`.
 */
class m171219_201040_add_id_city_column_to_aspirant_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('aspirant','id_city',$this->integer());
        $this->addForeignKey('aspirent-to-city','aspirant','id_city','city','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

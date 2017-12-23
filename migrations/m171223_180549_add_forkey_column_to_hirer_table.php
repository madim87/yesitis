<?php

use yii\db\Migration;

/**
 * Handles adding forkey to table `hirer`.
 */
class m171223_180549_add_forkey_column_to_hirer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addForeignKey('hirer-to-city','hirer','id_city','city','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

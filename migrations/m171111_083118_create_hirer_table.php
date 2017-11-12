<?php

use yii\db\Migration;

/**
 * Handles the creation of table `hirer`.
 */
class m171111_083118_create_hirer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('hirer', [
            'id' => $this->primaryKey(),
            'name_hirer' => $this->string(200),
            'address' => $this->string(400)
        ]);
        $this->addForeignKey('stat-to-hirer','statistic_view_summary','id_hirer','hirer','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('hirer');
    }
}

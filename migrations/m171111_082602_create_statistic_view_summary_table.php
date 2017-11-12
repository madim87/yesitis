<?php

use yii\db\Migration;

/**
 * Handles the creation of table `statistic_view_summary`.
 */
class m171111_082602_create_statistic_view_summary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('statistic_view_summary', [
            'id' => $this->primaryKey(),
            'id_summary' => $this->integer(11),
            'id_hirer' => $this->integer(11)
        ]);
        $this->addForeignKey('stat-to-summary','statistic_view_summary','id_summary','summary','id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('statistic_view_summary');
    }
}

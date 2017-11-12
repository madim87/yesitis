<?php

use yii\db\Migration;

/**
 * Handles the creation of table `summary`.
 */
class m171111_080953_create_summary_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('summary', [
            'id' => $this->primaryKey(),
            'discription' => $this->text(),
            'id_aspirant' => $this->integer(),
            'date_public' => $this->timestamp()
        ]);
        $this->addForeignKey('summ-to-asp','summary','id_aspirant','aspirant','id');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('summary');
    }
}

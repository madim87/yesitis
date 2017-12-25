<?php

use yii\db\Migration;

/**
 * Handles the creation of table `public_status`.
 */
class m171225_080924_create_public_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
      //  $this->createTable('public_status', [
      //      'id' => $this->primaryKey(),
      //      'status' => $this->string()
      //  ]);
        $this->addForeignKey('vac-to-public', 'vacancy', 'public', 'public_status', 'id');
        $this->addForeignKey('summary-to-public', 'summary', 'public', 'public_status', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('public_status');
    }
}

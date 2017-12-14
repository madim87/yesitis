<?php

use yii\db\Migration;

/**
 * Handles the creation of table `currency`.
 */
class m171214_195152_create_currency_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('currency', [
            'id' => $this->primaryKey(),
            'name' => $this->string(10)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('currency');
    }
}

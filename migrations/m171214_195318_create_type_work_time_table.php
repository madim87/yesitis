<?php

use yii\db\Migration;

/**
 * Handles the creation of table `type_work_time`.
 */
class m171214_195318_create_type_work_time_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('type_work_time', [
            'id' => $this->primaryKey(),
            'type_work' => $this->string(20)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('type_work_time');
    }
}

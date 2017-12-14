<?php

use yii\db\Migration;

/**
 * Handles the creation of table `skill_status`.
 */
class m171214_212035_create_skill_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('skill_status', [
            'id' => $this->primaryKey(),
            'status' => $this->string(20)
        ]);

        $this->addColumn('vacancy','status_id',$this->integer());
        $this->addForeignKey('status-to-vac','vacancy','status_id','skill_status','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('skill_status');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `experiens`.
 */
class m171111_082140_create_experiens_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('experiens', [
            'id' => $this->primaryKey(),
            'exwork' => $this->string(400),
            'period' => $this->string(250),
            'id_aspirant' => $this->integer(11)
        ]);
        $this->addForeignKey('exp-to-asp','experiens','id_aspirant','aspirant','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('experiens');
    }
}

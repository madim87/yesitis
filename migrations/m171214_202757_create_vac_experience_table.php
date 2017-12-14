<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vac_experience`.
 */
class m171214_202757_create_vac_experience_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vac_experience', [
            'id' => $this->primaryKey(),
            'value' => $this->string(20)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vac_experience');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `aspirent`.
 */
class m171111_080630_create_aspirant_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('aspirant', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
            'surname' => $this->string(50),
            'patronymic' => $this->string(50),
            'age' => $this->integer(3),
            'address' => $this->string(400)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('aspirent');
    }
}

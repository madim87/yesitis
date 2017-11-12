<?php

use yii\db\Migration;

/**
 * Handles the creation of table `technology`.
 */
class m171111_085148_create_technology_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('technology', [
            'id' => $this->primaryKey(),
            'technology' => $this->string(400)
        ]);
        $this->addForeignKey('vac-to-tech','vacancy','id_tech_leng','technology','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('technology');
    }
}

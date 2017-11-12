<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vacancy_category`.
 */
class m171111_084827_create_vacancy_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vacancy_category', [
            'id' => $this->primaryKey(),
            'name_category' => $this->string(100)
        ]);
        $this->addForeignKey('vac-to-category','vacancy','id_category','vacancy_category','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vacancy_category');
    }
}

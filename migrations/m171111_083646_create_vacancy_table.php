<?php

use yii\db\Migration;

/**
 * Handles the creation of table `vacancy`.
 */
class m171111_083646_create_vacancy_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('vacancy', [
            'id' => $this->primaryKey(),
            'discription' => $this->text(),
            'id_hirer' => $this->integer(),
            'id_category' => $this->integer(),
            'id_tech_leng' => $this->integer(),
            'date_public' => $this->timestamp()
        ]);
        $this->addForeignKey('vac-to-hirer', 'vacancy','id_hirer','hirer','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('vacancy');
    }
}

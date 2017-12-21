<?php

use yii\db\Migration;

/**
 * Handles adding keyvac to table `vacancy`.
 */
class m171220_195648_add_keyvac_column_to_vacancy_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addForeignKey('vaca-to-techa','vac_tech','id_vacancy','vacancy','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

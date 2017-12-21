<?php

use yii\db\Migration;

/**
 * Handles the creation of table `summ_tech`.
 */
class m171220_183749_create_summ_tech_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('summ_tech', [
            'id' => $this->primaryKey(),
            'id_summary' => $this->integer(),
            'id_tech' => $this->integer()
        ]);

        $this->createTable('vac_tech',[
            'id' => $this->primaryKey(),
            'id_vacancy' => $this->integer(),
            'id_tech' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('summ_tech');
    }
}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `correspondence`.
 */
class m171111_084309_create_correspondence_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('correspondence', [
            'id' => $this->primaryKey(),
            'id_aspirant' => $this->integer(),
            'id_hirer' => $this->integer(),
            'sender' => $this->string(250),
            'date' => $this->timestamp()
        ]);
        $this->addForeignKey('corr-to-asp','correspondence','id_aspirant','aspirant','id');
        $this->addForeignKey('corr-to-hirer','correspondence','id_hirer','hirer','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('correspondence');
    }
}

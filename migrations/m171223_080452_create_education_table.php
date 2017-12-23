<?php

use yii\db\Migration;

/**
 * Handles the creation of table `education`.
 */
class m171223_080452_create_education_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('education', [
            'id' => $this->primaryKey(),
            'id_aspirant' => $this->integer(),
            'specialization' => $this->string(50),
            'department' => $this->string(100),
            'educ_institution' => $this->string(100),
            'time_start' => $this->timestamp(),
            'time_finish' => $this->timestamp(),
            'achive' => $this->text()
        ]);
        $this->addForeignKey('edu-to-aspirant','education','id_aspirant','aspirant','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('education');
    }
}

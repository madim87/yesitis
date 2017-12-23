<?php

use yii\db\Migration;

/**
 * Handles adding email to table `aspirant`.
 */
class m171223_064753_add_email_column_to_aspirant_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('aspirant','email',$this->string(28));
        $this->addColumn('aspirant','telephone',$this->string(21));
        $this->addColumn('aspirant','site',$this->string(40));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

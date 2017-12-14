<?php

use yii\db\Migration;

/**
 * Handles adding name to table `vacancy`.
 */
class m171213_205835_add_name_column_to_vacancy_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {

        $this->addColumn('vacancy', 'experience', $this->integer());
        $this->addColumn('vacancy', 'wage', $this->integer());

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
    }
}

<?php

use yii\db\Migration;

/**
 * Handles adding shortDiscription to table `vacancy`.
 */
class m171122_194802_add_shortDiscription_column_to_vacancy_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('vacancy', 'shortDiscription', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('vacancy', 'shortDiscription');
    }
}

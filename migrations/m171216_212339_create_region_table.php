<?php

use yii\db\Migration;

/**
 * Handles the creation of table `region`.
 */
class m171216_212339_create_region_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('region', [
            'id' => $this->primaryKey(),
            'region' => $this->string(8)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('region');
    }
}

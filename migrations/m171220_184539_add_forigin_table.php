<?php

use yii\db\Migration;

/**
 * Class m171220_184539_add_forigin_table
 */
class m171220_184539_add_forigin_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
//        $this->addColumn('summary','id_tech',$this->integer());
        $this->addForeignKey('sum-to-tech','summ_tech','id_summary','summary','id');
//        $this->addForeignKey('tech-to-summ','summ_tech','id_tech','technology','id');
        $this->addForeignKey('vac-to-tech','vac_tech','id_vacancy','vacancy','id');
//        $this->addForeignKey('tech-to-vac','vac_tech','id_tech','technology','id');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171220_184539_add_forigin_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171220_184539_add_forigin_table cannot be reverted.\n";

        return false;
    }
    */
}

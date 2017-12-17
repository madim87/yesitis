<?php

use yii\db\Migration;

/**
 * Handles the creation of table `city`.
 */
class m171216_214903_create_city_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
 //       $this->createTable('city', [
//            'id' => $this->primaryKey(),
//            'name' => $this->string(21),
//            'id_region' => $this->integer()
//        ]);
        $this->dropColumn('vacancy', 'id_city');
        $this->addColumn('vacancy', 'id_city',$this->integer());
        $this->addForeignKey('vacancy-to-city','vacancy','id_city','city','id');
        $this->addForeignKey('city-to-region','city','id_region','region','id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('city');
    }
}

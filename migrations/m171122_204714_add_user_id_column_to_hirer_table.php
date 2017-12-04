<?php

use yii\db\Migration;

/**
 * Handles adding user_id to table `hirer`.
 */
class m171122_204714_add_user_id_column_to_hirer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('hirer', 'user_id', $this->integer());
        $this->addColumn('aspirant', 'user_id', $this->integer());
        $this->addForeignKey('hirer-to-user', 'hirer', 'user_id', 'user', 'id');
        $this->addForeignKey('aspirant-to-user', 'aspirant', 'user_id', 'user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('hirer', 'user_id');
    }
}

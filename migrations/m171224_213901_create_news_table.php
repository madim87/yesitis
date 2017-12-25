<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m171224_213901_create_news_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(),
            'content'=>$this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }
}

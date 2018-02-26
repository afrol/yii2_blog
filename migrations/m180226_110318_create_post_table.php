<?php

use yii\db\Migration;

/**
 * Handles the creation of table `post`.
 */
class m180226_110318_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;

        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('post', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer()->notNull(),
            'date' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'text' => $this->text()->notNull(),
            'title' => $this->string()->notNull()->unique(),
            'abridgment' => $this->text()->notNull(),
            'activity' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('post');
    }
}

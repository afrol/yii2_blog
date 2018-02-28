<?php

use yii\db\Migration;

/**
 * Handles the creation of table `country`.
 */
class m180228_094308_create_country_table extends Migration
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

        $this->createTable('country', [
            'code' => $this->char(2)->notNull(),
            'name' => $this->char(52)->notNull()->unique(),
            'population' => $this->integer(11)->unsigned()->notNull()->defaultValue(0)
        ], $tableOptions);

        $this->addPrimaryKey('code', 'country', 'code');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('country');
    }
}

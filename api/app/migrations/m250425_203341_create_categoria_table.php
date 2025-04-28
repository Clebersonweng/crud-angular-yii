<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categoria}}`.
 */
class m250425_203341_create_categoria_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('categoria', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
        ]);

        $this->batchInsert('categoria', ['id', 'name'], [
            [1, 'Esportes'],
            [2, 'Eletrônicos'],
            [3, 'Lazer'],
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('categoria');
    }
}

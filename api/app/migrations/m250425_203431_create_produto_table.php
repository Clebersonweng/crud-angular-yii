<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m250425_203431_create_produto_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('produto', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'quantidade' => $this->integer()->notNull(),
            'categoria_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk_produto_categoria',
            'produto',
            'categoria_id',
            'categoria',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('produto');
    }
}

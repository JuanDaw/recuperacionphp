<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%productos}}`.
 */
class m210618_165207_create_productos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%productos}}', [
            'id' => $this->bigPrimaryKey(),
            'denominacion' => $this->string()->notNull(),
            'categoria_id' => $this->bigInteger()->notNull(),
            'precio' => $this->decimal(7, 2),
        ]);

        $this->addForeignKey(
            'fk_productos_categorias',
            'productos',
            'categoria_id',
            'categorias',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%productos}}');
    }
}

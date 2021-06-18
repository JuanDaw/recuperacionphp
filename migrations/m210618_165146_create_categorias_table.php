<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categorias}}`.
 */
class m210618_165146_create_categorias_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categorias}}', [
            'id' => $this->bigPrimaryKey(),
            'nombre' => $this->string(3),
        ]);

        $this->insert('categorias', ['nombre' => 'PRE']);

        $this->insert('categorias', ['nombre' => 'FAB']);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categorias}}');
    }
}

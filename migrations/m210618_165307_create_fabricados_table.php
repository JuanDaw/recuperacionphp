<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fabricados}}`.
 */
class m210618_165307_create_fabricados_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%fabricados}}', [
            'id' => $this->bigPrimaryKey(),
            'ancho' => $this->integer()->notNull(),
            'alto' => $this->integer()->notNull(),

        ]);

        $this->addForeignKey(
            'fk_fabricados_productos',
            'fabricados',
            'id',
            'productos',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fabricados}}');
    }
}

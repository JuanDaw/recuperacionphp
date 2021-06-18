<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pedidos}}`.
 */
class m210618_165323_create_pedidos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pedidos}}', [
            'id' => $this->bigPrimaryKey(),
            'fecha_hora' => $this->timestamp(0),
            'usuario_id' => $this->bigInteger()->notNull(),
            'producto_id' => $this->bigInteger()->notNull(),
            'cantidad' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_pedidos_usuarios',
            'pedidos',
            'usuario_id',
            'usuarios',
            'id'
        );

        $this->addForeignKey(
            'fk_pedidos_producto',
            'pedidos',
            'producto_id',
            'productos',
            'id',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pedidos}}');
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id
 * @property string $denominacion
 * @property int $categoria_id
 * @property float|null $precio
 *
 * @property Fabricados $fabricados
 * @property Pedidos[] $pedidos
 * @property Categorias $categoria
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['denominacion', 'categoria_id'], 'required'],
            [['categoria_id'], 'default', 'value' => null],
            [['categoria_id'], 'integer'],
            [['precio'], 'number'],
            [['denominacion'], 'string', 'max' => 255],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['categoria_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'denominacion' => 'Denominacion',
            'categoria_id' => 'Categoria ID',
            'precio' => 'Precio unitario',
        ];
    }

    /**
     * Gets query for [[Fabricados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFabricados()
    {
        return $this->hasOne(Fabricados::class, ['id' => 'id'])
            ->inverseOf('producto');
    }

    /**
     * Gets query for [[Pedidos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedidos::class, ['producto_id' => 'id'])
            ->inverseOf('producto');
    }

    /**
     * Gets query for [[Categoria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categorias::class, ['id' => 'categoria_id'])
            ->inverseOf('productos');
    }
}

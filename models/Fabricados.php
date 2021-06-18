<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fabricados".
 *
 * @property int $id
 * @property int $ancho
 * @property int $alto
 *
 * @property Productos $id0
 */
class Fabricados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fabricados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ancho', 'alto'], 'required'],
            [['ancho', 'alto'], 'default', 'value' => null],
            [['ancho', 'alto'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ancho' => 'Ancho',
            'alto' => 'Alto',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::class, ['id' => 'id'])
            ->inverseOf('fabricados');
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resena".
 *
 * @property integer $id
 * @property string $titulo
 * @property integer $usuario_id
 * @property string $fecha
 *
 * @property User $usuario
 */
class Resena extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resena';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['usuario_id'], 'integer'],
            [['fecha'], 'safe'],
            [['titulo'], 'string', 'max' => 20],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['usuario_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
            'usuario_id' => 'Usuario ID',
            'fecha' => 'Fecha',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'usuario_id']);
    }
}

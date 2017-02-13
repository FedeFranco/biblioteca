<?php

namespace app\models;

use Yii;
use app\models\Libro;

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

    public function resenar($titulo,$cuerpo,$libro,$usuario){
        $this->titulo = $titulo;
        $this->cuerpo = $cuerpo;
        $this->libro_id = Libro::find()->select('id')->where(['titulo' => $libro]);
        $this->usuario_id = $usuario;
        $this->save();
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(User::className(), ['id' => 'usuario_id'])->inverseOf('resenas');
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property integer $id
 * @property string $titulo
 *
 * @property Alquilan[] $alquilans
 */
class Libro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo'], 'string', 'max' => 100],
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
        ];
    }

    public function getLib()
    {  if ($this->titulo[0] === 'M') {
        return $this->titulo;}
        else {
        return $this->titulo;
        }

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlquilan()
    {
        return $this->hasMany(Alquilan::className(), ['libros_id' => 'id'])->inverseOf('libros');
    }
}

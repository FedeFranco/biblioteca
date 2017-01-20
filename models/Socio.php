<?php

namespace app\models;

use Yii;
use app\models\Alquiler;
use app\models\Libro;

/**
 * This is the model class for table "socios".
 *
 * @property integer $id
 * @property string $nombre
 *
 * @property Alquilan[] $alquilans
 */
class Socio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'socios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlquiler()
    {
        return $this->hasMany(Alquiler::className(), ['socios_id' => 'id'])->inverseOf('socios');
    }

    public function getSuLibro()
    {
        $elId = $this->getAlquiler()->select('libros_id')->scalar();
        var_dump($elId); die();
        if (!$elId) {
            return "Este socio no tiene libro";
        }else {
            $lib = Libro::find()->select('titulo')->where(['id'=>$elId])->scalar();
            return $lib;
        }

    }
}

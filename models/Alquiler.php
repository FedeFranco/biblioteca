<?php
namespace app\models;

use Yii;
use app\models\Socio;
use app\models\Libro;
/**
 * This is the model class for table "alquilan".
 *
 * @property integer $id
 * @property integer $socios_id
 * @property integer $libros_id
 * @property string $fecha
 *
 * @property Libros $libros
 * @property Socios $socios
 */
class Alquiler extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alquilan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['socios_id', 'libros_id'], 'integer'],
            [['fecha'], 'safe'],
            [['libros_id'], 'exist', 'skipOnError' => true, 'targetClass' => Libro::className(), 'targetAttribute' => ['libros_id' => 'id']],
            [['socios_id'], 'exist', 'skipOnError' => true, 'targetClass' => Socio::className(), 'targetAttribute' => ['socios_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'socios_id' => 'Socios ID',
            'libros_id' => 'Libros ID',
            'fecha' => 'Fecha',
        ];
    }


    public function alquiler($socio,$libro)
    {
        $this->socios_id = Socio::find()->select('id')
        ->where(['nombre'=>$socio])->scalar();

        $this->libros_id = Libro::find()->select('id')
        ->where(['titulo'=>$libro])->scalar();

        $this->save();
        return true;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibros()
    {
        return $this->hasOne(Libro::className(), ['id' => 'libros_id'])->inverseOf('alquiler');

    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocios()
    {
        return $this->hasOne(Socio::className(), ['id' => 'socios_id'])->inverseOf('alquiler');
    }

    public function getDev()
    {   $w = $this->getSocios()->select('nombre')->where(['id'=>'1'])->scalar();
        var_dump($w); die();
        return $w;
    }

    public function tomarFecha()
    {
        $fecha = $this::find()->max('fecha');
        $socio = Socio::find()->joinWith('alquiler')->select('nombre')->where(['fecha'=>$fecha])->scalar();

        return $socio;
    }
}

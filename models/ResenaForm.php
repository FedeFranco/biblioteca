<?php
namespace app\models;
use yii\base\Model;

class ResenaForm extends Model
{
    public $titulo;
    public $cuerpo;
    public $libro;

    public function rules()
    {
        return [
            [['titulo','cuerpo','libro'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'titulo'=> 'Titulo',
            'cuerpo'=> 'Texto de la Reseña',
            'libro' => 'Libro',
        ];
    }
}

<?php
namespace app\models;
use yii\base\Model;

class ResenaForm extends Model
{
    public $titulo;
    public $cuerpo;

    public function rules()
    {
        return [
            [['titulo','cuerpo'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'titulo'=> 'Titulo',
            'cuerpo'=> 'Texto de la Reseña',
        ];
    }
}

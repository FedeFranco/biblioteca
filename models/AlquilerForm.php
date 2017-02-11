<?php
namespace app\models;
use yii\base\Model;

class AlquilerForm extends Model
{
    public $socio;
    public $libro;

    public function rules()
    {
        return [
            [['socio','libro'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'socio'=> 'Socio',
            'libro'=> 'Libro',
        ];
    }
}

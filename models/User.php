<?php

namespace app\models;

use dektrium\user\models\User as BaseUser;

class User extends BaseUser
{
    public function getResena()
  {
      return $this->hasMany(Resena::className(), ['usuario_id' => 'id'])->inverseOf('usuario');
  }
}

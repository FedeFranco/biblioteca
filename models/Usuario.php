<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $password
 * @property string $token
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ESC_CREATE = 'create';
    public $pass;
    public $passConfirma;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'password'], 'required'],
            [['pass','passConfirma'],'required','on'=>self::ESC_CREATE],
            [['nombre'], 'string', 'max' => 15],
            [['pass'],'safe'],
            [['password'], 'string', 'max' => 60],
            [['token'], 'string', 'max' => 32],
            [['nombre'], 'unique'],
            [['passConfirma'],'confirmaPass'],
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
            'password' => 'Password',
            'token' => 'Token',
            'pass'=>'Contraseña actual',
            'passConfirma' => 'Confirmar Contraseña',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    /**
     * Finds user by Nombre
     *
     * @param string $username
     * @return static|null
     */
    public static function BuscarPorNombre($nombre)
    {
        return static::findOne(['nombre'=>$nombre]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->token;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->token === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validarPassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function confirmaPass($params,$attribute)
    {
        if ($this->pass !== $this->passConfirma) {
            $this->addError($attribute, 'Las contraseñas no coinciden');
        }
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->pass != '' || $insert) {
                $this->password = Yii::$app->security->generatePasswordHash($this->pass);
            }
            if ($insert) {
                $this->token = Yii::$app->security->generateRandomString();
            }
            return true;
        } else {
            return false;
        }
    }
}

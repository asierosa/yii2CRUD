<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $ID
 * @property string $Nombre
 * @property string $Username
 * @property string $Password
 * @property string $authKey
 * @property string $accessToken
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Username', 'Password', 'authKey', 'accessToken'], 'required'],
            [['Nombre', 'authKey', 'accessToken'], 'string', 'max' => 20],
            [['Username'], 'string', 'max' => 50],
            [['Password'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Nombre' => 'Nombre',
            'Username' => 'Username',
            'Password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
    public static function findIdentity($id){
    return self::findOne($id);
    }
        
    public static function findIdentityByAccessToken($token, $type = null){
    return self::findOne(['access_token' => $token]);
    }
            
    public function getId(){
    return $this->ID;
    }
    public function getAuthKey(){
    return $this->authKey;
    }
    public function validateAuthKey($authKey){
    return $this->authKey === $authKey;
    }
    public static function findByUsername($username) {
        return self::findOne(['Username' => $username]);
    }
    public function validatePassword($password){
        return $this->Password === $password;
        /* Yii::$app->getSecurity()->validatePassword($password, Password); */
    }
}


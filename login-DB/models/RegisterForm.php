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
 *  * @property string $Hash
 * @property string $authKey
 * @property string $accessToken
 */
class RegisterForm extends \yii\db\ActiveRecord
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
        return[
            [['Nombre', 'Username', 'Password'], 'required'],
            [['Nombre','Hash', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['Username'], 'string', 'max' => 50],
            [['Password'], 'string', 'max' => 100],
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
            'Hash' => 'Hash',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tareas".
 *
 * @property int $ID
 * @property string $Tarea
 * @property string $Descripción
 * @property int $ID_Usuario
 *
 * @property Usuario $usuario
 */
class Tareas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Tareas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Tarea', 'Descripción', 'ID_Usuario'], 'required'],
            [['ID_Usuario'], 'integer'],
            [['Tarea'], 'string', 'max' => 100],
            [['Descripción'], 'string', 'max' => 255],
            [['ID_Usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['ID_Usuario' => 'ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Tarea' => 'Tarea',
            'Descripción' => 'Descripción',
            'ID_Usuario' => 'Id Usuario',
        ];
    }

    /**
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuario::className(), ['ID' => 'ID_Usuario']);
    }
}

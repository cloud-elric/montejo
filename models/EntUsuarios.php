<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ent_usuarios".
 *
 * @property string $id_usuario
 * @property string $txt_nombre
 * @property string $txt_apellido
 * @property string $txt_email
 * @property string $tel_numero_telefonico
 * @property string $txt_url_image
 */
class EntUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ent_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre', 'txt_apellido', 'txt_email', 'tel_numero_telefonico'], 'required', 'message'=>'Campo requerido'],
            [['txt_nombre', 'txt_apellido', 'txt_email'], 'string', 'max' => 50],
        	[['tel_numero_telefonico'], 'string', 'max' => 10, 'message'=>'Maximo 10 digitos'],
        	[['tel_numero_telefonico'], 'string', 'min' => 10, 'message'=>'Mínimo 10 digitos'],
        	[['txt_email'], 'email', 'message'=>'Ingrese una dirección válida'],
            [['tel_numero_telefonico'], 'string', 'max' => 10],
            [['txt_url_image'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'txt_nombre' => 'Txt Nombre',
            'txt_apellido' => 'Txt Apellido',
            'txt_email' => 'Txt Email',
            'tel_numero_telefonico' => 'Tel Numero Telefonico',
            'txt_url_image' => 'Txt Url Image',
        ];
    }
}

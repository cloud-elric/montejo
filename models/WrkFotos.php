<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "wrk_fotos".
 *
 * @property string $id
 * @property string $num_camara
 * @property string $txt_url
 * @property string $fch_recepcion
 */
class WrkFotos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wrk_fotos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num_camara'], 'integer'],
            [['fch_recepcion'], 'safe'],
            [['txt_url'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num_camara' => 'Num Camara',
            'txt_url' => 'Txt Url',
            'fch_recepcion' => 'Fch Recepcion',
        ];
    }
}

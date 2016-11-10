<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_marcos".
 *
 * @property string $id_marco
 * @property string $txt_url
 */
class CatMarcos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_marcos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_url'], 'required'],
            [['txt_url'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_marco' => 'Id Marco',
            'txt_url' => 'Txt Url',
        ];
    }
}

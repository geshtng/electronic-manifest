<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pelabuhan".
 *
 * @property int $id
 * @property string $nama
 * @property string $lokasi
 */
class Pelabuhan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pelabuhan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'lokasi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'lokasi' => 'Lokasi',
        ];
    }
}

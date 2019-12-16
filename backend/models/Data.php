<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "data".
 *
 * @property int $id
 * @property string $nama
 * @property string $jk
 * @property string $alamat
 * @property int $umur
 * @property string $no_kendaraan
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['umur'], 'integer'],
            [['nama', 'jk', 'alamat', 'no_kendaraan'], 'string', 'max' => 255],
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
            'jk' => 'Jk',
            'alamat' => 'Alamat',
            'umur' => 'Umur',
            'no_kendaraan' => 'No Kendaraan',
        ];
    }
}

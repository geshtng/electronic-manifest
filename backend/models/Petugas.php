<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "petugas".
 *
 * @property int $id
 * @property string $nama
 * @property string $nik
 * @property string $jabatan
 * @property string $jk
 * @property string $alamat
 * @property int $user_id
 * @property int $status
 * @property string $daerah
 *
 * @property User $user
 */
class Petugas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'petugas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status'], 'integer'],
            [['nama', 'nik', 'jabatan', 'jk', 'alamat'], 'string', 'max' => 255],
            [['daerah'], 'string', 'max' => 30],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'nik' => 'Nik',
            'jabatan' => 'Jabatan',
            'jk' => 'Jk',
            'alamat' => 'Alamat',
            'user_id' => 'User ID',
            'status' => 'Status',
            'daerah' => 'Daerah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

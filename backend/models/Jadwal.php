<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property int $id
 * @property string $tanggal
 * @property string $waktu
 * @property string $asal
 * @property string $tujuan
 * @property int $kapal_id
 * @property string $status
 *
 * @property Kapal $kapal
 * @property Penumpang[] $penumpangs
 * @property Penumpang[] $penumpangs0
 */
class Jadwal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal', 'waktu'], 'safe'],
            [['kapal_id'], 'integer'],
            [['asal', 'tujuan', 'status'], 'string', 'max' => 255],
            [['kapal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kapal::className(), 'targetAttribute' => ['kapal_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'waktu' => 'Waktu',
            'asal' => 'Asal',
            'tujuan' => 'Tujuan',
            'kapal_id' => 'Kapal ID',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKapal()
    {
        return $this->hasOne(Kapal::className(), ['id' => 'kapal_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenumpangs()
    {
        return $this->hasMany(Penumpang::className(), ['jadwal_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenumpangs0()
    {
        return $this->hasMany(Penumpang::className(), ['jadwal_id' => 'id']);
    }
}

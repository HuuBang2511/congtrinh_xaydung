<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "chu_dau_tu".
 *
 * @property int $id
 * @property string|null $ten
 * @property string|null $cccd_cmnd
 * @property string|null $so_dienthoai
 * @property string|null $dia_chi
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CongTrinh[] $congTrinhs
 * @property CongtrinhThaydoi[] $congtrinhThaydois
 * @property DuAn[] $duAns
 */
class ChuDauTu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'chu_dau_tu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['status', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['ten'], 'string', 'max' => 200],
            [['cccd_cmnd'], 'string', 'max' => 100],
            [['so_dienthoai'], 'string', 'max' => 20],
            [['dia_chi'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên',
            'cccd_cmnd' => 'CCCD/CMND',
            'so_dienthoai' => 'Số điện thoại',
            'dia_chi' => 'Địa chỉ',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CongTrinhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongTrinhs()
    {
        return $this->hasMany(CongTrinh::class, ['chudautu_id' => 'id']);
    }

    /**
     * Gets query for [[CongtrinhThaydois]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongtrinhThaydois()
    {
        return $this->hasMany(CongtrinhThaydoi::class, ['chudautu_id' => 'id']);
    }

    /**
     * Gets query for [[DuAns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDuAns()
    {
        return $this->hasMany(DuAn::class, ['chudautu_id' => 'id']);
    }
}

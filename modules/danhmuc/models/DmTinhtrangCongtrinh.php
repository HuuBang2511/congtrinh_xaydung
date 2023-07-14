<?php

namespace app\modules\danhmuc\models;

use Yii;

/**
 * This is the model class for table "dm_tinhtrang_congtrinh".
 *
 * @property int $id
 * @property string|null $ten Tên tình trạng
 * @property string|null $ghi_chu Ghi chú
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CongTrinh[] $congTrinhs
 * @property CongtrinhThaydoi[] $congtrinhThaydois
 */
class DmTinhtrangCongtrinh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dm_tinhtrang_congtrinh';
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
            [['ghi_chu'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên tình trạng',
            'ghi_chu' => 'Ghi chú',
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
        return $this->hasMany(CongTrinh::class, ['tinhtrangcongtrinh_id' => 'id']);
    }

    /**
     * Gets query for [[CongtrinhThaydois]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongtrinhThaydois()
    {
        return $this->hasMany(CongtrinhThaydoi::class, ['tinhtrangcongtrinh_id' => 'id']);
    }
}

<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "donvi_pheduyet".
 *
 * @property int $id
 * @property string|null $ten Tên đơn vị phê duyệt
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CongTrinh[] $congTrinhs
 * @property CongtrinhThaydoi[] $congtrinhThaydois
 */
class DonviPheduyet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donvi_pheduyet';
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
            [['ten'], 'string', 'max' => 300],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên đơn vị phê duyệt',
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
        return $this->hasMany(CongTrinh::class, ['donvipheduyet_id' => 'id']);
    }

    /**
     * Gets query for [[CongtrinhThaydois]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongtrinhThaydois()
    {
        return $this->hasMany(CongtrinhThaydoi::class, ['donvipheduyet_id' => 'id']);
    }
}

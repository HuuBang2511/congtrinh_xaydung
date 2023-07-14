<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "donvi_capphep".
 *
 * @property int $id
 * @property string|null $ten Tên đơn vị cấp phép
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CongtrinhTimeline[] $congtrinhTimelines
 * @property DuanTimeline[] $duanTimelines
 */
class DonviCapphep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donvi_capphep';
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên đơn vị cấp phép',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[CongtrinhTimelines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongtrinhTimelines()
    {
        return $this->hasMany(CongtrinhTimeline::class, ['donvicapphep_id' => 'id']);
    }

    /**
     * Gets query for [[DuanTimelines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDuanTimelines()
    {
        return $this->hasMany(DuanTimeline::class, ['donvicapphep_id' => 'id']);
    }
}

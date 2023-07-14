<?php

namespace app\modules\danhmuc\models;

use Yii;

/**
 * This is the model class for table "dm_loaigiayphep".
 *
 * @property int $id
 * @property string|null $ten Tên loại giấy phép
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CongtrinhTimeline[] $congtrinhTimelines
 * @property DuanTimeline[] $duanTimelines
 */
class DmLoaigiayphep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dm_loaigiayphep';
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
            'ten' => 'Tên loại giấy phép',
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
        return $this->hasMany(CongtrinhTimeline::class, ['loaigiayphep_id' => 'id']);
    }

    /**
     * Gets query for [[DuanTimelines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDuanTimelines()
    {
        return $this->hasMany(DuanTimeline::class, ['loaigiayphep_id' => 'id']);
    }
}

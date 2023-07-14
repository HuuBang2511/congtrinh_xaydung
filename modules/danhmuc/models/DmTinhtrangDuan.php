<?php

namespace app\modules\danhmuc\models;

use Yii;

/**
 * This is the model class for table "dm_tinhtrang_duan".
 *
 * @property int $id
 * @property string|null $ten Tên tình trạng dự án
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property DuAn[] $duAns
 */
class DmTinhtrangDuan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dm_tinhtrang_duan';
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
            'ten' => 'Tên tình trạng dự án',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[DuAns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDuAns()
    {
        return $this->hasMany(DuAn::class, ['tinhtrangduan_id' => 'id']);
    }
}

<?php

namespace app\modules\danhmuc\models;

use Yii;

/**
 * This is the model class for table "dm_hatang_xahoi".
 *
 * @property int $id
 * @property string|null $ten Tên danh mục hạ tầng xã hội
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property DuAn[] $duAns
 */
class DmHatangXahoi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dm_hatang_xahoi';
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
            'ten' => 'Tên danh mục hạ tầng xã hội',
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
        return $this->hasMany(DuAn::class, ['hatangxahoi_id' => 'id']);
    }
}

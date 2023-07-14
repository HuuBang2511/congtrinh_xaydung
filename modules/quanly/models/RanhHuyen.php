<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "ranh_huyen".
 *
 * @property int $gid
 * @property string|null $tenhuyen
 * @property string|null $mahuyen
 * @property float|null $shape_long
 * @property float|null $shape_area
 * @property string|null $geom
 *
 * @property CongTrinh[] $congTrinhs
 * @property DuAn[] $duAns
 */
class RanhHuyen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ranh_huyen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['mahuyen', 'geom'], 'string'],
            [['shape_long', 'shape_area'], 'number'],
            [['tenhuyen'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'tenhuyen' => 'Tenhuyen',
            'mahuyen' => 'Mahuyen',
            'shape_long' => 'Shape Long',
            'shape_area' => 'Shape Area',
            'geom' => 'Geom',
        ];
    }

    /**
     * Gets query for [[CongTrinhs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongTrinhs()
    {
        return $this->hasMany(CongTrinh::class, ['huyen_id' => 'gid']);
    }

    /**
     * Gets query for [[DuAns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDuAns()
    {
        return $this->hasMany(DuAn::class, ['huyen_id' => 'gid']);
    }
}

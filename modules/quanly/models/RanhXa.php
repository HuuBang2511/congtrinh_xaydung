<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "ranh_xa".
 *
 * @property int $gid
 * @property string|null $tenxa
 * @property string|null $maxa
 * @property float|null $shape_leng
 * @property float|null $shape-area
 * @property string|null $geom
 *
 * @property CongTrinh[] $congTrinhs
 * @property DuAn[] $duAns
 */
class RanhXa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ranh_xa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shape_leng', 'shape-area'], 'number'],
            [['geom'], 'string'],
            [['tenxa'], 'string', 'max' => 200],
            [['maxa'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gid' => 'Gid',
            'tenxa' => 'Tenxa',
            'maxa' => 'Maxa',
            'shape_leng' => 'Shape Leng',
            'shape-area' => 'Shape Area',
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
        return $this->hasMany(CongTrinh::class, ['xa_id' => 'gid']);
    }

    /**
     * Gets query for [[DuAns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDuAns()
    {
        return $this->hasMany(DuAn::class, ['xa_id' => 'gid']);
    }
}

<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "congtrinh_lichsu_thaydoi".
 *
 * @property int $id
 * @property string|null $ngay_thaydoi
 * @property int|null $congtrinh_id
 *
 * @property CongTrinh $congtrinh
 */
class CongtrinhLichsuThaydoi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congtrinh_lichsu_thaydoi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ngay_thaydoi'], 'safe'],
            [['congtrinh_id'], 'default', 'value' => null],
            [['congtrinh_id'], 'integer'],
            [['congtrinh_id'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['congtrinh_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ngay_thaydoi' => 'Ngay Thaydoi',
            'congtrinh_id' => 'Congtrinh ID',
        ];
    }

    /**
     * Gets query for [[Congtrinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongtrinh()
    {
        return $this->hasOne(CongTrinh::class, ['id' => 'congtrinh_id']);
    }
}

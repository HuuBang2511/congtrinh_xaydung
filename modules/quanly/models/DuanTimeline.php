<?php

namespace app\modules\quanly\models;

use Yii;

/**
 * This is the model class for table "duan_timeline".
 *
 * @property int $id
 * @property string|null $so_giayphep Số giấy phép
 * @property string|null $ngay_cap Ngày cấp
 * @property int|null $duan_id Dự án
 * @property int|null $loaigiayphep_id Loại giấy phép
 * @property int|null $tinhtranggiayphep_id Tình trạng giấy phép
 * @property string|null $ly_do Lý do
 * @property string|null $thoi_han Thời hạn
 * @property int|null $donvicapphep_id Đơn vị cấp phép
 *
 * @property DonviCapphep $donvicapphep
 * @property DuAn $duan
 * @property DmLoaigiayphep $loaigiayphep
 * @property DmTinhtrangGiayphep $tinhtranggiayphep
 */
class DuanTimeline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'duan_timeline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ngay_cap', 'thoi_han'], 'safe'],
            [['duan_id', 'loaigiayphep_id', 'tinhtranggiayphep_id', 'donvicapphep_id'], 'default', 'value' => null],
            [['duan_id', 'loaigiayphep_id', 'tinhtranggiayphep_id', 'donvicapphep_id'], 'integer'],
            [['ly_do'], 'string'],
            [['so_giayphep'], 'string', 'max' => 100],
            [['loaigiayphep_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmLoaigiayphep::class, 'targetAttribute' => ['loaigiayphep_id' => 'id']],
            [['tinhtranggiayphep_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmTinhtrangGiayphep::class, 'targetAttribute' => ['tinhtranggiayphep_id' => 'id']],
            [['donvicapphep_id'], 'exist', 'skipOnError' => true, 'targetClass' => DonviCapphep::class, 'targetAttribute' => ['donvicapphep_id' => 'id']],
            [['duan_id'], 'exist', 'skipOnError' => true, 'targetClass' => DuAn::class, 'targetAttribute' => ['duan_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'so_giayphep' => 'Số giấy phép',
            'ngay_cap' => 'Ngày cấp',
            'duan_id' => 'Dự án',
            'loaigiayphep_id' => 'Loại giấy phép',
            'tinhtranggiayphep_id' => 'Tình trạng giấy phép',
            'ly_do' => 'Lý do',
            'thoi_han' => 'Thời hạn',
            'donvicapphep_id' => 'Đơn vị cấp phép',
        ];
    }

    /**
     * Gets query for [[Donvicapphep]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonvicapphep()
    {
        return $this->hasOne(DonviCapphep::class, ['id' => 'donvicapphep_id']);
    }

    /**
     * Gets query for [[Duan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDuan()
    {
        return $this->hasOne(DuAn::class, ['id' => 'duan_id']);
    }

    /**
     * Gets query for [[Loaigiayphep]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoaigiayphep()
    {
        return $this->hasOne(DmLoaigiayphep::class, ['id' => 'loaigiayphep_id']);
    }

    /**
     * Gets query for [[Tinhtranggiayphep]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTinhtranggiayphep()
    {
        return $this->hasOne(DmTinhtrangGiayphep::class, ['id' => 'tinhtranggiayphep_id']);
    }
}

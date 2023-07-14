<?php

namespace app\modules\quanly\models;
use app\modules\quanly\models\CongTrinh;
use app\modules\danhmuc\models\DmLoaigiayphep;
use app\modules\danhmuc\models\DmTinhtrangGiayphep;
use app\modules\quanly\models\DonviCapphep;
use app\modules\base\BaseModel;

use Yii;

/**
 * This is the model class for table "congtrinh_timeline".
 *
 * @property int $id
 * @property string|null $so_giayphep Số giấy phép
 * @property string|null $ngay_cap Ngày cấp
 * @property int|null $congtrinh_id
 * @property int|null $loaigiayphep_id
 * @property int|null $tinhtranggiayphep_id
 * @property string|null $ly_do Lý do
 * @property string|null $thoi_han
 * @property int|null $donvicapphep_id
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property CongTrinh $congtrinh
 * @property DonviCapphep $donvicapphep
 * @property DmLoaigiayphep $loaigiayphep
 * @property DmTinhtrangGiayphep $tinhtranggiayphep
 */
class CongtrinhTimeline extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congtrinh_timeline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ngay_cap', 'thoi_han', 'created_at', 'updated_at'], 'safe'],
            [['congtrinh_id', 'loaigiayphep_id', 'tinhtranggiayphep_id', 'donvicapphep_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['congtrinh_id', 'loaigiayphep_id', 'tinhtranggiayphep_id', 'donvicapphep_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['so_giayphep'], 'string', 'max' => 200],
            [['ly_do'], 'string', 'max' => 300],
            [['congtrinh_id'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['congtrinh_id' => 'id']],
            [['loaigiayphep_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmLoaigiayphep::class, 'targetAttribute' => ['loaigiayphep_id' => 'id']],
            [['tinhtranggiayphep_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmTinhtrangGiayphep::class, 'targetAttribute' => ['tinhtranggiayphep_id' => 'id']],
            [['donvicapphep_id'], 'exist', 'skipOnError' => true, 'targetClass' => DonviCapphep::class, 'targetAttribute' => ['donvicapphep_id' => 'id']],
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
            'congtrinh_id' => 'Congtrinh ID',
            'loaigiayphep_id' => 'Loaigiayphep ID',
            'tinhtranggiayphep_id' => 'Tinhtranggiayphep ID',
            'ly_do' => 'Lý do',
            'thoi_han' => 'Thoi Han',
            'donvicapphep_id' => 'Donvicapphep ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
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

<?php

namespace app\modules\quanly\models;
use app\modules\danhmuc\models\DmTinhtrangDuan;
use app\modules\danhmuc\models\DmHatangXahoi;
use app\modules\quanly\models\RanhHuyen;
use app\modules\quanly\models\RanhXa;
use app\modules\quanly\models\ChuDauTu;
use app\modules\base\BaseModel;
use Yii;

/**
 * This is the model class for table "du_an".
 *
 * @property int $id
 * @property string|null $ten Tên dự án 
 * @property string|null $so_to Số tờ
 * @property string|null $so_thua Số thửa
 * @property int|null $xa_id Xã
 * @property int|null $huyen_id Huyện
 * @property string|null $khu_vuc Khu vực
 * @property string|null $quyetdinh_giaodat Quyết định giao đất
 * @property string|null $ngay_giao Ngày giao
 * @property int|null $tinhtrangduan_id Tình trạng dự án 
 * @property string|null $dia_diem Địa điểm
 * @property int|null $chudautu_id Chủ đầu tư
 * @property string|null $phaply_quyhoach Pháp lsy quy hoạch
 * @property float|null $quymo_dientich Quy mô diện tích
 * @property string|null $quymo_danso Quy mô dân số
 * @property bool|null $bangiao_hatang_kythuat Tình hình ban giao hạ tầng kỹ thuật
 * @property bool|null $bangiao_hatang_xahoi Tình hình bàn giao hạ tầng xã hội
 * @property float|null $hientrang_dautu_hiennay Hiện trạng đầu tư hiện nay
 * @property float|null $tile_boithuong Tỉ lệ bồi thường
 * @property float|null $nha_o Nhà ở
 * @property float|null $hatang_kythuat Hạ tầng kỹ thuật
 * @property float|null $cong_vien Công viên
 * @property string|null $dinhhuong_quanly Định hướng quản lý
 * @property string|null $khokhan_vuongmac Khó khăn vướng mắc
 * @property string|null $dexuat_kiennghi Đề xuất kiến nghị
 * @property string|null $geo_x
 * @property string|null $geo_y
 * @property string|null $geom
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $hatang_xahoi
 *
 * @property ChuDauTu $chudautu
 * @property DuanTimeline[] $duanTimelines
 * @property RanhHuyen $huyen
 * @property DmTinhtrangDuan $tinhtrangduan
 * @property RanhXa $xa
 */
class DuAn extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'du_an';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['xa_id', 'huyen_id', 'tinhtrangduan_id', 'chudautu_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['xa_id', 'huyen_id', 'tinhtrangduan_id', 'chudautu_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['ngay_giao', 'created_at', 'updated_at'], 'safe'],
            [['phaply_quyhoach', 'dinhhuong_quanly', 'khokhan_vuongmac', 'dexuat_kiennghi', 'geom', 'hatang_xahoi'], 'string'],
            [['quymo_dientich', 'hientrang_dautu_hiennay', 'tile_boithuong', 'nha_o', 'hatang_kythuat', 'cong_vien'], 'number'],
            [['bangiao_hatang_kythuat', 'bangiao_hatang_xahoi'], 'boolean'],
            [['ten', 'dia_diem'], 'string', 'max' => 300],
            [['so_to', 'so_thua', 'khu_vuc', 'quyetdinh_giaodat'], 'string', 'max' => 200],
            [['quymo_danso', 'geo_x', 'geo_y'], 'string', 'max' => 50],
            [['chudautu_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChuDauTu::class, 'targetAttribute' => ['chudautu_id' => 'id']],
            [['tinhtrangduan_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmTinhtrangDuan::class, 'targetAttribute' => ['tinhtrangduan_id' => 'id']],
            [['huyen_id'], 'exist', 'skipOnError' => true, 'targetClass' => RanhHuyen::class, 'targetAttribute' => ['huyen_id' => 'gid']],
            [['xa_id'], 'exist', 'skipOnError' => true, 'targetClass' => RanhXa::class, 'targetAttribute' => ['xa_id' => 'gid']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ten' => 'Tên dự án ',
            'so_to' => 'Số tờ',
            'so_thua' => 'Số thửa',
            'xa_id' => 'Xã',
            'huyen_id' => 'Huyện',
            'khu_vuc' => 'Khu vực',
            'quyetdinh_giaodat' => 'Quyết định giao đất',
            'ngay_giao' => 'Ngày giao',
            'tinhtrangduan_id' => 'Tình trạng dự án ',
            'dia_diem' => 'Địa điểm',
            'chudautu_id' => 'Chủ đầu tư',
            'phaply_quyhoach' => 'Pháp lsy quy hoạch',
            'quymo_dientich' => 'Quy mô diện tích',
            'quymo_danso' => 'Quy mô dân số',
            'bangiao_hatang_kythuat' => 'Tình hình ban giao hạ tầng kỹ thuật',
            'bangiao_hatang_xahoi' => 'Tình hình bàn giao hạ tầng xã hội',
            'hientrang_dautu_hiennay' => 'Hiện trạng đầu tư hiện nay',
            'tile_boithuong' => 'Tỉ lệ bồi thường',
            'nha_o' => 'Nhà ở',
            'hatang_kythuat' => 'Hạ tầng kỹ thuật',
            'cong_vien' => 'Công viên',
            'dinhhuong_quanly' => 'Định hướng quản lý',
            'khokhan_vuongmac' => 'Khó khăn vướng mắc',
            'dexuat_kiennghi' => 'Đề xuất kiến nghị',
            'geo_x' => 'Geo X',
            'geo_y' => 'Geo Y',
            'geom' => 'Geom',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'hatang_xahoi' => 'Hạ tầng xã hội',
        ];
    }

    /**
     * Gets query for [[Chudautu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChudautu()
    {
        return $this->hasOne(ChuDauTu::class, ['id' => 'chudautu_id']);
    }

    /**
     * Gets query for [[DuanTimelines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDuanTimelines()
    {
        return $this->hasMany(DuanTimeline::class, ['duan_id' => 'id']);
    }

    /**
     * Gets query for [[Huyen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHuyen()
    {
        return $this->hasOne(RanhHuyen::class, ['gid' => 'huyen_id']);
    }

    /**
     * Gets query for [[Tinhtrangduan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTinhtrangduan()
    {
        return $this->hasOne(DmTinhtrangDuan::class, ['id' => 'tinhtrangduan_id']);
    }

    /**
     * Gets query for [[Xa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getXa()
    {
        return $this->hasOne(RanhXa::class, ['gid' => 'xa_id']);
    }
}

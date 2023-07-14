<?php

namespace app\modules\quanly\models;

use app\modules\quanly\models\ChuDauTu;
use app\modules\quanly\models\CoquanThamdinh;
use app\modules\quanly\models\DonviPheduyet;
use app\modules\quanly\models\RanhHuyen;
use app\modules\quanly\models\RanhXa;
use app\modules\danhmuc\models\DmLoaidat;
use app\modules\danhmuc\models\DmTinhtrangCongtrinh;
use app\modules\danhmuc\models\DmLoaicongtrinh;
use app\modules\base\BaseModel;

use Yii;

/**
 * This is the model class for table "congtrinh_thaydoi".
 *
 * @property string|null $so_biennhan_hoso
 * @property string|null $ma
 * @property string|null $ten
 * @property string|null $so_to
 * @property string|null $so_thua
 * @property float|null $chieu_dai
 * @property float|null $chieu_rong
 * @property string|null $ten_duong
 * @property string|null $donvi_cungcap_thongtin
 * @property string|null $donvi_quanly
 * @property int|null $chudautu_id
 * @property string|null $so_giayphep_pheduyet
 * @property string|null $ngay_cap
 * @property string|null $donvi_thicong
 * @property string|null $donvi_tuvan
 * @property string|null $mota_diadiem
 * @property float|null $tong_dientich_san
 * @property float|null $so_tang
 * @property int|null $loaicongtrinh_id
 * @property string|null $cap_congtrinh
 * @property string|null $totrinh_thamdinh
 * @property string|null $totrinh_pheduyet
 * @property string|null $giayphep_pccc
 * @property string|null $tien_do
 * @property bool|null $da_kiemtra
 * @property bool|null $tung_vipham
 * @property string|null $khacphuc_vipham
 * @property string|null $chigioi_duongbo
 * @property string|null $matdo_xaydung
 * @property string|null $ketcau_congtrinh
 * @property float|null $ban_cong
 * @property float|null $chieucao_mai
 * @property int|null $loaidat_id
 * @property int|null $donvipheduyet_id
 * @property int|null $coquanthamdinh_id
 * @property string|null $heso_sudung_dat
 * @property float|null $dientich_hienhuu
 * @property float|null $chieucao_thongtang
 * @property string|null $mucdich_sudung
 * @property float|null $sotang_ngam
 * @property string|null $congdung_tangngam
 * @property string|null $sudung_thangmay
 * @property string|null $thongtin_banve_kientruc
 * @property int|null $xa_id
 * @property int|null $huyen_id
 * @property int|null $tinhtrangcongtrinh_id
 * @property string|null $geo_x
 * @property string|null $geo_y
 * @property string|null $geom
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property bool|null $mai_nha
 * @property int|null $congtrinh_id
 * @property int $id
 *
 * @property ChuDauTu $chudautu
 * @property CongTrinh $congtrinh
 * @property CoquanThamdinh $coquanthamdinh
 * @property DonviPheduyet $donvipheduyet
 * @property RanhHuyen $huyen
 * @property DmLoaicongtrinh $loaicongtrinh
 * @property DmLoaidat $loaidat
 * @property DmTinhtrangCongtrinh $tinhtrangcongtrinh
 * @property RanhXa $xa
 */
class CongtrinhThaydoi extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'congtrinh_thaydoi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chieu_dai', 'chieu_rong', 'tong_dientich_san', 'so_tang', 'ban_cong', 'chieucao_mai', 'dientich_hienhuu', 'chieucao_thongtang', 'sotang_ngam'], 'number'],
            [['chudautu_id', 'loaicongtrinh_id', 'loaidat_id', 'donvipheduyet_id', 'coquanthamdinh_id', 'xa_id', 'huyen_id', 'tinhtrangcongtrinh_id', 'status', 'created_by', 'updated_by', 'congtrinh_id'], 'default', 'value' => null],
            [['chudautu_id', 'loaicongtrinh_id', 'loaidat_id', 'donvipheduyet_id', 'coquanthamdinh_id', 'xa_id', 'huyen_id', 'tinhtrangcongtrinh_id', 'status', 'created_by', 'updated_by', 'congtrinh_id'], 'integer'],
            [['ngay_cap', 'created_at', 'updated_at'], 'safe'],
            [['mota_diadiem', 'mucdich_sudung', 'congdung_tangngam', 'thongtin_banve_kientruc', 'geom'], 'string'],
            [['da_kiemtra', 'tung_vipham', 'mai_nha'], 'boolean'],
            [['so_biennhan_hoso', 'ma', 'so_giayphep_pheduyet'], 'string', 'max' => 100],
            [['ten', 'so_to', 'so_thua', 'ten_duong', 'totrinh_thamdinh', 'totrinh_pheduyet', 'giayphep_pccc', 'tien_do', 'khacphuc_vipham', 'chigioi_duongbo', 'matdo_xaydung', 'ketcau_congtrinh', 'heso_sudung_dat', 'sudung_thangmay'], 'string', 'max' => 200],
            [['donvi_cungcap_thongtin', 'donvi_quanly', 'donvi_thicong', 'donvi_tuvan', 'cap_congtrinh'], 'string', 'max' => 300],
            [['geo_x', 'geo_y'], 'string', 'max' => 50],
            [['chudautu_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChuDauTu::class, 'targetAttribute' => ['chudautu_id' => 'id']],
            [['congtrinh_id'], 'exist', 'skipOnError' => true, 'targetClass' => CongTrinh::class, 'targetAttribute' => ['congtrinh_id' => 'id']],
            [['coquanthamdinh_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoquanThamdinh::class, 'targetAttribute' => ['coquanthamdinh_id' => 'id']],
            [['loaicongtrinh_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmLoaicongtrinh::class, 'targetAttribute' => ['loaicongtrinh_id' => 'id']],
            [['loaidat_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmLoaidat::class, 'targetAttribute' => ['loaidat_id' => 'id']],
            [['tinhtrangcongtrinh_id'], 'exist', 'skipOnError' => true, 'targetClass' => DmTinhtrangCongtrinh::class, 'targetAttribute' => ['tinhtrangcongtrinh_id' => 'id']],
            [['donvipheduyet_id'], 'exist', 'skipOnError' => true, 'targetClass' => DonviPheduyet::class, 'targetAttribute' => ['donvipheduyet_id' => 'id']],
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
            'so_biennhan_hoso' => 'Số biên nhận hồ sơ',
            'ma' => 'Mã công trình',
            'ten' => 'Tên công trình',
            'so_to' => 'Số tờ',
            'so_thua' => 'Số thửa',
            'chieu_dai' => 'Chiều dài',
            'chieu_rong' => 'Chiều rộng',
            'ten_duong' => 'Tên đường',
            'donvi_cungcap_thongtin' => 'Đơn vị cung cấp thông tin',
            'donvi_quanly' => 'Đơn vị quản lý',
            'chudautu_id' => 'Chủ đầu tư',
            'so_giayphep_pheduyet' => 'Số giấy phép phê duyệt',
            'ngay_cap' => 'Ngày cấp',
            'donvi_thicong' => 'Đơn vị thi công',
            'donvi_tuvan' => 'Đơn vị tư vấn',
            'mota_diadiem' => 'Mô tả địa điểm',
            'tong_dientich_san' => 'Tổng diện tích sàn',
            'so_tang' => 'Số tầng',
            'loaicongtrinh_id' => 'Loại công trình',
            'cap_congtrinh' => 'Cấp công trình',
            'totrinh_thamdinh' => 'Tờ trình thẩm định',
            'totrinh_pheduyet' => 'Tờ trình phê duyệt',
            'giayphep_pccc' => 'Giấy phép PCCC',
            'tien_do' => 'Tiến độ',
            'da_kiemtra' => 'Đã kiểm tra',
            'tung_vipham' => 'Từng vi phạm',
            'khacphuc_vipham' => 'Đã khắc phục vi phạm',
            'chigioi_duongbo' => 'Chỉ giới đường bộ',
            'matdo_xaydung' => 'Mật độ xây dựng',
            'ketcau_congtrinh' => 'Kết cấu công trình',
            'ban_cong' => 'Diện tích ban công',
            'chieucao_mai' => 'Chiều cao mái',
            'loaidat_id' => 'Loại đất',
            'donvipheduyet_id' => 'Đơn vị phê duyệt',
            'coquanthamdinh_id' => 'Cơ quan thẩm định',
            'heso_sudung_dat' => 'Hệ số sử dụng đất',
            'dientich_hienhuu' => 'Diện tích hiện hữu',
            'chieucao_thongtang' => 'Chiều cao thông tầng',
            'mucdich_sudung' => 'Mục đích sử dụng',
            'sotang_ngam' => 'Số tầng ngầm',
            'congdung_tangngam' => 'Công dụng tầng ngầm',
            'sudung_thangmay' => 'Sử dụng thang máy',
            'thongtin_banve_kientruc' => 'Thông tin bản vẻ kiến trúc',
            'xa_id' => 'Xã',
            'huyen_id' => 'Huyện',
            'tinhtrangcongtrinh_id' => 'Tình trạng công trình',
            'geo_x' => 'Geo X',
            'geo_y' => 'Geo Y',
            'geom' => 'Vị trí',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'mai_nha' => 'Mái nhà',
            'congtrinh_id' => 'Công trình',
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
     * Gets query for [[Congtrinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongtrinh()
    {
        return $this->hasOne(CongTrinh::class, ['id' => 'congtrinh_id']);
    }

    /**
     * Gets query for [[Coquanthamdinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoquanthamdinh()
    {
        return $this->hasOne(CoquanThamdinh::class, ['id' => 'coquanthamdinh_id']);
    }

    /**
     * Gets query for [[Donvipheduyet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDonvipheduyet()
    {
        return $this->hasOne(DonviPheduyet::class, ['id' => 'donvipheduyet_id']);
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
     * Gets query for [[Loaicongtrinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoaicongtrinh()
    {
        return $this->hasOne(DmLoaicongtrinh::class, ['id' => 'loaicongtrinh_id']);
    }

    /**
     * Gets query for [[Loaidat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLoaidat()
    {
        return $this->hasOne(DmLoaidat::class, ['id' => 'loaidat_id']);
    }

    /**
     * Gets query for [[Tinhtrangcongtrinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTinhtrangcongtrinh()
    {
        return $this->hasOne(DmTinhtrangCongtrinh::class, ['id' => 'tinhtrangcongtrinh_id']);
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

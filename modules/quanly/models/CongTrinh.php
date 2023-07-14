<?php

namespace app\modules\quanly\models;

use Yii;

use app\modules\quanly\models\ChuDauTu;
use app\modules\quanly\models\CoquanThamdinh;
use app\modules\quanly\models\DonviPheduyet;
use app\modules\quanly\models\RanhHuyen;
use app\modules\quanly\models\RanhXa;
use app\modules\danhmuc\models\DmLoaidat;
use app\modules\danhmuc\models\DmTinhtrangCongtrinh;
use app\modules\danhmuc\models\DmLoaicongtrinh;
use app\modules\base\BaseModel;


/**
 * This is the model class for table "cong_trinh".
 *
 * @property int $id
 * @property string|null $so_biennhan_hoso Số biên nhận hồ sơ
 * @property string|null $ma Mã công trình
 * @property string|null $ten Tên công trình
 * @property string|null $so_to Số tờ
 * @property string|null $so_thua Số thửa
 * @property float|null $chieu_dai
 * @property float|null $chieu_rong
 * @property string|null $ten_duong Tên đường
 * @property string|null $donvi_cungcap_thongtin Đơn vị cung cấp thông tin
 * @property string|null $donvi_quanly Đơn vị quản lý
 * @property int|null $chudautu_id
 * @property string|null $so_giayphep_pheduyet Số giấy phép phê duyệt
 * @property string|null $ngay_cap Ngày cấp
 * @property string|null $donvi_thicong Đơnv vị thi công
 * @property string|null $donvi_tuvan Đơn vị tư vấn
 * @property string|null $mota_diadiem Mô tả địa điểm
 * @property float|null $tong_dientich_san Tổng diện tích sàn
 * @property float|null $so_tang Số tầng
 * @property int|null $loaicongtrinh_id Loại công trình
 * @property string|null $cap_congtrinh Cấp công trình
 * @property string|null $totrinh_thamdinh Tờ trình thẩm định
 * @property string|null $totrinh_pheduyet Tờ trình phê duyệt
 * @property string|null $giayphep_pccc Giấy phép PCCC
 * @property string|null $tien_do Tiến độ
 * @property bool|null $da_kiemtra Đã kiểm tra
 * @property bool|null $tung_vipham Đã từng vi phạm
 * @property string|null $khacphuc_vipham Đã khác phục vi phạm
 * @property string|null $chigioi_duongbo Chỉ giới đường bộ
 * @property string|null $matdo_xaydung Mật độ xây dựng
 * @property string|null $ketcau_congtrinh Kết cấu công trình
 * @property float|null $ban_cong Ban công
 * @property float|null $mai_nha Mái nhà
 * @property float|null $chieucao_mai Chiều cao mái
 * @property int|null $loaidat_id Loại đất
 * @property int|null $donvipheduyet_id Đơn vị phê duyệt
 * @property int|null $coquanthamdinh_id Cơ quan thẩm định 
 * @property string|null $heso_sudung_dat Hệ số sử dụng đất
 * @property float|null $dientich_hienhuu Diện tích hiện hữu
 * @property float|null $chieucao_thongtang
 * @property string|null $mucdich_sudung Mục đích sử dụng
 * @property float|null $sotang_ngam Số tâng ngầm
 * @property string|null $congdung_tangngam Công dụng tầng ngầm
 * @property string|null $sudung_thangmay Sử dụng thang máy
 * @property string|null $thongtin_banve_kientruc Thông tin bản vẽ kiến trúc
 * @property int|null $xa_id Xã
 * @property int|null $huyen_id Huyện
 * @property int|null $tinhtrangcongtrinh_id Tình trạng công trình
 * @property string|null $geo_x
 * @property string|null $geo_y
 * @property string|null $geom
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property ChuDauTu $chudautu
 * @property CongtrinhTimeline[] $congtrinhTimelines
 * @property CoquanThamdinh $coquanthamdinh
 * @property DonviPheduyet $donvipheduyet
 * @property RanhHuyen $huyen
 * @property DmLoaicongtrinh $loaicongtrinh
 * @property DmLoaidat $loaidat
 * @property DmTinhtrangCongtrinh $tinhtrangcongtrinh
 * @property RanhXa $xa
 */
class CongTrinh extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cong_trinh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['chieu_dai', 'chieu_rong', 'tong_dientich_san', 'so_tang', 'ban_cong', 'chieucao_mai', 'dientich_hienhuu', 'chieucao_thongtang', 'sotang_ngam'], 'number'],
            [['chudautu_id', 'loaicongtrinh_id', 'loaidat_id', 'donvipheduyet_id', 'coquanthamdinh_id', 'xa_id', 'huyen_id', 'tinhtrangcongtrinh_id', 'status', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['chudautu_id', 'loaicongtrinh_id', 'loaidat_id', 'donvipheduyet_id', 'coquanthamdinh_id', 'xa_id', 'huyen_id', 'tinhtrangcongtrinh_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['ngay_cap', 'created_at', 'updated_at'], 'safe'],
            [['mota_diadiem', 'mucdich_sudung', 'congdung_tangngam', 'geom', 'thongtin_banve_kientruc'], 'string'],
            [['da_kiemtra', 'tung_vipham', 'mai_nha'], 'boolean'],
            [['so_biennhan_hoso', 'ma', 'so_giayphep_pheduyet'], 'string', 'max' => 100],
            [['ten', 'so_to', 'so_thua', 'ten_duong', 'totrinh_thamdinh', 'totrinh_pheduyet', 'giayphep_pccc', 'tien_do', 'khacphuc_vipham', 'chigioi_duongbo', 'matdo_xaydung', 'ketcau_congtrinh', 'heso_sudung_dat', 'sudung_thangmay'], 'string', 'max' => 200],
            [['donvi_cungcap_thongtin', 'donvi_quanly', 'donvi_thicong', 'donvi_tuvan', 'cap_congtrinh'], 'string', 'max' => 300],
            [['geo_x', 'geo_y'], 'string', 'max' => 50],
            [['chudautu_id'], 'exist', 'skipOnError' => true, 'targetClass' => ChuDauTu::class, 'targetAttribute' => ['chudautu_id' => 'id']],
            [['coquanthamdinh_id'], 'exist', 'skipOnError' => true, 'targetClass' => CoquanThamdinh::class, 'targetAttribute' => ['coquanthamdinh_id' => 'id ']],
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
            'so_biennhan_hoso' => 'Số hồ sơ biên nhận',
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
            'donvi_thicong' => 'Đơn vi thi công',
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
            'khacphuc_vipham' => 'Đã khắc phục vi phạm ',
            'chigioi_duongbo' => 'Chỉ giới đường bộ',
            'matdo_xaydung' => 'Mật độ xây dựng',
            'ketcau_congtrinh' => 'Kêt cấu công trình',
            'ban_cong' => 'Diện tích ban công',
            'mai_nha' => 'Mái nhà',
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
            'sudung_thangmay' => 'Sủ dụng thang máy',
            'thongtin_banve_kientruc' => 'Thông tin bản vẽ kiến trúc',
            'xa_id' => 'Xã',
            'huyen_id' => 'Huyện',
            'tinhtrangcongtrinh_id' => 'Tình trạng công trình',
            'geo_x' => 'Geo X',
            'geo_y' => 'Geo Y',
            'geom' => 'Tọa độ không gian',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
     * Gets query for [[CongtrinhTimelines]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCongtrinhTimelines()
    {
        return $this->hasMany(CongtrinhTimeline::class, ['congtrinh_id' => 'id']);
    }

    /**
     * Gets query for [[Coquanthamdinh]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCoquanthamdinh()
    {
        return $this->hasOne(CoquanThamdinh::class, ['id ' => 'coquanthamdinh_id']);
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

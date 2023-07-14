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
 * This is the model class for table "duan_thaydoi".
 *
 * @property string|null $ten
 * @property string|null $so_to
 * @property string|null $so_thua
 * @property int|null $xa_id
 * @property int|null $huyen_id
 * @property string|null $khu_vuc
 * @property string|null $quyetdinh_giaodat
 * @property string|null $ngay_giao
 * @property int|null $tinhtrangduan_id
 * @property string|null $dia_diem
 * @property int|null $chudautu_id
 * @property string|null $phaply_quyhoach
 * @property float|null $quymo_dientich
 * @property string|null $quymo_danso
 * @property bool|null $bangiao_hatang_kythuat
 * @property bool|null $bangiao_hatang_xahoi
 * @property float|null $hientrang_dautu_hiennay
 * @property float|null $tile_boithuong
 * @property float|null $nha_o
 * @property float|null $hatang_kythuat
 * @property float|null $cong_vien
 * @property string|null $dinhhuong_quanly
 * @property string|null $khokhan_vuongmac
 * @property string|null $dexuat_kiennghi
 * @property string|null $geo_x
 * @property string|null $geo_y
 * @property string|null $geom
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $hatang_xahoi
 * @property int|null $duan_id
 * @property int $id
 */
class DuanThaydoi extends BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'duan_thaydoi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['xa_id', 'huyen_id', 'tinhtrangduan_id', 'chudautu_id', 'status', 'created_by', 'updated_by', 'duan_id'], 'default', 'value' => null],
            [['xa_id', 'huyen_id', 'tinhtrangduan_id', 'chudautu_id', 'status', 'created_by', 'updated_by', 'duan_id'], 'integer'],
            [['ngay_giao', 'created_at', 'updated_at'], 'safe'],
            [['phaply_quyhoach', 'dinhhuong_quanly', 'khokhan_vuongmac', 'dexuat_kiennghi', 'geom', 'hatang_xahoi'], 'string'],
            [['quymo_dientich', 'hientrang_dautu_hiennay', 'tile_boithuong', 'nha_o', 'hatang_kythuat', 'cong_vien'], 'number'],
            [['bangiao_hatang_kythuat', 'bangiao_hatang_xahoi'], 'boolean'],
            [['ten', 'dia_diem'], 'string', 'max' => 300],
            [['so_to', 'so_thua', 'khu_vuc', 'quyetdinh_giaodat'], 'string', 'max' => 200],
            [['quymo_danso', 'geo_x', 'geo_y'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ten' => 'Ten',
            'so_to' => 'So To',
            'so_thua' => 'So Thua',
            'xa_id' => 'Xa ID',
            'huyen_id' => 'Huyen ID',
            'khu_vuc' => 'Khu Vuc',
            'quyetdinh_giaodat' => 'Quyetdinh Giaodat',
            'ngay_giao' => 'Ngay Giao',
            'tinhtrangduan_id' => 'Tinhtrangduan ID',
            'dia_diem' => 'Dia Diem',
            'chudautu_id' => 'Chudautu ID',
            'phaply_quyhoach' => 'Phaply Quyhoach',
            'quymo_dientich' => 'Quymo Dientich',
            'quymo_danso' => 'Quymo Danso',
            'bangiao_hatang_kythuat' => 'Bangiao Hatang Kythuat',
            'bangiao_hatang_xahoi' => 'Bangiao Hatang Xahoi',
            'hientrang_dautu_hiennay' => 'Hientrang Dautu Hiennay',
            'tile_boithuong' => 'Tile Boithuong',
            'nha_o' => 'Nha O',
            'hatang_kythuat' => 'Hatang Kythuat',
            'cong_vien' => 'Cong Vien',
            'dinhhuong_quanly' => 'Dinhhuong Quanly',
            'khokhan_vuongmac' => 'Khokhan Vuongmac',
            'dexuat_kiennghi' => 'Dexuat Kiennghi',
            'geo_x' => 'Geo X',
            'geo_y' => 'Geo Y',
            'geom' => 'Geom',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'hatang_xahoi' => 'Hatang Xahoi',
            'duan_id' => 'Duan ID',
            'id' => 'ID',
        ];
    }
}

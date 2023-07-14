<?php

namespace app\modules\quanly\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\quanly\models\CongTrinh;

/**
 * CongTrinhSearch represents the model behind the search form about `app\modules\quanly\models\CongTrinh`.
 */
class CongTrinhSearch extends CongTrinh
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'chudautu_id', 'loaicongtrinh_id', 'loaidat_id', 'donvipheduyet_id', 'coquanthamdinh_id', 'xa_id', 'huyen_id', 'tinhtrangcongtrinh_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['so_biennhan_hoso', 'ma', 'ten', 'so_to', 'so_thua', 'ten_duong', 'donvi_cungcap_thongtin', 'donvi_quanly', 'so_giayphep_pheduyet', 'ngay_cap', 'donvi_thicong', 'donvi_tuvan', 'mota_diadiem', 'cap_congtrinh', 'totrinh_thamdinh', 'totrinh_pheduyet', 'giayphep_pccc', 'tien_do', 'khacphuc_vipham', 'chigioi_duongbo', 'matdo_xaydung', 'ketcau_congtrinh', 'heso_sudung_dat', 'mucdich_sudung', 'congdung_tangngam', 'sudung_thangmay', 'thongtin_banve_kientruc', 'geo_x', 'geo_y', 'geom', 'created_at', 'updated_at'], 'safe'],
            [['chieu_dai', 'chieu_rong', 'tong_dientich_san', 'so_tang', 'ban_cong', 'mai_nha', 'chieucao_mai', 'dientich_hienhuu', 'chieucao_thongtang', 'sotang_ngam'], 'number'],
            [['da_kiemtra', 'tung_vipham'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CongTrinh::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'chieu_dai' => $this->chieu_dai,
            'chieu_rong' => $this->chieu_rong,
            'chudautu_id' => $this->chudautu_id,
            'ngay_cap' => $this->ngay_cap,
            'tong_dientich_san' => $this->tong_dientich_san,
            'so_tang' => $this->so_tang,
            'loaicongtrinh_id' => $this->loaicongtrinh_id,
            'da_kiemtra' => $this->da_kiemtra,
            'tung_vipham' => $this->tung_vipham,
            'ban_cong' => $this->ban_cong,
            'mai_nha' => $this->mai_nha,
            'chieucao_mai' => $this->chieucao_mai,
            'loaidat_id' => $this->loaidat_id,
            'donvipheduyet_id' => $this->donvipheduyet_id,
            'coquanthamdinh_id' => $this->coquanthamdinh_id,
            'dientich_hienhuu' => $this->dientich_hienhuu,
            'chieucao_thongtang' => $this->chieucao_thongtang,
            'sotang_ngam' => $this->sotang_ngam,
            'xa_id' => $this->xa_id,
            'huyen_id' => $this->huyen_id,
            'tinhtrangcongtrinh_id' => $this->tinhtrangcongtrinh_id,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['ilike', 'so_biennhan_hoso', mb_strtoupper($this->so_biennhan_hoso)])
            ->andFilterWhere(['ilike', 'ma', mb_strtoupper($this->ma)])
            ->andFilterWhere(['ilike', 'ten', mb_strtoupper($this->ten)])
            ->andFilterWhere(['ilike', 'so_to', mb_strtoupper($this->so_to)])
            ->andFilterWhere(['ilike', 'so_thua', mb_strtoupper($this->so_thua)])
            ->andFilterWhere(['ilike', 'ten_duong', mb_strtoupper($this->ten_duong)])
            ->andFilterWhere(['ilike', 'donvi_cungcap_thongtin', mb_strtoupper($this->donvi_cungcap_thongtin)])
            ->andFilterWhere(['ilike', 'donvi_quanly', mb_strtoupper($this->donvi_quanly)])
            ->andFilterWhere(['ilike', 'so_giayphep_pheduyet', mb_strtoupper($this->so_giayphep_pheduyet)])
            ->andFilterWhere(['ilike', 'donvi_thicong', mb_strtoupper($this->donvi_thicong)])
            ->andFilterWhere(['ilike', 'donvi_tuvan', mb_strtoupper($this->donvi_tuvan)])
            ->andFilterWhere(['ilike', 'mota_diadiem', mb_strtoupper($this->mota_diadiem)])
            ->andFilterWhere(['ilike', 'cap_congtrinh', mb_strtoupper($this->cap_congtrinh)])
            ->andFilterWhere(['ilike', 'totrinh_thamdinh', mb_strtoupper($this->totrinh_thamdinh)])
            ->andFilterWhere(['ilike', 'totrinh_pheduyet', mb_strtoupper($this->totrinh_pheduyet)])
            ->andFilterWhere(['ilike', 'giayphep_pccc', mb_strtoupper($this->giayphep_pccc)])
            ->andFilterWhere(['ilike', 'tien_do', mb_strtoupper($this->tien_do)])
            ->andFilterWhere(['ilike', 'khacphuc_vipham', mb_strtoupper($this->khacphuc_vipham)])
            ->andFilterWhere(['ilike', 'chigioi_duongbo', mb_strtoupper($this->chigioi_duongbo)])
            ->andFilterWhere(['ilike', 'matdo_xaydung', mb_strtoupper($this->matdo_xaydung)])
            ->andFilterWhere(['ilike', 'ketcau_congtrinh', mb_strtoupper($this->ketcau_congtrinh)])
            ->andFilterWhere(['ilike', 'heso_sudung_dat', mb_strtoupper($this->heso_sudung_dat)])
            ->andFilterWhere(['ilike', 'mucdich_sudung', mb_strtoupper($this->mucdich_sudung)])
            ->andFilterWhere(['ilike', 'congdung_tangngam', mb_strtoupper($this->congdung_tangngam)])
            ->andFilterWhere(['ilike', 'sudung_thangmay', mb_strtoupper($this->sudung_thangmay)])
            ->andFilterWhere(['ilike', 'thongtin_banve_kientruc', mb_strtoupper($this->thongtin_banve_kientruc)])
            ->andFilterWhere(['ilike', 'geo_x', mb_strtoupper($this->geo_x)])
            ->andFilterWhere(['ilike', 'geo_y', mb_strtoupper($this->geo_y)])
            ->andFilterWhere(['ilike', 'geom', mb_strtoupper($this->geom)]);

        return $dataProvider;
    }

    public function getExportColumns()
    {
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
            ],
            'id',
        'so_biennhan_hoso',
        'ma',
        'ten',
        'so_to',
        'so_thua',
        'chieu_dai',
        'chieu_rong',
        'ten_duong',
        'donvi_cungcap_thongtin',
        'donvi_quanly',
        'chudautu_id',
        'so_giayphep_pheduyet',
        'ngay_cap',
        'donvi_thicong',
        'donvi_tuvan',
        'mota_diadiem',
        'tong_dientich_san',
        'so_tang',
        'loaicongtrinh_id',
        'cap_congtrinh',
        'totrinh_thamdinh',
        'totrinh_pheduyet',
        'giayphep_pccc',
        'tien_do',
        'da_kiemtra',
        'tung_vipham',
        'khacphuc_vipham',
        'chigioi_duongbo',
        'matdo_xaydung',
        'ketcau_congtrinh',
        'ban_cong',
        'mai_nha',
        'chieucao_mai',
        'loaidat_id',
        'donvipheduyet_id',
        'coquanthamdinh_id',
        'heso_sudung_dat',
        'dientich_hienhuu',
        'chieucao_thongtang',
        'mucdich_sudung',
        'sotang_ngam',
        'congdung_tangngam',
        'sudung_thangmay',
        'thongtin_banve_kientruc',
        'xa_id',
        'huyen_id',
        'tinhtrangcongtrinh_id',
        'geo_x',
        'geo_y',
        'geom',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',        ];
    }
}

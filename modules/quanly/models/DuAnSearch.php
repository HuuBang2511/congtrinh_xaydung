<?php

namespace app\modules\quanly\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\quanly\models\DuAn;

/**
 * DuAnSearch represents the model behind the search form about `app\modules\quanly\models\DuAn`.
 */
class DuAnSearch extends DuAn
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'xa_id', 'huyen_id', 'tinhtrangduan_id', 'chudautu_id', 'status', 'created_by', 'updated_by'], 'integer'],
            [['ten', 'so_to', 'so_thua', 'khu_vuc', 'quyetdinh_giaodat', 'ngay_giao', 'dia_diem', 'phaply_quyhoach', 'quymo_danso', 'dinhhuong_quanly', 'khokhan_vuongmac', 'dexuat_kiennghi', 'geo_x', 'geo_y', 'geom', 'created_at', 'updated_at', 'hatang_xahoi'], 'safe'],
            [['quymo_dientich', 'hientrang_dautu_hiennay', 'tile_boithuong', 'nha_o', 'hatang_kythuat', 'cong_vien'], 'number'],
            [['bangiao_hatang_kythuat', 'bangiao_hatang_xahoi'], 'boolean'],
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
        $query = DuAn::find();

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
            'xa_id' => $this->xa_id,
            'huyen_id' => $this->huyen_id,
            'ngay_giao' => $this->ngay_giao,
            'tinhtrangduan_id' => $this->tinhtrangduan_id,
            'chudautu_id' => $this->chudautu_id,
            'quymo_dientich' => $this->quymo_dientich,
            'bangiao_hatang_kythuat' => $this->bangiao_hatang_kythuat,
            'bangiao_hatang_xahoi' => $this->bangiao_hatang_xahoi,
            'hientrang_dautu_hiennay' => $this->hientrang_dautu_hiennay,
            'tile_boithuong' => $this->tile_boithuong,
            'nha_o' => $this->nha_o,
            'hatang_kythuat' => $this->hatang_kythuat,
            'cong_vien' => $this->cong_vien,
            'status' => $this->status,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'upper(ten)', mb_strtoupper($this->ten)])
            ->andFilterWhere(['like', 'upper(so_to)', mb_strtoupper($this->so_to)])
            ->andFilterWhere(['like', 'upper(so_thua)', mb_strtoupper($this->so_thua)])
            ->andFilterWhere(['like', 'upper(khu_vuc)', mb_strtoupper($this->khu_vuc)])
            ->andFilterWhere(['like', 'upper(quyetdinh_giaodat)', mb_strtoupper($this->quyetdinh_giaodat)])
            ->andFilterWhere(['like', 'upper(dia_diem)', mb_strtoupper($this->dia_diem)])
            ->andFilterWhere(['like', 'upper(phaply_quyhoach)', mb_strtoupper($this->phaply_quyhoach)])
            ->andFilterWhere(['like', 'upper(quymo_danso)', mb_strtoupper($this->quymo_danso)])
            ->andFilterWhere(['like', 'upper(dinhhuong_quanly)', mb_strtoupper($this->dinhhuong_quanly)])
            ->andFilterWhere(['like', 'upper(khokhan_vuongmac)', mb_strtoupper($this->khokhan_vuongmac)])
            ->andFilterWhere(['like', 'upper(dexuat_kiennghi)', mb_strtoupper($this->dexuat_kiennghi)])
            ->andFilterWhere(['like', 'upper(geo_x)', mb_strtoupper($this->geo_x)])
            ->andFilterWhere(['like', 'upper(geo_y)', mb_strtoupper($this->geo_y)])
            ->andFilterWhere(['like', 'upper(geom)', mb_strtoupper($this->geom)])
            ->andFilterWhere(['like', 'upper(hatang_xahoi)', mb_strtoupper($this->hatang_xahoi)]);

        return $dataProvider;
    }

    public function getExportColumns()
    {
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
            ],
            'id',
        'ten',
        'so_to',
        'so_thua',
        'xa_id',
        'huyen_id',
        'khu_vuc',
        'quyetdinh_giaodat',
        'ngay_giao',
        'tinhtrangduan_id',
        'dia_diem',
        'chudautu_id',
        'phaply_quyhoach',
        'quymo_dientich',
        'quymo_danso',
        'bangiao_hatang_kythuat',
        'bangiao_hatang_xahoi',
        'hientrang_dautu_hiennay',
        'tile_boithuong',
        'nha_o',
        'hatang_kythuat',
        'cong_vien',
        'dinhhuong_quanly',
        'khokhan_vuongmac',
        'dexuat_kiennghi',
        'geo_x',
        'geo_y',
        'geom',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'hatang_xahoi',        ];
    }
}

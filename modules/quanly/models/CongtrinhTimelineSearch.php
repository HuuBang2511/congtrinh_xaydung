<?php

namespace app\modules\quanly\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\quanly\models\CongtrinhTimeline;

/**
 * CongtrinhTimelineSearch represents the model behind the search form about `app\modules\quanly\models\CongtrinhTimeline`.
 */
class CongtrinhTimelineSearch extends CongtrinhTimeline
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'congtrinh_id', 'loaigiayphep_id', 'tinhtranggiayphep_id', 'donvicapphep_id', 'status'], 'integer'],
            [['so_giayphep', 'ngay_cap', 'ly_do', 'thoi_han', 'created_at', 'updated_at'], 'safe'],
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
        $query = CongtrinhTimeline::find();

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
            'ngay_cap' => $this->ngay_cap,
            'congtrinh_id' => $this->congtrinh_id,
            'loaigiayphep_id' => $this->loaigiayphep_id,
            'tinhtranggiayphep_id' => $this->tinhtranggiayphep_id,
            'thoi_han' => $this->thoi_han,
            'donvicapphep_id' => $this->donvicapphep_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'upper(so_giayphep)', mb_strtoupper($this->so_giayphep)])
            ->andFilterWhere(['like', 'upper(ly_do)', mb_strtoupper($this->ly_do)]);

        return $dataProvider;
    }

    public function getExportColumns()
    {
        return [
            [
                'class' => 'kartik\grid\SerialColumn',
            ],
            'id',
        'so_giayphep',
        'ngay_cap',
        'congtrinh_id',
        'loaigiayphep_id',
        'tinhtranggiayphep_id',
        'ly_do',
        'thoi_han',
        'donvicapphep_id',
        'status',
        'created_at',
        'updated_at',        ];
    }
}

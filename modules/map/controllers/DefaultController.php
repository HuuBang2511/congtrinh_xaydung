<?php

namespace app\modules\map\controllers;

use app\modules\base\Config;
use app\modules\base\Constant;
use app\modules\danhmuc\models\DmLinhvuc;
use app\modules\danhmuc\models\DmPhuongxa;
use app\modules\danhmuc\models\Setting;
use app\modules\map\models\MapSearchForm;
use app\modules\quanly\models\DonViKinhTe;
use app\modules\quanly\models\VDonvikinhteMap;
use yii\caching\ExpressionDependency;
use yii\data\Pagination;
use yii\db\Query;
use yii\web\Controller;
use Yii;

/**
 * Default controller for the `map` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MapSearchForm();
        $settingPhamvi = Config::getSettingPhamvi();
        
        $tpBounds = \Yii::$app->cache->getOrSet(Constant::TP_BOUNDS, function () use ($settingPhamvi) {
            $maquan = json_decode($settingPhamvi)->maquan;
            return (new Query())->from('dm_quanhuyen')->andFilterWhere(['ma' => $maquan])->select(["ST_AsGeoJSON(ST_Simplify(ST_Buffer(ST_Union(geom)::geography, 100)::geometry, 0.0001))"])->scalar();
        }, 30 * 24 * 3600);
        $model['ranhphuong'] = DmPhuongxa::find()->orderBy('ten')->all();
        $model['linhvuc'] = DmLinhvuc::find()->where('id <> 0 and status = 1')->orderBy('id')->all();

        $legend = $this->renderPartial('legend');
        return $this->render('index', compact('tpBounds', 'legend', 'settingPhamvi', 'model','searchModel'));
    }

    public function actionList($ten = null, $sonha = null, $tenduong = null, $todanpho = null, $phuong = null, $loaidonvikinhte = null, $linhvuc = null)
    {
        $query = VDonvikinhteMap::find();
        if($todanpho != null) {
            $query->join('inner join' ,'tdp_kpq11', 'st_intersects(tdp_kpq11.geom, v_donvikinhte_map.geom)')
            ->andWhere('tdp_kpq11.gid = '.$todanpho);
        } else {
            $query->andFilterWhere(['phuongxa_id' => $phuong]);
        }
        $query->andWhere(['status' => 1]);
        $query->andWhere('geo_x is not null and geo_y is not null ');
        $query->andFilterWhere(['ilike', 'upper(ten)', mb_strtoupper($ten)]);
        $query->andFilterWhere(['ilike', 'upper(so_nha)', mb_strtoupper($sonha)]);
        $query->andFilterWhere(['ilike', 'upper(ten_duong)', mb_strtoupper($tenduong)]);
        
        $query->andFilterWhere(['loaidonvikinhte_id' => $loaidonvikinhte]);
        $query->andFilterWhere(['linhvuc_id' => $linhvuc]);
        $countQuery = clone $query;
        $totalcount = $countQuery->count();
        $pages = new Pagination(['totalCount' => $totalcount]);
        $models = $query->offset($pages->offset)->limit($pages->limit)->orderBy('ten')->asArray()->all();
        return $this->renderPartial("list", [
            'models' => $models,
            'totalcount' => $totalcount,
            'pages' => $pages,
        ]);
    }

    public function actionGeojson($ten = null, $sonha = null, $tenduong = null,$todanpho = null, $phuongxa = null, $loaidonvikinhte = null, $linhvuc = null)
    {
        $query = VDonvikinhteMap::find();
        if($todanpho != null) {
            $query->join('inner join','tdp_kpq11', 'st_intersects(tdp_kpq11.geom, v_donvikinhte_map.geom)')
            ->andWhere('tdp_kpq11.gid = '.$todanpho);
        } else {
            $query->andFilterWhere(['phuongxa_id' => $phuongxa]);
        }
        $query->andWhere(['status' => 1]);
        $query->andWhere('geo_x is not null and geo_y is not null ');
        $query->andFilterWhere(['ilike', 'upper(ten)', mb_strtoupper($ten)]);
        $query->andFilterWhere(['ilike', 'upper(so_nha)', mb_strtoupper($sonha)]);
        $query->andFilterWhere(['ilike', 'upper(ten_duong)', mb_strtoupper($tenduong)]);
        $query->andFilterWhere(['loaidonvikinhte_id' => $loaidonvikinhte]);
        $query->andFilterWhere(['linhvuc_id' => $linhvuc]);
        $result = $query->select(['id', 'geo_x', 'geo_y', 'loaidonvikinhte_id'])->asArray()->all();
        return json_encode($result);
    }

    public function actionGetStreetGeojson($street = null)
    {
        $streetObjs = [];

        if ($street != null) {
            $result = (new \yii\db\Query())
                ->select(['tenduong', 'capduong', 'st_x(st_centroid(geom)) as geo_x', 'st_y(st_centroid(geom)) as geo_y', 'st_asgeojson(geom) as geojson'])
                ->from('gt')
                ->where(['ilike', 'upper(tenduong)', mb_strtoupper($street)])
                ->andWhere(['status' => 1])
                ->all();
            foreach ($result as $item) {
                $geojson = json_decode($item['geojson'], true);
                $streetObjs[] = [
                    'properties' => [
                        'name' => $item['tenduong'],
                        'level' => $item['capduong'],
                        'geo_x' => $item['geo_x'],
                        'geo_y' => $item['geo_y'],
                    ],
                    'type' => $geojson['type'],
                    'coordinates' => $geojson['coordinates'],
                ];
            }
        }

        return json_encode($streetObjs);
    }

    public function actionGetWardGeojson($ward = null)
    {
        $wardObjs = [];

        if ($ward != null) {
            $result = (new \yii\db\Query())
                ->select(['ten', 'st_x(st_centroid(geom)) as geo_x', 'st_y(st_centroid(geom)) as geo_y', 'st_asgeojson(geom) as geojson'])
                ->from('dm_phuongxa')
                ->where(['id' => $ward])
                ->one();

            $geojson = json_decode($result['geojson'], true);
            $wardObjs[] = [
                'properties' => [
                    'name' => $result['ten'],
                    'geo_x' => $result['geo_x'],
                    'geo_y' => $result['geo_y'],
                ],
                'type' => $geojson['type'],
                'coordinates' => $geojson['coordinates'],
            ];
        }

        return json_encode($wardObjs);
    }

    public function actionGetWardDetail($ward = null)
    {
        $model = null;

        if ($ward != null) {
            $all = DonViKinhTe::find()->where(['phuongxa_id' => $ward])->count();
            $hasGeom = DonViKinhTe::find()->where('geom is not null')->andWhere(['phuongxa_id' => $ward])->count();
            $noGeom = $all - $hasGeom;

            $model['doanhnghiep']['soluong'] = [
                [
                    'name' => 'Tổng số đơn vị kinh tế',
                    'value' => $all,
                ],
                [
                    'name' => 'Đã xác định vị trí',
                    'value' => $hasGeom,
                ],
                [
                    'name' => 'Chưa xác định vị trí',
                    'value' => $noGeom,
                ],
            ];

            $result = (new \yii\db\Query())
            ->select('*')
            ->from('v_doanhnghiep_statistic')
            ->where(['id' => $ward])
            ->all();
            foreach($result as $i => $item) {
                if(isset($item['loaihinhdoanhnghiep_id'])) {
                    if(!isset($model['doanhnghiep']['loaihinh'][$item['loaihinhdoanhnghiep_id']])) {
                        $model['doanhnghiep']['loaihinh'][$item['loaihinhdoanhnghiep_id']] = [
                            'value' => $item['dvkt_loaihinh'],
                            'name' => $item['ten_loaihinh'],
                        ];
                    }
                }
                if(isset($item['linhvuc_id'])) {
                    if(!isset($model['doanhnghiep']['linhvuc'][$item['linhvuc_id']])) {
                        $model['doanhnghiep']['linhvuc'][$item['linhvuc_id']] = [
                            'value' => $item['dvkt_linhvuc'],
                            'name' => $item['ten_linhvuc'],
                        ];
                    } else {
                        // $model['doanhnghiep']['linhvuc'][$item['linhvuc_id']]['value'] += $item['dvkt_linhvuc'];
                    }
                }
            }

            $model['doanhnghiep']['loaihinh'] = array_values($model['doanhnghiep']['loaihinh']);
            $model['doanhnghiep']['linhvuc'] = array_values($model['doanhnghiep']['linhvuc']);
            $model['phuong'] = $result[0]['ten'];
        }

        return $this->renderAjax('ward-detail', ['model' => $model]);

        
    }

    public function actionGetSubquarterGeojson($subquarter = null)
    {
        $subquarterObjs = [];

        if ($subquarter != null) {
            $result = (new \yii\db\Query())
                ->select(['tento', 'st_x(st_centroid(geom)) as geo_x', 'st_y(st_centroid(geom)) as geo_y', 'st_asgeojson(geom) as geojson'])
                ->from('tdp_kpq11')
                ->where(['gid' => (integer)$subquarter])
                ->one();
            $geojson = json_decode($result['geojson'], true);
            $subquarterObjs[] = [
                'properties' => [
                    'name' => $result['tento'],
                    'geo_x' => $result['geo_x'],
                    'geo_y' => $result['geo_y'],
                ],
                'type' => $geojson['type'],
                'coordinates' => $geojson['coordinates'],
            ];
        }

        return json_encode($subquarterObjs);
    }

    public function actionGet($id)
    {
        $model = VDonvikinhteMap::find()->where(['id' => $id])->asArray()->one();

        return $this->renderPartial('get', ['model' => $model]);
    }
}

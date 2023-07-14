<?php

namespace app\modules\map\controllers;

use app\modules\map\models\TdpKpq11;
use yii\web\Controller;
use Yii;
use yii\web\Response;

class DonvihanhchinhController extends Controller
{
    public function actionListKhupho()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = TdpKpq11::find()->select(['khupho'])
            ->andWhere(['phuongxa_id' => (integer)$id])
            ->groupBy('khupho')
            ->orderBy('khupho')
            ->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $item) {
                    $out[] = ['id' => $item['khupho'], 'name' => 'Khu phố ' . $item['khupho']];
                    if ($i == 0) {
                        $selected = $item['khupho'];
                    }
                }
                // Shows how you can preselect a value
                return ['output' => $out, 'selected' => $selected];
            }
        }
        return ['output' => '', 'selected' => ''];
    }

    public function actionListTodanpho()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $id = end($_POST['depdrop_parents']);
            $list = TdpKpq11::find()->select(['gid','tento'])
            ->andWhere(['phuongxa_id' => (integer)$id])
            ->orderBy('tento')
            ->asArray()->all();
            $selected  = null;
            if ($id != null && count($list) > 0) {
                $selected = '';
                foreach ($list as $i => $item) {
                    $out[] = ['id' => $item['gid'], 'name' => 'Tổ ' . $item['tento']];
                    if ($i == 0) {
                        $selected = $item['gid'];
                    }
                }
                // Shows how you can preselect a value
                return ['output' => $out, 'selected' => $selected];
            }
        }
        return ['output' => '', 'selected' => ''];
    }
}

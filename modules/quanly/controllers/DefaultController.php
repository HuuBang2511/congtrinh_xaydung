<?php

namespace app\modules\quanly\controllers;

use app\modules\base\BaseController;
use app\modules\quanly\models\DonViKinhTe;
use app\modules\quanly\models\DonvikinhteDudieukien;
use app\modules\quanly\models\Nguoidaidien;
use app\modules\services\DonvikinhteService;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class DefaultController extends BaseController
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],

        ];
    }

    public function actionIndex()
    {

        

        return $this->render('index', [
        
        ]);
    }
}
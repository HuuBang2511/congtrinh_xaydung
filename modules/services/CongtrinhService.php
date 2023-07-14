<?php

namespace app\modules\services;
use app\modules\danhmuc\models\DmLoaidat;
use app\modules\danhmuc\models\DmTinhtrangCongtrinh;
use app\modules\danhmuc\models\DmLoaicongtrinh;
use app\modules\danhmuc\models\DmLoaigiayphep;
use app\modules\danhmuc\models\DmTinhtrangGiayphep;
use app\modules\quanly\models\RanhHuyen;
use app\modules\quanly\models\RanhXa;

class CongtrinhService
{
    const STATUS = [
        'ACTIVE' => 1,
        'DELETED' => 0,
    ];
    public static function getCategories()
    {
        $categories = [];
        $categories['loaidat'] = DmLoaidat::find()->orderBy('id')->all();
        $categories['tinhtrang_congtrinh'] = DmTinhtrangCongTrinh::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        $categories['loaicongtrinh'] = DmLoaicongTrinh::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        $categories['coquan_thamdinh'] = CoquanThamdinh::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        $categories['donvi_pheduyet'] = DonviPheduyet::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        $categories['huyen'] = RanhHuyen::find()->orderBy('gid')->all();
        $categories['xa'] = RanhXa::find()->orderBy('gid')->all();
        return $categories;
    }
}


<?php

namespace app\modules\services;

use app\modules\danhmuc\models\DmDantoc;
use app\modules\danhmuc\models\DmGioitinh;
use app\modules\danhmuc\models\DmLoaidonvikinhte;
use app\modules\danhmuc\models\DmLoaihinhdoanhnghiep;
use app\modules\danhmuc\models\DmPhuongxa;
use app\modules\danhmuc\models\DmLinhvuc;
use app\modules\danhmuc\models\DmLoaidoanhnghiep;
use app\modules\danhmuc\models\DmLoaigiayto;
use app\modules\danhmuc\models\DmNganhnghe;
use app\modules\danhmuc\models\DmQuoctich;
use app\modules\danhmuc\models\DmTinhtranghoatdong;

class DonvikinhteService
{

    const STATUS = [
        'ACTIVE' => 1,
        'DELETED' => 0,
    ];
    public static function getCategories()
    {
        $categories = [];
        $categories['loaidonvikinhte'] = DmLoaidonvikinhte::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('ten')->all();
        $categories['phuongxa'] = DmPhuongxa::find()->orderBy('ten')->all();
        $categories['loaihinhdoanhnghiep'] = DmLoaihinhdoanhnghiep::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('ten')->all();
        $categories['nganhnghe'] = DmNganhnghe::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('ten')->all();
        $categories['tinhtranghoatdong'] = DmTinhtranghoatdong::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('ten')->all();
        $categories['linhvuc'] = DmLinhvuc::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('ten_cap1')->all();
        $categories['loaigiayto'] = DmLoaigiayto::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        $categories['gioitinh'] = DmGioitinh::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        $categories['dantoc'] = DmDantoc::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        $categories['quoctich'] = DmQuoctich::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        $categories['loaidoanhnghiep'] = DmLoaidoanhnghiep::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('id')->all();
        return $categories;
    }

}
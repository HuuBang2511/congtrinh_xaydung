<?php
namespace app\modules\services;

use app\modules\danhmuc\models\DmHatangXahoi;
use app\modules\danhmuc\models\DmTinhtrangDuan;
use app\modules\quanly\models\RanhHuyen;
use app\modules\quanly\models\RanhXa;


class DuanService{
    const STATUS = [
        'ACTIVE' => 1,
        'DELETED' => 0,
    ];

    public static function getCategories(){
        $categories = [];
        $categories['hatangxahoi'] = DmHatangXahoi::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('ten')->all();
        $categories['tinhtrangduan'] = DmTinhtrangDuan::find()->where(['status' => self::STATUS['ACTIVE']])->orderBy('ten')->all();
        $categories['huyen'] = RanhHuyen::find()->orderBy('gid')->all();
        $categories['xa'] = RanhXa::find()->orderBy('gid')->all();
        $categories['huyen'] = RanhHuyen::find()->orderBy('gid')->all();
        $categories['xa'] = RanhXa::find()->orderBy('gid')->all();
        return $categories;
    }
}
?>


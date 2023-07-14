<?php

use yii\widgets\DetailView;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use app\widgets\crud\CrudAsset;
use app\modules\services\UtilityService;

CrudAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\DuAn */
?>

<div class="row">
    <div class="col-lg-12">
        <div class="block block-themed">
            <div class="block-header">
                <div class="h3 block-title">Thông tin chi tiết dự án</div>
            </div>
        </div>
    </div>
</div>

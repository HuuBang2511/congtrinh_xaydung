<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\CongtrinhTimeline */
?>
<div class="congtrinh-timeline-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'updated_at',
        ],
    ]) ?>

</div>

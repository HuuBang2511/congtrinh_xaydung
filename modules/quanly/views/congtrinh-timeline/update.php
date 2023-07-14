<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\CongtrinhTimeline */
?>
<div class="congtrinh-timeline-update">

    <?= $this->render('_form', [
        'model' => $model,
        'congtrinhTimeline' => $congtrinhTimeline,
    ]) ?>

</div>

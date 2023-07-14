<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\DuAn */
?>
<div class="du-an-update">

    <?= $this->render('_form', [
        'chudautu' => $chudautu,
        'duan' => $duan,
        'categories' => $categories,
    ]) ?>

</div>

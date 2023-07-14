<?php
use yii\bootstrap4\LinkPager;

?>
<style>
    #list_results {
        font-size: 0.8rem !important;
    }
</style>

<div class="row pb-1 px-3">
    <div class="col-lg-12">
        <span class="text-primary"><b>Có <?= $totalcount ?> kết quả</b></span>
    </div>
</div>

<div class="row pb-1" id="list_results">
    <div class="col-lg-12">
        <?php foreach ($models as $model): ?>
            <a class="block block-bordered dn-item my-0" onclick="viewDetail(<?=$model['geo_x']?>,<?=$model['geo_y']?>,<?=$model['id']?>)" href="javascript:void(0)" data-point-x="<?= $model["geo_x"] ?>" data-point-y="<?= $model["geo_y"] ?>">
                <div class="block-content py-1">
                    <div class="ten">
                        <label class="control-label">
                            <?= (($model['ten'] == NULL) ? '(Chưa có)' : $model['ten']) ?>
                        </label>
                    </div>
                    <div class="loaihinh">
                        <label class="control-label">Loại đơn vị kinh tế:</label>
                        <?= $model['loaidonvikinhte'] ?>
                    </div>

                    <div class="diachi">
                        <label class="control-label">Địa chỉ: </label>
                        <?= $model['diachi'] ?>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="row pt-2">
    <div class="col-lg-12">
        <?= LinkPager::widget(['pagination' => $pages,'maxButtonCount'=>8]); ?>
    </div>
</div>
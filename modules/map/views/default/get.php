<div class="block">
    <div class="block-header px-0">
        <h3 class="block-title text-uppercase">Thông tin chi tiết</h3>
        <div class="block-options">

            <button class="btn btn-sm btn-outline-secondary" onclick="goBackTab()"><i class="fa fa-chevron-left"></i></button>
        </div>
    </div>
    <div class="block-content-sm">
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-striped table-bordered table-custom">
                    <tr>
                        <th colspan="2"><?= $model['ten'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-hashtag"></i></th>
                        <td><?= $model['masothue'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-location-dot"></i></th>
                        <td><?= $model['diachi'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-user"></i></th>
                        <td><?= $model['hoten'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-phone"></i></th>
                        <td><?= $model['dienthoai'] ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa fa-calendar-days"></i></th>
                        <td><?= $model['ngaycap'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <a class="btn btn-sm btn-info" target="_blank" href="<?= Yii::$app->urlManager->createUrl(['quanly/don-vi-kinh-te/view', 'id' => $model['id']]) ?>">
                    <i class="fa fa-info"></i>
                </a>
                <?php if (isset($model['geom'])) : ?>
                    <button class="btn btn-sm btn-success" onclick="mapZoomAndPanTo(<?= $model['geo_y'] ?>, <?= $model['geo_x'] ?>, 19)">
                        <i class="fa fa-map-marker-alt"></i>
                    </button>
                <?php endif ?>
                <button class="btn btn-sm btn-warning">
                    <i class="fa fa-triangle-exclamation"></i>
                </button>
            </div>
        </div>
    </div>
</div>
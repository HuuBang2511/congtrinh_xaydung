<?php

use kartik\detail\DetailView;
use yii\helpers\Html;

use yii\grid\GridView;
use yii\web\View;

use app\services\MapService;
use app\widgets\maps\types\LatLng;
use app\widgets\maps\layers\Marker;
use app\widgets\maps\layers\TileLayer;
use app\widgets\maps\LeafletMap;
use app\widgets\maps\layers\Layer;
use app\widgets\maps\controls\Layers;
use app\widgets\maps\controls\Scale;
use app\widgets\maps\types\Icon;
use app\widgets\crud\CrudAsset;

CrudAsset::register($this);
/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\DuAn */

if($duanThaydoi != null){
    $countThayDoi = count($duanThaydoi);
}

?>

<div class="row">
    <div class="col-lg-12">
        <div class="block block-themed">
            <div class="block-header">
                <div class="h3 block-title">Thông tin chi tiết dự án</div>
                <div class="block-option">
                    <?= Html::a('Cập nhập', ['update', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
                    <?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <ul class="nav nav-tabs nav-tabs-block" role="tablist">
                <li class="nav-item" role="presenatation">
                    <?= Html::button('Thông tin chung', [
                        'type' => 'button',
                        'class' => 'nav-link active',
                        'data-bs-toggle' => 'tab',
                        'data-bs-target' => "#thongtinchung-view",
                    ])?>
                </li>
                <li class="nav-item" role="presentation">
                    <?= Html::button('Thông tin timeline', [
                        'type' => 'button',
                        'class' => 'nav-link ',
                        'data-bs-toggle' => 'tab',
                        'data-bs-target' => "#thongtintimeline-view",
                    ])?>
                </li>
                <li class="nav-item" role="presentation">
                    <?= Html::button('Lịch sử thay đổi thông tin dự án', [
                        'type' => 'button',
                        'class' => 'nav-link',
                        'data-bs-toggle' => 'tab',
                        'data-bs-target' => "#lichsuthaydoi-view",

                    ]) ?>
                </li>
            </ul>

            <div class="block-content tab-content">
                <div class="tab-pane active" id="thongtinchung-view">
                    <div class="row">
                        <div class="col-md-12">
                        <?=
                            DetailView::widget([
                                'model' => $model,
                                'condensed' => true,
                                'enableEditMode' => FALSE,
                                'hover' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'THÔNG TIN DỰ ÁN',
                                    'type' => DetailView::TYPE_PRIMARY,
                                ],
                                'attributes' => [
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'ten',
                                                'label' => 'Tên công trình',
                                                'format' => 'raw',
                                                'value' => $model->ten,
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'so_to',
                                                'format' => 'raw',
                                                'value' => $model->so_to,
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'so_thua',
                                                'format' => 'raw',
                                                'value' => $model->so_thua,
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'huyen_id',
                                                'format' => 'raw',
                                                'value' => ($model->huyen_id != null)? $model->huyen->tenhuyen : '<i> Chưa có </i>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'xa_id',
                                                'format' => 'raw',
                                                'value' => ($model->xa_id != null)? $model->xa->tenxa : '<i> Chưa có </i>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'khu_vuc',
                                                'format' => 'raw',
                                                'value' => $model->khu_vuc,
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'quyetdinh_giaodat',
                                                'format' => 'raw',
                                                'value' => $model->quyetdinh_giaodat,
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'ngay_giao',
                                                'format' => ['date', 'php:d-m-Y'],
                                                'value' => $model->ngay_giao,
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'tinhtrangduan_id',
                                                'format' => 'raw',
                                                'value' => ($model->tinhtrangduan_id != null)? $model->tinhtrangduan->ten : '<i>Chưa có</i>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'dia_diem',
                                                'format' => 'raw',
                                                'value' => $model->dia_diem,
                                                'displayOnly' => true,
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'phaply_quyhoach',
                                                'format' => 'raw',
                                                'value' => $model->phaply_quyhoach,
                                                'displayOnly' => true,
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'quymo_dientich',
                                                'format' => 'raw',
                                                'value' => ($model->quymo_dientich != null) ? $model->quymo_dientich.' m²' : '<i>Chưa có</i>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'quymo_danso',
                                                'format' => 'raw',
                                                'value' => $model->quymo_danso,
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'bangiao_hatang_xahoi',
                                                'format' => 'raw',
                                                'value' => ($model->bangiao_hatang_xahoi == true) ? 'Có' : 'Không',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'bangiao_hatang_kythuat',
                                                'format' => 'raw',
                                                'value' => ($model->bangiao_hatang_kythuat == true) ? 'Có' : 'Không',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'hientrang_dautu_hiennay',
                                                'format' => 'raw',
                                                'value' => $model->hientrang_dautu_hiennay,
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'nha_o',
                                                'label' => 'Tỉ lệ nhà ở',
                                                'format' => 'raw',
                                                'value' => ($model->nha_o != null) ? $model->nha_o.' %': '<i>Chưa có</i>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'tile_boithuong',
                                                'format' => 'raw',
                                                'value' => ($model->tile_boithuong != null) ? $model->tile_boithuong.' %': '<i>Chưa có</i>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'hatang_kythuat',
                                                'label' => 'Tỉ lệ hạ tầng kỹ thuật',
                                                'format' => 'raw',
                                                'value' => ($model->hatang_kythuat != null) ? $model->hatang_kythuat.' %': '<i>Chưa có</i>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'cong_vien',
                                                'label' => 'Tỉ lệ công viên',
                                                'format' => 'raw',
                                                'value' => ($model->cong_vien != null) ? $model->cong_vien.' %': '<i>Chưa có</i>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'hatang_xahoi',
                                                'format' => 'raw',
                                                'value' => $model->hatang_xahoi,
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'dinhhuong_quanly',
                                                'format' => 'raw',
                                                'value' => $model->dinhhuong_quanly,
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'khokhan_vuongmac',
                                                'format' => 'raw',
                                                'value' => $model->khokhan_vuongmac,
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'dexuat_kiennghi',
                                                'format' => 'raw',
                                                'value' => $model->dexuat_kiennghi,
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ],
                                ]
                            ]);
                        ?>
                        </div>
                        <div class="col-md-12 mt-4 mb-4">
                            <?=
                            DetailView::widget([
                                'model' => $chudautu,
                                'condensed' => true,
                                'enableEditMode' => FALSE,
                                'hover' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'THÔNG TIN CHỦ ĐẦU TƯ',
                                    'type' => DetailView::TYPE_PRIMARY,
                                ],
                                'attributes' => [
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'ten',
                                                'label' => 'Tên chủ đầu tư',
                                                'format' => 'raw',
                                                'value' => $chudautu->ten != null ? $chudautu->ten : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'cccd_cmnd',
                                                'label' => 'CCCD/CMND',
                                                'format' => 'raw',
                                                'value' => $chudautu->cccd_cmnd != null ? $chudautu->cccd_cmnd : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'so_dienthoai',
                                                'label' => 'Số điện thoại',
                                                'format' => 'raw',
                                                'value' => $chudautu->so_dienthoai != null ? $chudautu->so_dienthoai : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'dia_chi',
                                                'label' => 'Địa chỉ',
                                                'format' => 'raw',
                                                'value' => $chudautu->dia_chi != null ? $chudautu->dia_chi : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                ]
                            ])
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="lichsuthaydoi-view">
                    <?php if($duanThaydoi != null) : ?>
                        <div class="row pb-2">
                            <div class="col-md-12">
                                <div class="block block-themed block-bordered block-mode-hidden">
                                    <div class="block-header">
                                        <h3 class="block-title">THÔNG TIN LỊCH SỬ THAY ĐỔI</h3>
                                        <div class="block-options">
                                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                                        </div>
                                    </div>
                                    <div class="block-content">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="text-center">STT</th>
                                                <th class="text-center">Tên công trình</th>
                                                <th class="text-center">Thời gian thay đổi</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                            <?php foreach($duanThaydoi as $i => $model): ?>
                                                <tr>
                                                    <td><?= $i + 1 ?></td>
                                                    <td><?= ($model['ten'] != null)? $model['ten'] : '<i>Chưa có</i>' ?></td>
                                                    <td><?= ($model['updated_at'] != null)? $model['updated_at'] : '<i>Chưa có</i>' ?></td>
                                                    <td class="text-center">
                                                        <a title="Xem chi tiết" href="<?= Yii::$app->homeUrl ?>/quanly/cong-trinh/view-history?id=<?= $model['id'] ?>">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <?php if($i < $countThayDoi - 1) : ?>
                                                        <a title="Cập nhập" href="<?= Yii::$app->homeUrl ?>/quanly/cong-trinh/update-history?id=<?= $model['id'] ?>">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

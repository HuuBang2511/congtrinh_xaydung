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


/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\CongTrinh */
?>

<?php


if($model['congtrinh_thaydoi'] != null){
    $countThayDoi = count($model['congtrinh_thaydoi']);
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title">Chi tiết thông tin công trình</h3>
                <div class="block-option">
                    <?= Html::a('Cập nhập', ['update', 'id' => $model['congtrinh']->id], ['class' => 'btn btn-warning']) ?>
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
                    <?= Html::button('Lịch sử thay đổi thông tin công trình', [
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
                                'model' => $model['congtrinh'],
                                'condensed' => true,
                                'enableEditMode' => FALSE,
                                'hover' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => 'THÔNG TIN CÔNG TRÌNH',
                                    'type' => DetailView::TYPE_PRIMARY,
                                ],
                                'attributes' => [
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'ten',
                                                'label' => 'Tên công trình',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->ten,
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'so_biennhan_hoso',
                                                'label' => 'Số biên nhận hồ sơ',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->so_biennhan_hoso != null ? $model['congtrinh']->so_biennhan_hoso : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'ma',
                                                'label' => 'Mã công trình',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->ma != null ? $model['congtrinh']->ma : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'so_to',
                                                'label' => 'Số tờ',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->so_to != null ? $model['congtrinh']->so_to : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'so_thua',
                                                'label' => 'Số thửa',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->so_thua != null ? $model['congtrinh']->so_thua : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'chieu_dai',
                                                'label' => 'Chiều dài',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->chieu_dai != null ? $model['congtrinh']->chieu_dai.' m' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'chieu_rong',
                                                'label' => 'Chiều rộng',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->chieu_rong != null ? $model['congtrinh']->chieu_rong. ' m' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'ten_duong',
                                                'label' => 'Tên đường',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->ten_duong != null ? $model['congtrinh']->ten_duong : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'donvi_cungcap_thongtin',
                                                'label' => 'Đơn vị cung cấp thông tin',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->donvi_cungcap_thongtin != null ? $model['congtrinh']->donvi_cungcap_thongtin : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'donvi-quanly',
                                                'label' => 'Đơn vị quản lý',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->donvi_quanly != null ? $model['congtrinh']->donvi_quanly : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'donvi_thicong',
                                                'label' => 'Đơn vị thi công',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->donvi_thicong != null ? $model['congtrinh']->donvi_thicong : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'so_giayphep_pheduyet',
                                                'label' => 'Số giấy phép phê duyệt',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->so_giayphep_pheduyet != null ? $model['congtrinh']->so_giayphep_pheduyet : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'ngay_cap',
                                                'label' => 'Ngày cấp',
                                                'format' => ['date', 'php:d-m-Y'],
                                                'value' => $model['congtrinh']->ngay_cap,
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'donvi_tuvan',
                                                'label' => 'Đơn vị tư vấn',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->donvi_tuvan != null ? $model['congtrinh']->donvi_tuvan : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'tong_dientich_san',
                                                'label' => 'Tổng diện tích sàn',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->tong_dientich_san != null ? $model['congtrinh']->tong_dientich_san. ' m²' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'mota_diadiem',
                                                'label' => 'Mô tả địa điểm',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->mota_diadiem != null ? $model['congtrinh']->mota_diadiem : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'so_tang',
                                                'label' => 'Số tầng',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->so_tang != null ? $model['congtrinh']->so_tang : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'cap_congtrinh',
                                                'label' => 'Cấp công trình',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->cap_congtrinh != null ? $model['congtrinh']->cap_congtrinh : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'totrinh_thamdinh',
                                                'label' => 'Url tờ trình thẩm định',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->totrinh_thamdinh != null ? '<a href="'.$model['congtrinh']->totrinh_thamdinh.'" target="_blank">'.$model['congtrinh']->totrinh_thamdinh : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'totrinh_pheduyet',
                                                'label' => 'Url tờ trình phê duyệt',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->totrinh_pheduyet != null ? '<a href="'.$model['congtrinh']->totrinh_pheduyet.'" target="_blank">'.$model['congtrinh']->totrinh_pheduyet : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'giapphep_pccc',
                                                'label' => 'Đường dẫn giấy phép PCCC',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->giayphep_pccc != null ? '<a href="'.$model['congtrinh']->giayphep_pccc.'" target="_blank">'.$model['congtrinh']->giayphep_pccc : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'tien_do',
                                                'label' => 'Tiến độ',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->tien_do != null ? $model['congtrinh']->tien_do : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'da_kiemtra',
                                                'label' => 'Đã kiểm tra',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->da_kiemtra != null ? 'Có': 'Không',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'tung_vipham',
                                                'label' => 'Từng vi phạm',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->tung_vipham != null ? 'Có': 'Không',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'khacphuc_vipham',
                                                'label' => 'Khắc phục vi phạm',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->khacphuc_vipham != null ? $model['congtrinh']->khacphuc_vipham : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'chigioi_duongbo',
                                                'label' => 'Chỉ giới đường bộ',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->chigioi_duongbo != null ? $model['congtrinh']->chigioi_duongbo : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'matdo_xaydung',
                                                'label' => 'Mật độ xây dựng',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->matdo_xaydung != null ? $model['congtrinh']->matdo_xaydung : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'ketcau_congtrinh',
                                                'label' => 'Kết cấu công trinh',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->ketcau_congtrinh != null ? $model['congtrinh']->ketcau_congtrinh : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'ban_cong',
                                                'label' => 'Diện tích ban công',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->ban_cong != null ? $model['congtrinh']->ban_cong.' m²' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'chieucao_mai',
                                                'label' => 'Chiều cao mái',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->chieucao_mai != null ? $model['congtrinh']->chieucao_mai. 'm' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'loaidat_id',
                                                'label' => 'Loại đất',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->loaidat != null ? $model['congtrinh']->loaidat->ten : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'donvipheduyet',
                                                'label' => 'Đơn vị phê duyệt',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->donvipheduyet != null ? $model['congtrinh']->donvipheduyet->ten : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'coquanthamdinh_id',
                                                'label' => 'Cơ quan thẩm định',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->coquanthamdinh != null ? $model['congtrinh']->coquanthamdinh->ten : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'heso_sudung_dat',
                                                'label' => 'Hệ số sử dụng đất',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->heso_sudung_dat != null ? $model['congtrinh']->heso_sudung_dat : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'dientich_hienhuu',
                                                'label' => 'Diện tích hiện hữu',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->dientich_hienhuu != null ? $model['congtrinh']->dientich_hienhuu. ' m²' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'chieucao_thongtang',
                                                'label' => 'Chiều cao thông tầng',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->chieucao_thongtang != null ? $model['congtrinh']->chieucao_thongtang.' m' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'sotang_ngam',
                                                'label' => 'Số tầng ngầm',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->sotang_ngam != null ? $model['congtrinh']->sotang_ngam : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'sudung_thangmay',
                                                'label' => 'Sử dụng thang máy',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->sudung_thangmay != null ? $model['congtrinh']->sudung_thangmay : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'mucdich_sudung',
                                                'label' => 'Mục đích sử dụng',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->mucdich_sudung != null ? $model['congtrinh']->mucdich_sudung : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ],
                                    [
                                        'columns' => [
                                            [
                                                'attribute' => 'thongtin_banve_kientruc',
                                                'label' => 'Thông tin bản vẽ kiến trúc',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh']->thongtin_banve_kientruc!= null ? $model['congtrinh']->thongtin_banve_kientruc : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ]
                                ]
                            ])
                            ?>
                        </div>
                        <div class="col-md-12 mt-4 mb-4">
                            <?=
                            DetailView::widget([
                                'model' => $model['chudautu'],
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
                                                'value' => $model['chudautu']->ten != null ? $model['chudautu']->ten : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'cccd_cmnd',
                                                'label' => 'CCCD/CMND',
                                                'format' => 'raw',
                                                'value' => $model['chudautu']->cccd_cmnd != null ? $model['chudautu']->cccd_cmnd : '<i>Chưa có</>',
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
                                                'value' => $model['chudautu']->so_dienthoai != null ? $model['chudautu']->so_dienthoai : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'dia_chi',
                                                'label' => 'Địa chỉ',
                                                'format' => 'raw',
                                                'value' => $model['chudautu']->dia_chi != null ? $model['chudautu']->dia_chi : '<i>Chưa có</>',
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
                    <?php if($model['congtrinh_thaydoi'] != null) : ?>
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
                                                <th class="text-center">Mã công trình</th>
                                                <th class="text-center">Số biên nhận hồ sơ</th>
                                                <th class="text-center">Hành động</th>
                                            </tr>
                                            <?php foreach($model['congtrinh_thaydoi'] as $i => $model): ?>
                                                <tr>
                                                    <td><?= $i + 1 ?></td>
                                                    <td><?= ($model['ten'] != null)? $model['ten'] : '<i>Chưa có</i>' ?></td>
                                                    <td><?= ($model['updated_at'] != null)? $model['updated_at'] : '<i>Chưa có</i>' ?></td>
                                                    <td><?= ($model['ma'] != null)? $model['ma'] : '<i>Chưa có</i>' ?></td>
                                                    <td><?= ($model['so_biennhan_hoso'] != null)? $model['so_biennhan_hoso'] : '<i>Chưa có</i>' ?></td>
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

                <div class="tab-pane" id="thongtintimeline-view">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?= Yii::$app->homeUrl ?>quanly/congtrinh-timeline/create?congtrinh_id=<?= $_GET['id'] ?>"
                                class="btn btn-block btn-success mb-3 float-end">Thêm mới thông tin công trình timeline</a>
                            <table class="table table-bordered">
                                <tr>
                                    <th>STT</th>
                                    <th>Số giấy phép</th>
                                    <th>Ngày cấp</th>
                                    <th>Loại giấy phép</th>
                                    <th>Tình trạng giấy phép</th>
                                    <th>Lý do</th>
                                    <th>Thời hạn</th>
                                    <th>Đơn vị cấp phép</th>
                                    <th></th>
                                </tr>
                                <?php if(isset($congtrinhTimeline) && $congtrinhTimeline != null): ?>
                                <?php foreach ($congtrinhTimeline as $i => $model): ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><?= ($model['so_giayphep'] != null) ? $model['so_giayphep'] : '' ?></td>
                                    <td><?= ($model['ngay_cap'] != null) ? date('d-m-Y', strtotime($model['ngay_cap'])) : '' ?></td>
                                    <td><?= ($model['loaigiayphep_id'] != null) ? $model->loaigiayphep->ten : '' ?></td>
                                    <td><?= ($model['tinhtranggiayphep_id'] != null) ? $model->tinhtranggiayphep->ten : '' ?></td>
                                    <td><?= ($model['ly_do'] != null) ? $model['ly_do'] : '' ?></td>
                                    <td><?= ($model['thoi_han'] != null) ? date('d-m-Y', strtotime($model['thoi_han'])) : '' ?></td>
                                    <td><?= ($model['donvicapphep_id'] != null) ? $model->donvicapphep->ten : '' ?></td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" href="<?= Yii::$app->homeUrl ?>quanly/congtrinh-timeline/view?id=<?= $model->id ?>"><i
                                                class="fa fa-eye"></i></a>
                                        <a class="btn btn-warning" href="<?= Yii::$app->homeUrl ?>quanly/congtrinh-timeline/update?id=<?= $model->id ?>"><i
                                                class="fa fa-pencil"></i></a>
                                        <a href="<?= Yii::$app->urlManager->createUrl('quanly/congtrinh-timeline/delete?id='.$model->id)?>" data-toggle = 'tooltip' data-confirm = 'Xóa thông tin công trình timeline' class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-3">
                <div class="col-lg-12 form-group mt-4">
                    <a href="javascript:history.back()" class="btn btn-light float-right"><i class="fa fa-arrow-left"></i> Quay lại</a>
                </div>
            </div>
        </div>

        
    </div>
</div>

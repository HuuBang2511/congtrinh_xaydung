<?php

use kartik\detail\DetailView;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\DonviKinhte */
?>
<?php

?>

<div class="row">
    <div class="col-lg-12">
        <div class="block block-themed">
            <div class="block-header">
                <?= ($model['congtrinh']->updated_at == $model['congtrinh_thaydoi']->updated_at)? '<h3 class="block-title">Thông tin mới nhất của công trình</h3>':'<h3 class="block-title">Thông tin cũ của công trình</h3>' ?>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-12">
                        <?=
                            DetailView::widget([
                                'model' => $model['congtrinh_thaydoi'],
                                'condensed' => true,
                                'enableEditMode' => FALSE,
                                'hover' => true,
                                'mode' => DetailView::MODE_VIEW,
                                'panel' => [
                                    'heading' => '<i class="fas fa-book"></i> THÔNG TIN CÔNG TRÌNH',
                                    'type' => DetailView::TYPE_PRIMARY,
                                ],
                                'attributes' => [
                                    [
                                        'columns' =>[
                                            [
                                                'attribute' => 'ten',
                                                'label' => 'Tên công trình',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->ten,
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
                                                'value' => $model['congtrinh_thaydoi']->so_biennhan_hoso != null ? $model['congtrinh_thaydoi']->so_biennhan_hoso : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'ma',
                                                'label' => 'Mã công trình',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->ma != null ? $model['congtrinh_thaydoi']->ma : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->so_to != null ? $model['congtrinh_thaydoi']->so_to : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'so_thua',
                                                'label' => 'Số thửa',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->so_thua != null ? $model['congtrinh_thaydoi']->so_thua : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->chieu_dai != null ? $model['congtrinh_thaydoi']->chieu_dai.' m' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'chieu_rong',
                                                'label' => 'Chiều rộng',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->chieu_rong != null ? $model['congtrinh_thaydoi']->chieu_rong. ' m' : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->ten_duong != null ? $model['congtrinh_thaydoi']->ten_duong : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'donvi_cungcap_thongtin',
                                                'label' => 'Đơn vị cung cấp thông tin',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->donvi_cungcap_thongtin != null ? $model['congtrinh_thaydoi']->donvi_cungcap_thongtin : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->donvi_quanly != null ? $model['congtrinh_thaydoi']->donvi_quanly : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'donvi_thicong',
                                                'label' => 'Đơn vị thi công',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->donvi_thicong != null ? $model['congtrinh_thaydoi']->donvi_thicong : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->so_giayphep_pheduyet != null ? $model['congtrinh_thaydoi']->so_giayphep_pheduyet : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'ngay_cap',
                                                'label' => 'Ngày cấp',
                                                'format' => ['date', 'php:d-m-Y'],
                                                'value' => $model['congtrinh_thaydoi']->ngay_cap,
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
                                                'value' => $model['congtrinh_thaydoi']->donvi_tuvan != null ? $model['congtrinh_thaydoi']->donvi_tuvan : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'tong_dientich_san',
                                                'label' => 'Tổng diện tích sàn',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->tong_dientich_san != null ? $model['congtrinh_thaydoi']->tong_dientich_san. ' m²' : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->mota_diadiem != null ? $model['congtrinh_thaydoi']->mota_diadiem : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->so_tang != null ? $model['congtrinh_thaydoi']->so_tang : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'cap_congtrinh',
                                                'label' => 'Cấp công trình',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->cap_congtrinh != null ? $model['congtrinh_thaydoi']->cap_congtrinh : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->totrinh_thamdinh != null ? '<a href="'.$model['congtrinh_thaydoi']->totrinh_thamdinh.'" target="_blank">'.$model['congtrinh_thaydoi']->totrinh_thamdinh : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'totrinh_pheduyet',
                                                'label' => 'Url tờ trình phê duyệt',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->totrinh_pheduyet != null ? '<a href="'.$model['congtrinh_thaydoi']->totrinh_pheduyet.'" target="_blank">'.$model['congtrinh_thaydoi']->totrinh_pheduyet : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->giayphep_pccc != null ? '<a href="'.$model['congtrinh_thaydoi']->giayphep_pccc.'" target="_blank">'.$model['congtrinh_thaydoi']->giayphep_pccc : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'tien_do',
                                                'label' => 'Tiến độ',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->tien_do != null ? $model['congtrinh_thaydoi']->tien_do : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->da_kiemtra != null ? 'Có': 'Không',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'tung_vipham',
                                                'label' => 'Từng vi phạm',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->tung_vipham != null ? 'Có': 'Không',
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
                                                'value' => $model['congtrinh_thaydoi']->khacphuc_vipham != null ? $model['congtrinh_thaydoi']->khacphuc_vipham : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'chigioi_duongbo',
                                                'label' => 'Chỉ giới đường bộ',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->chigioi_duongbo != null ? $model['congtrinh_thaydoi']->chigioi_duongbo : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->matdo_xaydung != null ? $model['congtrinh_thaydoi']->matdo_xaydung : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'ketcau_congtrinh',
                                                'label' => 'Kết cấu công trinh',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->ketcau_congtrinh != null ? $model['congtrinh_thaydoi']->ketcau_congtrinh : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->ban_cong != null ? $model['congtrinh_thaydoi']->ban_cong.' m²' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'chieucao_mai',
                                                'label' => 'Chiều cao mái',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->chieucao_mai != null ? $model['congtrinh_thaydoi']->chieucao_mai. 'm' : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->loaidat != null ? $model['congtrinh_thaydoi']->loaidat->ten : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'donvipheduyet',
                                                'label' => 'Đơn vị phê duyệt',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->donvipheduyet != null ? $model['congtrinh_thaydoi']->donvipheduyet->ten : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->coquanthamdinh != null ? $model['congtrinh_thaydoi']->coquanthamdinh->ten : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'heso_sudung_dat',
                                                'label' => 'Hệ số sử dụng đất',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->heso_sudung_dat != null ? $model['congtrinh_thaydoi']->heso_sudung_dat : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->dientich_hienhuu != null ? $model['congtrinh_thaydoi']->dientich_hienhuu. ' m²' : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'chieucao_thongtang',
                                                'label' => 'Chiều cao thông tầng',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->chieucao_thongtang != null ? $model['congtrinh_thaydoi']->chieucao_thongtang.' m' : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->sotang_ngam != null ? $model['congtrinh_thaydoi']->sotang_ngam : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                                'valueColOptions' => ['style' => 'width:30%'],
                                            ],
                                            [
                                                'attribute' => 'sudung_thangmay',
                                                'label' => 'Sử dụng thang máy',
                                                'format' => 'raw',
                                                'value' => $model['congtrinh_thaydoi']->sudung_thangmay != null ? $model['congtrinh_thaydoi']->sudung_thangmay : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->mucdich_sudung != null ? $model['congtrinh_thaydoi']->mucdich_sudung : '<i>Chưa có</>',
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
                                                'value' => $model['congtrinh_thaydoi']->thongtin_banve_kientruc!= null ? $model['congtrinh_thaydoi']->thongtin_banve_kientruc : '<i>Chưa có</>',
                                                'displayOnly' => true,
                                            ]
                                        ]
                                    ]
                                ]
                            ]);
                        ?>
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
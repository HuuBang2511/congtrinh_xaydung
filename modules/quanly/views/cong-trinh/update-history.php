<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\JsExpression;
use kartik\select2\Select2;
use unclead\multipleinput\MultipleInput;
use unclead\multipleinput\examples\models\ExampleModel;
use yii\widgets\MaskedInput;
use kartik\number\NumberControl;

?>

<?php
$form = ActiveForm::begin([
    'id' => 'update-congtrinh_thaydoi',
    'options' => [
        'class' => 'skin skin-square',
        'enctype' => 'multipart/form-data'
    ],
])
?>

<div class="row">
    <div class="col-lg-12">
        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title"><?= $this->title ?></h3>
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="block block-bordered">
                        <div class="block-content block-content-full ribbon ribbon-primary ribbon-left">
                            <div class="ribbon-box">
                                Thông tin cũ công trình trước thay đổi
                            </div>
                            <div class="pt-5">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'ten', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'loaicongtrinh_id')->dropDownList(ArrayHelper::map($model['loaicongtrinh'], 'id', 'ten'), ['prompt' => 'Chọn loại công trình'])->label('Loại công trình') ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'loaidat_id')->dropDownList(ArrayHelper::map($model['loaidat'], 'id', 'ten'), ['prompt' => 'Chọn loại đất'])->label('Loại dất') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'so_biennhan_hoso')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'ma')->textInput(['maxlength' => true])?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'so_to')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'so_thua')->textInput(['maxlength' => true])?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'chieu_dai')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' m',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ]);?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'chieu_rong')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' m',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ]);?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'ten_duong')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'donvi_cungcap_thongtin')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'donvi_quanly')->textInput(['maxlength' =>  true]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'tinhtrangcongtrinh_id')->dropDownList(ArrayHelper::map($model['tinhtrang_congtrinh'], 'id', 'ten'), ['prompt' => 'Chọn tình trạng công trình'])->label('Tình trạng công trình') ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'huyen_id')->dropDownList(ArrayHelper::map($model['huyen'], 'gid', 'tenhuyen'), ['prompt' => 'Chọn huyện'])->label('Huyện') ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'xa_id')->dropDownList(ArrayHelper::map($model['huyen'], 'gid', 'tenxa'), ['prompt' => 'Chọn xã'])->label('Xã') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'so_giayphep_pheduyet')->textInput(['maxlength' => true])?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?=
                                                    $form->field($model['congtrinh_thaydoi'], 'ngay_cap')->widget(DatePicker::classname(), [
                                                        'options' => ['placeholder' => 'Ngày cấp ...',
                                                            'value' => ($model['congtrinh_thaydoi']->ngay_cap != null) ? date('d-m-Y', strtotime($model['congtrinh_thaydoi']->ngay_cap)) : '',],
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'format' => 'dd-mm-yyyy'
                                                        ]
                                                    ])->label('Ngày cấp');
                                                ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'donvi_thicong')->textInput(['maxlength' =>  true]) ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'donvi_tuvan')->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'mota_diadiem')->textarea(['rows' => 4]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'tong_dientich_san')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' m²',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ]);
                                                ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'so_tang')->textInput() ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'cap_congtrinh')->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <?= $form->field($model['congtrinh_thaydoi'], 'totrinh_thamdinh')->textInput(['maxlength' => true])->label('Url tờ trình thẩm định') ?>
                                </div>
                                <div class="row">
                                    <?= $form->field($model['congtrinh_thaydoi'], 'totrinh_pheduyet')->textInput(['maxlength' => true])->label('Url tờ trình phê duyệt') ?>
                                </div>
                                <div class="row">
                                    <?= $form->field($model['congtrinh_thaydoi'], 'giayphep_pccc')->textInput(['maxlength' => true])->label('Url giấy phép phòng cháy chữa cháy') ?>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'tien_do')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="pt-4">
                                            <?= $form->field($model['congtrinh_thaydoi'], 'da_kiemtra')->checkbox(['custom' => true, 'switch' => true]) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="pt-4">
                                            <?= $form->field($model['congtrinh_thaydoi'], 'tung_vipham')->checkbox(['custom' => true, 'switch' => true]) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'khacphuc_vipham')->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'chigioi_duongbo')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'matdo_xaydung')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'ketcau_congtrinh')->textInput(['maxlength' => true]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-5">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'ban_cong')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' m²',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ]);
                                                ?>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="pt-4">
                                            <?= $form->field($model['congtrinh_thaydoi'], 'mai_nha')->checkbox(['custom' => true, 'switch' => true]) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'chieucao_mai')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' m',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ]);?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'donvipheduyet_id')->dropDownList(ArrayHelper::map($model['donvi_pheduyet'], 'id', 'ten'), ['prompt' => 'Chọn đơn vị phê duyệt'])->label('Đơn vị phê duyệt') ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'coquanthamdinh_id')->dropDownList(ArrayHelper::map($model['coquan_thamdinh'], 'id', 'ten'), ['prompt' => 'Chọn cơ quan thẩm định'])->label('Cơ quan thẩm định') ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'heso_sudung_dat')->textInput(['maxlength' => true]) ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'dientich_hienhuu')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' m²',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ]); 
                                                ?>
                                    </div>
                                    <div class="col-lg-4">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'chieucao_thongtang')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' m',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ]); 
                                                ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'mucdich_sudung')->textarea(['rows' => 4]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'sotang_ngam')->textInput() ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'sudung_thangmay')->textInput(['maxlength' =>  true]) ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'congdung_tangngam')->textarea(['rows' => 4])?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?= $form->field($model['congtrinh_thaydoi'], 'thongtin_banve_kientruc')->textarea(['rows' => 4]) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row px-3">
                        <div class="col-lg-12 form-group">
                            <button type="submit" class="btn btn-primary float-left"><i class="fa fa-save"></i> Lưu</button>

                            <a href="javascript:history.back()"
                            class="btn btn-light float-right"><i class="fa fa-arrow-left"></i> Quay lại</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
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


$requestedAction = Yii::$app->requestedAction;
$controller = $requestedAction->controller;
$const['label'] = $controller->const['label'];

$this->title = Yii::t('app', $const['label'][$requestedAction->id] . ' ' . $controller->const['title']);
$this->params['breadcrumbs'][] = ['label' => $const['label']['index'] . ' ' . $controller->const['title'], 'url' => $controller->const['url']['index']];
$this->params['breadcrumbs'][] = $const['label']['view'] . ' ' . $controller->const['title'];
?>

<script src="<?= Yii::$app->homeUrl ?>resources/core/js/ui-function.js"></script>

<?php
$form = ActiveForm::begin([
    'id' => 'update-congtrinh',
    'options' => [
        'class' => 'skin skin-square',
        'enctype' => 'multipart/form-data'
    ],
])
?>



<div class="row">
    <div class="col-lg-12">
        <div class="block block-themd">
            <ul class="nav nav-tabs nav-tabs-block" role="tablist">
                <li class="nav-item" role="presentation">
                    <?= Html::button('Thông tin chung', [
                        'type' => 'button',
                        'class' => 'nav-link active',
                        'data-bs-toggle' => 'tab',
                        'data-bs-target' => "#thongtinchung",

                    ]) ?>
                </li>
                
            </ul>
            <div class="block-content tab-content">
                <div class="tab-pane active" id="thongtinchung">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block block-bordered">
                                <div class="block-content block-content-full ribbon ribbon-primary ribbon-left">
                                    <div class="ribbon-box">
                                        Thông tin công trình
                                    </div>
                                    <div class="pt-5">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($model['congtrinh'], 'ten', ['inputOptions' => ['autofocus' => 'autofocus', 'class' => 'form-control']])->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'loaicongtrinh_id')->dropDownList(ArrayHelper::map($model['loaicongtrinh'], 'id', 'ten'), ['prompt' => 'Chọn loại công trình'])->label('Loại công trình') ?>
                                            </div>
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'loaidat_id')->dropDownList(ArrayHelper::map($model['loaidat'], 'id', 'ten'), ['prompt' => 'Chọn loại đất'])->label('Loại dất') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'so_biennhan_hoso')->textInput(['maxlength' => true])?>
                                            </div>
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'ma')->textInput(['maxlength' => true])?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'so_to')->textInput(['maxlength' => true])?>
                                            </div>
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'so_thua')->textInput(['maxlength' => true])?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'chieu_dai')->widget(NumberControl::classname(), [
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
                                                <?= $form->field($model['congtrinh'], 'chieu_rong')->widget(NumberControl::classname(), [
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
                                                <?= $form->field($model['congtrinh'], 'ten_duong')->textInput(['maxlength' => true])?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'donvi_cungcap_thongtin')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'donvi_quanly')->textInput(['maxlength' =>  true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'tinhtrangcongtrinh_id')->dropDownList(ArrayHelper::map($model['tinhtrang_congtrinh'], 'id', 'ten'), ['prompt' => 'Chọn tình trạng công trình'])->label('Tình trạng công trình') ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'huyen_id')->dropDownList(ArrayHelper::map($model['huyen'], 'gid', 'tenhuyen'), ['prompt' => 'Chọn huyện'])->label('Huyện') ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'xa_id')->dropDownList(ArrayHelper::map($model['xa'], 'gid', 'tenxa'), ['prompt' => 'Chọn xã'])->label('Xã') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'so_giayphep_pheduyet')->textInput(['maxlength' => true])?>
                                            </div>
                                            <div class="col-lg-6">
                                                <?=
                                                    $form->field($model['congtrinh'], 'ngay_cap')->widget(DatePicker::classname(), [
                                                        'options' => ['placeholder' => 'Ngày cấp ...',
                                                            'value' => ($model['congtrinh']->ngay_cap != null) ? date('d-m-Y', strtotime($model['congtrinh']->ngay_cap)) : '',],
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
                                                <?= $form->field($model['congtrinh'], 'donvi_thicong')->textInput(['maxlength' =>  true]) ?>
                                            </div>
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'donvi_tuvan')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($model['congtrinh'], 'mota_diadiem')->textarea(['rows' => 4]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'tong_dientich_san')->widget(NumberControl::classname(), [
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
                                                <?= $form->field($model['congtrinh'], 'so_tang')->textInput() ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'cap_congtrinh')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?= $form->field($model['congtrinh'], 'totrinh_thamdinh')->textInput(['maxlength' => true])->label('Url tờ trình thẩm định') ?>
                                        </div>
                                        <div class="row">
                                            <?= $form->field($model['congtrinh'], 'totrinh_pheduyet')->textInput(['maxlength' => true])->label('Url tờ trình phê duyệt') ?>
                                        </div>
                                        <div class="row">
                                            <?= $form->field($model['congtrinh'], 'giayphep_pccc')->textInput(['maxlength' => true])->label('Url giấy phép phòng cháy chữa cháy') ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'tien_do')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="pt-4">
                                                    <?= $form->field($model['congtrinh'], 'da_kiemtra')->checkbox(['custom' => true, 'switch' => true]) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="pt-4">
                                                    <?= $form->field($model['congtrinh'], 'tung_vipham')->checkbox(['custom' => true, 'switch' => true]) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'khacphuc_vipham')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'chigioi_duongbo')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'matdo_xaydung')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'ketcau_congtrinh')->textInput(['maxlength' => true]) ?> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-5">
                                                <?= $form->field($model['congtrinh'], 'ban_cong')->widget(NumberControl::classname(), [
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
                                                    <?= $form->field($model['congtrinh'], 'mai_nha')->checkbox(['custom' => true, 'switch' => true]) ?>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <?= $form->field($model['congtrinh'], 'chieucao_mai')->widget(NumberControl::classname(), [
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
                                                <?= $form->field($model['congtrinh'], 'donvipheduyet_id')->dropDownList(ArrayHelper::map($model['donvi_pheduyet'], 'id', 'ten'), ['prompt' => 'Chọn đơn vị phê duyệt'])->label('Đơn vị phê duyệt') ?>
                                            </div>
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'coquanthamdinh_id')->dropDownList(ArrayHelper::map($model['coquan_thamdinh'], 'id', 'ten'), ['prompt' => 'Chọn cơ quan thẩm định'])->label('Cơ quan thẩm định') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'heso_sudung_dat')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['congtrinh'], 'dientich_hienhuu')->widget(NumberControl::classname(), [
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
                                                <?= $form->field($model['congtrinh'], 'chieucao_thongtang')->widget(NumberControl::classname(), [
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
                                                <?= $form->field($model['congtrinh'], 'mucdich_sudung')->textarea(['rows' => 4]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'sotang_ngam')->textInput() ?> 
                                            </div>
                                            <div class="col-lg-6">
                                                <?= $form->field($model['congtrinh'], 'sudung_thangmay')->textInput(['maxlength' =>  true]) ?> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($model['congtrinh'], 'congdung_tangngam')->textarea(['rows' => 4])?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($model['congtrinh'], 'thongtin_banve_kientruc')->textarea(['rows' => 4]) ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-content block-content-full ribbon ribbon-primary ribbon-left">
                                    <div class="ribbon-box">
                                        Thông tin chủ đầu tư
                                    </div>
                                    <div class="pt-5">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($model['chudautu'], 'ten')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['chudautu'], 'cccd_cmnd')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($model['chudautu'], 'so_dienthoai')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?= $form->field($model['chudautu'], 'dia_chi')->textInput(['maxlength' => true]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-3">
                    <div class="col-lg-12 form-group">
                        <button type="submit" class="btn btn-primary float-start"><i class="fa fa-save"></i> Lưu</button>

                        <a href="javascript:history.back()"
                        class="btn btn-light float-end"><i class="fa fa-arrow-left"></i> Quay lại</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php ActiveForm::end(); ?>



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
                                        Thông tin dự án
                                    </div>
                                    <div class="pt-5">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($duan, 'ten')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'so_to')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'so_thua')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'xa_id')->widget(Select2::className(), [
                                                    'data' => ArrayHelper::map($categories['xa'], 'id', 'ten'),
                                                    'options' => ['prompt' => 'Chọn xã'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])->label('Xã') ?>    
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'huyen_id')->widget(Select2::className(), [
                                                    'data' => ArrayHelper::map($categories['huyen'], 'id', 'ten'),
                                                    'options' => ['prompt' => 'Chọn huyện'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])->label('Huyện') ?>  
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'khu_vuc')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'quyetdinh_giaodat')->textInput(['maxlength' => true])->label('Quyết định giao đất số') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?=
                                                    $form->field($duan, 'ngay_giao')->widget(DatePicker::classname(), [
                                                        'options' => ['placeholder' => 'Ngày giao ...',
                                                            'value' => ($duan->ngay_giao != null) ? date('d-m-Y', strtotime($duan->ngay_giao)) : '',],
                                                        'pluginOptions' => [
                                                            'autoclose' => true,
                                                            'format' => 'dd-mm-yyyy'
                                                        ]
                                                    ])->label('Ngày giao');
                                                ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'tinhtrangduan_id')->widget(Select2::className(), [
                                                    'data' => ArrayHelper::map($categories['tinhtrangduan'], 'id', 'ten'),
                                                    'options' => ['prompt' => 'Chọn tình trạng dự án'],
                                                    'pluginOptions' => [
                                                        'allowClear' => true
                                                    ],
                                                ])->label('Tình trạng dự án') ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($duan, 'dia_diem')->textInput(['maxlength' =>  true]) ?>
                                            </div>
                                            <div class="col-lg-12">
                                                <?= $form->field($duan, 'phaply_quyhoach')->textarea() ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'quymo_dientich')->widget(NumberControl::classname(), [
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
                                                <?= $form->field($duan, 'quymo_danso')->textInput(['type' => 'number']) ?>
                                            </div>
                                            <div class="col-lg-2 mt-3">
                                                <?= $form->field($duan, 'bangiao_hatang_kythuat')->checkbox(['custom' => true, 'switch' => true]) ?>
                                            </div>
                                            <div class="col-lg-2 mt-3">
                                                <?= $form->field($duan, 'bangiao_hatang_xahoi')->checkbox(['custom' => true, 'switch' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'hientrang_dautu_hiennay')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' %',
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
                                                <?= $form->field($duan, 'tile_boithuong')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' %',
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
                                                <?= $form->field($duan, 'nha_o')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' %',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ])->label('Tỉ lệ nhà ở');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <?= $form->field($duan, 'hatang_kythuat')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' %',
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
                                                <?= $form->field($duan, 'cong_vien')->widget(NumberControl::classname(), [
                                                    'maskedInputOptions' => [
                                                        'suffix' => ' %',
                                                        'allowMinus' => false,
                                                        'alias' => 'decimal',
                                                        'groupSeparator' => '.',
                                                        'radixPoint' => ',',
                                                        'autoGroup' => true,
                                                        'removeMaskOnSubmit' => true
                                                    ],
                                                ])->label('Tỉ lệ công viên');
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($duan, 'hatang_xahoi')->textarea() ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($duan, 'dinhhuong_quanly')->textarea() ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($duan, 'khokhan_vuongmac')->textarea() ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <?= $form->field($duan, 'dexuat_kiennghi')->textarea() ?>
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
                                                <?= $form->field($chudautu, 'ten')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($chudautu, 'cccd_cmnd')->textInput(['maxlength' => true]) ?>
                                            </div>
                                            <div class="col-lg-4">
                                                <?= $form->field($chudautu, 'so_dienthoai')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <?= $form->field($chudautu, 'dia_chi')->textInput(['maxlength' => true]) ?>
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
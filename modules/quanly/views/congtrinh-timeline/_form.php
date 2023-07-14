<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\modules\quanly\models\DonViKinhTe */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
    $form = ActiveForm::begin([
        'id' => 'form-congtrinh-timeline',
        'options' => [
            'class' => 'skin skin-square',
            'enctype' => 'multipart/form-data'
        ],
    ])
?>

<div class="block block-themed">
    <div class="block-header">
        <h3 class="block-title">
            <?= $congtrinhTimeline->isNewRecord ? 'Thêm mới thông tin công trình timeline':'Cập nhập thông tin công trình time line' ?>
        </h3>
    </div>
    <div class="block-content">
        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($congtrinhTimeline, 'so_giayphep')->input('text') ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($congtrinhTimeline, 'ngay_cap')->widget(DatePicker::classname(), [
                    'options' => [
                    'placeholder' => 'Ngày cấp...',
                    'value' => ($congtrinhTimeline->ngay_cap != null) ? date('d-m-Y', strtotime($congtrinhTimeline->ngay_cap)) : '',
                    ],
                    'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                    ]
                ])->label('Ngày cấp'); 
                ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($congtrinhTimeline, 'loaigiayphep_id')->widget(Select2::className(), [
                    'data' => ArrayHelper::map($model['loaigiayphep'], 'id', 'ten'),
                    'options' => ['prompt' => 'Chọn loại giấy phép'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Loại giấy phép') 
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <?= $form->field($congtrinhTimeline, 'tinhtranggiayphep_id')->widget(Select2::className(), [
                    'data' => ArrayHelper::map($model['tinhtranggiayphep'], 'id', 'ten'),
                    'options' => ['prompt' => 'Chọn tình trạng giấy phép'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Tình trạng giấy phép') 
                ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($congtrinhTimeline, 'donvicapphep_id')->widget(Select2::className(), [
                    'data' => ArrayHelper::map($model['donvicapphep'], 'id', 'ten'),
                    'options' => ['prompt' => 'Chọn đơn vị giấy phép'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ])->label('Đơn vị giấy phép') 
                ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($congtrinhTimeline, 'thoi_han')->widget(DatePicker::classname(), [
                    'options' => [
                    'placeholder' => 'Ngày cấp...',
                    'value' => ($congtrinhTimeline->thoi_han != null) ? date('d-m-Y', strtotime($congtrinhTimeline->thoi_han)) : '',
                    ],
                    'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-mm-yyyy'
                    ]
                ])->label('Thời hạn'); 
                ?>
            </div>
        </div>
        <div class="row">
                <div class="col-lg-12">
                    <?= $form->field($congtrinhTimeline, 'ly_do')->input('text') ?>
                </div>
            </div>
        <div class="row px-3">
                <div class="col-lg-12 form-group">
                    <button type="submit" class="btn btn-primary float-start"><i class="fa fa-save"></i> Lưu</button>

                    <a href="javascript:history.back()" class="btn btn-light float-end"><i class="fa fa-arrow-left"></i>
                        Quay lại</a>
                </div>
            </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
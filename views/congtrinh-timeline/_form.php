<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;

?>

<div class="congtrinh-timeline-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'so_giayphep')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngay_cap')->textInput() ?>

    <?= $form->field($model, 'congtrinh_id')->textInput() ?>

    <?= $form->field($model, 'loaigiayphep_id')->textInput() ?>

    <?= $form->field($model, 'tinhtranggiayphep_id')->textInput() ?>

    <?= $form->field($model, 'ly_do')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'thoi_han')->textInput() ?>

    <?= $form->field($model, 'donvicapphep_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>

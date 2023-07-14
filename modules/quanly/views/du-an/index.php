<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap5\Modal;
use app\widgets\crud\CrudAsset;
use app\widgets\export\ExportMenu;
use app\widgets\gridview\GridView;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\quanly\models\DuAnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = (isset($const['title'])) ? $const['title'] : 'Dự án';
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);

?>
<div class="du-an-index">
    <div id="ajaxCrudDatatable">
        <?php $fullExportMenu = ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $searchModel->getExportColumns(),
            'target' => ExportMenu::TARGET_BLANK,
            'pjaxContainerId' => 'kv-pjax-container',
            'exportContainer' => [
                'class' => 'btn-group me-2'
            ],
            'exportConfig' => [
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_EXCEL => false,
                ExportMenu::FORMAT_PDF => false,
            ],
            'columnSelectorOptions' => ['class' => 'btn btn-outline-info','label' => 'Chọn cột'],
            'dropdownOptions' => [
                'label' => 'XUẤT FILE',
                'itemsBefore' => [
                    '<div class="dropdown-header">Xuất tất cả dữ liệu</div>',
                ],
            ],
        ]) ?>
        <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax'=>true,
            'columns' => require(__DIR__.'/_columns.php'),
            'export' => false,
            'toolbar'=> [
                $fullExportMenu,
                ['content'=>
                    Html::a('<i class="fa fa-plus"></i> Thêm mới', ['create'],
                    ['title'=> 'Thêm mới ','class'=>'btn btn-success'])
                ],
            ],          
            'striped' => true,
            'condensed' => true,
            'responsive' => false,
            'panelPrefix' => 'block ',
            'panel' => [
                'type' => ' block-themed',
                'headingOptions' => ['class' => 'block-header d-block'],
                'heading' => '<i class="fa fa-list"></i> ' .  $this->title,
                'footerOptions' => ['class' => 'ps-4 pb-3']
            ]
        ])?>
    </div>
</div>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "size" => Modal::SIZE_LARGE,
    "footer"=>"",// always need it for jquery plugin
])?>
<?php Modal::end(); ?>

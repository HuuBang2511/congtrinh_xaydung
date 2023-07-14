<?php

/**
 * Created by PhpStorm.
 * User: Duc
 * Date: 7/3/2021
 * Time: 9:00 PM
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->title = 'Quản lý đơn vị kinh tế';
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <link rel="shortcut icon" href="<?= Yii::$app->homeUrl?>favicon.ico" type="image/x-icon">
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if(Yii::$app->controller->id == 'map'):?>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAVofCmO1bDdRaP5bMhwrZ-pEAi9AEhAgQ&libraries=places&regions=country:vn"></script>
        <?php endif?>
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>
    <div id="page-container" class="page-header-dark">
        <div id="page-overlay"></div>
        <?php include('header.php'); ?>
        <main id="main-container">
            <?php include('menu.php'); ?>
            <div class="<?= Yii::$app->controller->module->id == 'map' ? 'content-full' : 'content'?>">
                <?php if (isset($this->params['breadcrumbs'])) : ?>
                    <div class="block">
                        <div class="col-lg-12">
                            <nav aria-label="breadcrumb">
                                <?=
                                Breadcrumbs::widget([
                                    'tag' => 'ol',
                                    'homeLink' => [
                                        'label' => Html::encode(Yii::t('yii', 'Trang chủ')),
                                        'url' => Yii::$app->urlManager->createUrl(''),
                                        'encode' => false,
                                    ],
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                    'itemTemplate' => "<li class='breadcrumb-item'>{link}</li>",
                                    'activeItemTemplate' => "<li class='active breadcrumb-item'>{link}</li>",
                                    'options' => [
                                        'class' => 'breadcrumb text-uppercase py-2 px-4',
                                    ]
                                ])
                                ?>
                            </nav>
                        </div>
                    </div>
                <?php endif; ?>
                <?= $content ?>
            </div>
        </main>
        <?php if(Yii::$app->controller->module->id != 'map'):?>
            <?php include('footer.php'); ?>
        <?php endif?>
    </div>



    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>

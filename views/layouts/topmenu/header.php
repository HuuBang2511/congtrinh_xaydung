<header id="page-header" class="bg-primary-darker">
    <div class="content-header">
        <div class="d-flex align-items-center h-100 pb-2">
            <a class="text-center h-100" href="<?= Yii::$app->homeUrl ?>">
                <img src="<?= Yii::$app->homeUrl .Yii::$app->params['logoUrl']?>" width="100%"
                     alt="logo" class="h-100">
            </a>
        </div>
        <div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn btn-light" id="page-header-user-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block"><?= (!Yii::$app->user->isGuest) ? Yii::$app->user->identity->username : 'Admin' ?></span>
                    <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">

                    <div class="p-2">
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['quanly/taikhoan/thong-tin-ca-nhan']) ?>">
                            <i class="far fa-fw fa-user mr-1"></i> Thông tin cá nhân
                        </a>
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['quanly/taikhoan/doi-mat-khau']) ?>">
                            <i class="fa fa-key mr-1"></i> Đổi mật khẩu
                        </a>
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['quanly/taikhoan/danh-sach']) ?>">
                            <i class="fa fa-users mr-1"></i> Quản lý tài khoản
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['quanly/tin-tuc/index']) ?>">
                            <i class="fa fa-newspaper mr-1"></i> Quản lý tin tức
                        </a>
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['quanly/da-phuong-tien/index']) ?>">
                            <i class="fa fa-video mr-1"></i> Quản lý video
                        </a>
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['danhmuc/linh-vuc/index']) ?>">
                            <i class="fa fa-list mr-1"></i> Quản lý lĩnh vực
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['quanly/doanh-nghiep/trash']) ?>">
                            <i class="fa fa-trash mr-1"></i> Doanh nghiệp đã xóa
                        </a>
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['quanly/ho-kinh-doanh/trash']) ?>">
                            <i class="fa fa-trash mr-1"></i> Hộ kinh doanh đã xóa
                        </a>
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item"
                           href="<?= Yii::$app->urlManager->createUrl(['user/auth/logout']) ?>">
                            <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Đăng xuất
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div id="page-header-search" class="overlay-header bg-header-dark">
        <div class="content-header">
            <form class="w-100" action="be_pages_generic_search.html" method="POST">
                <div class="input-group">
                    <button type="button" class="btn btn-primary" data-toggle="layout" data-action="header_search_off">
                        <i class="fa fa-fw fa-times-circle"></i>
                    </button>
                    <input type="text" class="form-control" placeholder="Search your websites.."
                           id="page-header-search-input" name="page-header-search-input">
                </div>
            </form>
        </div>
    </div>
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header">
            <div class="w-100 text-center">
                <i class="fa fa-fw fa-2x fa-spinner fa-spin text-white"></i>
            </div>
        </div>
    </div>
</header>


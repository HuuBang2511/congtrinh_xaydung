<?php 

namespace app\views\layouts\topmenu;

class menulist{
    public static $adminSidebar = [
        [
            'name' => 'Bản đồ',
            'icon' => 'fa fa-map-marked-alt',
            'url' => '/map'
        ],
        [
            'name' => 'Công trình',
            'icon' => 'fa fa-list',
            'url' => '',
            'items' => [
                [
                    'name' => 'Danh sách công trình',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/cong-trinh/index'
                ],
                
                [
                    'name' => 'Tìm kiếm công trình',
                    'icon' => 'fa fa-plus',
                    'url' => '/quanly/cong-trinh/timkiem'
                ],
                [
                    'name' => 'Kiểm tra điều kiện đăng ký kinh doanh',
                    'icon' => 'fa fa-plus',
                    'url' => '/quanly/kiem-tra-dieu-kien-kinh-doanh/index'
                ],
                [
                    'name' => 'divider',
                ],
                [
                    'name' => 'Doanh nghiệp',
                    'icon' => 'fa fa-briefcase',
                    'url' => 'quanly/don-vi-kinh-te/index?DonViKinhTeSearch[loaidonvikinhte_id]=1'
                ],
                [
                    'name' => 'Hộ kinh doanh',
                    'icon' => 'fa fa-house',
                    'url' => 'quanly/don-vi-kinh-te/index?DonViKinhTeSearch[loaidonvikinhte_id]=2'
                ],
                [
                    'name' => 'Import đơn vị kinh tế',
                    'icon' => 'fa-solid fa-file-import',
                    'url' => 'quanly/don-vi-kinh-te/import'
                ],
                [
                    'name' => 'divider',
                ],
                [
                    'name' => 'Giấy đủ điều kiện',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/donvikinhte-dudieukien/index'
                ],
                [
                    'name' => 'Thông tin thuế',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thong-tin-thue/index'
                ],
                [
                    'name' => 'Hậu kiểm',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thongtin-kiemtra/index'
                ],
                [
                    'name' => 'Vi phạm',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thongtin-vipham/index'
                ],
                [
                    'name' => 'Thành tích, khen thưởng',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thongtin-khenthuong/index'
                ],
                [
                    'name' => 'Thông tin lao động',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thongtin-laodong/index'
                ],
            ]
        ],
        [
            'name' => 'Danh mục',
            'icon' => 'fa fa-list',
            'url' => '',
            'items' => [
                [
                    'name' => 'Dân tộc',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/dan-toc/'
                ],
                [
                    'name' => 'Giới tính',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/gioi-tinh/'
                ],
                [
                    'name' => 'Lĩnh vực',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/linh-vuc/'
                ],
                [
                    'name' => 'Loại doanh nghiệp',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/loai-doanh-nghiep/'
                ],
                [
                    'name' => 'Loại đơn vị kinh tế',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/loai-don-vi-kinh-te/'
                ],
                [
                    'name' => 'Loại giấy đủ điều kiện',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/giay-du-dieu-kien/'
                ],
                [
                    'name' => 'Loại giấy tờ chứng thực',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/loai-giay-to/'
                ],
                [
                    'name' => 'Loại hình doanh nghiệp',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/loai-hinh-doanh-nghiep/'

                ],
                
                [
                    'name' => 'Ngành nghề',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/nganh-nghe/'

                ],
                
                [
                    'name' => 'Quốc tịch',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/quoc-tich/'

                ],                
                [
                    'name' => 'Tình trạng hoạt động',
                    'icon' => 'fa fa-list',
                    'url' => '/danhmuc/tinh-trang-hoat-dong/'

                ],
            ],
        ], [
            'name' => 'Báo cáo, Thống kê',
            'icon' => 'fa fa-bar-chart',
            'items' => [
                [
                    'name' => 'Tổng hợp số liệu',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/don-vi-kinh-te/statistic'
                ],
                [
                    'name' => 'Cấp mới giấy CNĐK',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/don-vi-kinh-te/thongke-dkkd?DonViKinhTeSearch[loai_dkkd]=1'
                ],
                [
                    'name' => 'Thay đổi giấy CNĐK',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/donvikinhte-dudieukien/statistic?DonvikinhteDudieukienSearch[loaigiayphep_id]=2'
                ],
                [
                    'name' => 'Cấp lại giấy CNĐK',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/don-vi-kinh-te/thongke-dkkd?DonViKinhTeSearch[loai_dkkd]=2'
                ],
                [
                    'name' => 'Thu hồi giấy CNĐK',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/donvikinhte-dudieukien/statistic?DonvikinhteDudieukienSearch[loaigiayphep_id]=4'
                ],
                [
                    'name' => 'Ngưng hoạt động',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/don-vi-kinh-te/statistic?DonViKinhTe[tinhtranghoatdong_id]=6'
                ],
                [
                    'name' => 'Tạm ngưng hoạt động',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/don-vi-kinh-te/statistic?DonViKinhTe[tinhtranghoatdong_id]=7'
                ],
                [
                    'name' => 'Lũy kế',
                    'icon' => 'fa fa-list',
                    'url' => '/thongke/kehoach/index'
                ],
                [
                    'name' => 'Thông tin vi phạm',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thongtin-vipham/statistic'
                ],
                [
                    'name' => 'Thông tin thành tích, khen thưởng',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thongtin-khenthuong/statistic',
                ],
                [
                    'name' => 'Thông tin lao động',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thongtin-laodong/statistic',
                ],
                [
                    'name' => 'Thông tin thuế',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/thong-tin-thue/statistic'
                ],
            ],
        ],
        [
            'name' => 'Tin tức',
            'icon' => 'fa fa-newspaper',
            'items' => [
                [
                    'name' => 'Quản lý tin tức',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/tin-tuc'
                ],
                [
                    'name' => 'Quản lý video',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/video'
                ],
                [
                    'name' => 'Quản lý hình ảnh',
                    'icon' => 'fa fa-list',
                    'url' => '/quanly/hinh-anh'
                ],
            ],

        ],
        [
            'name' => 'Quản trị hệ thống',
            'icon' => 'fa fa-cogs',
            'items' => [
                [
                    'name' => 'Quản lý người dùng',
                    'icon' => 'fa-users',
                    'url' => '/user/auth-user'
                ],
                [
                    'name' => 'Quản lý nhóm quyền',
                    'icon' => 'fa-th-list',
                    'url' => '/user/auth-group'
                ],
                [
                    'name' => 'Quản lý quyền truy cập',
                    'icon' => 'fa-th-list',
                    'url' => '/user/auth-role'
                ],
                [
                    'name' => 'Quản lý hành động',
                    'icon' => 'fa-th-list',
                    'url' => '/user/auth-action'
                ],
                [
                    'name' => 'Quản lý hoạt động người dùng',
                    'icon' => 'fa-th-list',
                    'url' => '/activity'
                ]
            ],

        ],
    ];
}
?>
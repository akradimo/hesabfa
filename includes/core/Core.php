<?php
namespace Hesabfa\Core;

class Core {
    public static function init() {
        // بارگذاری منوهای اداری
        add_action('admin_menu', [self::class, 'add_admin_menu']);
    }

    public static function add_admin_menu() {
        add_menu_page(
            'حسابفا',
            'حسابفا',
            'manage_options',
            'hesabfa',
            [self::class, 'render_main_page'],
            'dashicons-calculator',
            6
        );

        add_submenu_page(
            'hesabfa',
            'محصولات',
            'محصولات',
            'manage_options',
            'hesabfa-products',
            [self::class, 'handle_products_page']
        );
    }

    public static function handle_products_page() {
        $controller = new \Hesabfa\Controllers\ProductController();

        $action = isset($_GET['action']) ? sanitize_text_field($_GET['action']) : 'list';
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        switch ($action) {
            case 'add':
                $controller->add();
                break;
            case 'edit':
                $controller->edit($id);
                break;
            case 'delete':
                $controller->delete($id);
                break;
            default:
                $controller->list();
                break;
        }
    }

    public static function render_main_page() {
        // اینجا می‌توانید محتوای صفحه اصلی را رندر کنید
        echo '<h1>خوش آمدید به حسابفا</h1>';
    }
}
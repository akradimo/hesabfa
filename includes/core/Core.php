<?php
namespace Hesabfa\Core;

class Core {
    public static function init() {
        // بارگذاری منوهای مدیریتی
        add_action('admin_menu', [self::class, 'add_admin_menu']);

        // بارگذاری استایل‌ها و اسکریپت‌ها
        add_action('admin_enqueue_scripts', [self::class, 'enqueue_scripts']);
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

    public static function enqueue_scripts() {
        wp_enqueue_style('hesabfa-styles', HESABFA_PLUGIN_URL . 'assets/css/styles.css');
        wp_enqueue_script('hesabfa-scripts', HESABFA_PLUGIN_URL . 'assets/js/scripts.js', ['jquery'], null, true);
    }

    public static function render_main_page() {
        echo '<h1>خوش آمدید به حسابفا</h1>';
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
}
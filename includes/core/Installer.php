<?php
namespace Hesabfa\Core;

class Installer {
    public static function activate() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();

        // ایجاد جدول محصولات
        $table_name_products = $wpdb->prefix . 'hesabfa_products';
        $sql_products = "CREATE TABLE $table_name_products (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            name varchar(255) NOT NULL,
            code varchar(100) NOT NULL,
            price decimal(10,2) NOT NULL,
            stock int NOT NULL,
            created_at datetime NOT NULL,
            updated_at datetime NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql_products);
    }

    public static function deactivate() {
        // غیرفعال‌سازی پلاگین
    }

    public static function uninstall() {
        global $wpdb;

        // حذف جدول محصولات
        $table_name_products = $wpdb->prefix . 'hesabfa_products';
        $wpdb->query("DROP TABLE IF EXISTS $table_name_products");
    }
}
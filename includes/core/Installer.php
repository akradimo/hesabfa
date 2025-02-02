<?php
namespace Hesabfa\Core;

class Installer {
    public static function activate() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();


        // ایجاد جدول محصولات
        $table_name_products = $wpdb->prefix . 'hesabfa_products';
        /** @var TYPE_NAME $charset_collate */
        $sql_products = "CREATE TABLE $table_name_products (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        code varchar(100) NOT NULL,
        price decimal(10,2) NOT NULL,
        stock int NOT NULL,
        group_name varchar(255),
        subgroup_name varchar(255),
        serial varchar(100),
        barcode varchar(100),
        barcode2 varchar(100),
        unit varchar(50),
        initial_stock int,
        purchase_price decimal(10,2),
        shop_purchase_price decimal(10,2),
        purchase_discount decimal(10,2),
        sale_price decimal(10,2),
        shop_sale_price decimal(10,2),
        sale_discount decimal(10,2),
        tax_rate decimal(5,2),
        description text,
        created_at datetime NOT NULL,
        updated_at datetime NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

        $table_name_groups = $wpdb->prefix . 'hesabfa_product_groups';
        $sql_groups = "CREATE TABLE $table_name_groups (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        parent_id mediumint(9),
        created_at datetime NOT NULL,
        updated_at datetime NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

        // ایجاد جدول واحدها
        $table_name_units = $wpdb->prefix . 'hesabfa_units';
        $sql_units = "CREATE TABLE $table_name_units (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
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

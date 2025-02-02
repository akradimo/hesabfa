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

        // ایجاد جدول گروه محصولات
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

        // ایجاد جدول خدمات
        $table_name_services = $wpdb->prefix . 'hesabfa_services';
        $sql_services = "CREATE TABLE $table_name_services (  
            id mediumint(9) NOT NULL AUTO_INCREMENT,  
            name varchar(255) NOT NULL,  
            code varchar(100) NOT NULL,  
            price decimal(10,2) NOT NULL,  
            description text NOT NULL,  
            created_at datetime NOT NULL,  
            updated_at datetime NOT NULL,  
            PRIMARY KEY (id)  
        ) $charset_collate;";
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

        // ایجاد جدول خدمات
        $table_name_services = $wpdb->prefix . 'hesabfa_services';
        $sql_services = "CREATE TABLE $table_name_services (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        code varchar(100) NOT NULL,
        price decimal(10,2) NOT NULL,
        description text NOT NULL,
        created_at datetime NOT NULL,
        updated_at datetime NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

        // ایجاد جدول فاکتورها
        $table_name_invoices = $wpdb->prefix . 'hesabfa_invoices';
        $sql_invoices = "CREATE TABLE $table_name_invoices (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        customer_name varchar(255) NOT NULL,
        total_amount decimal(10,2) NOT NULL,
        created_at datetime NOT NULL,
        updated_at datetime NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql_products);
        dbDelta($sql_invoices);
        dbDelta($sql_groups);
        dbDelta($sql_units);
        dbDelta($sql_services); // اجرای کد ایجاد جدول خدمات
    }

    public static function deactivate() {
        // غیرفعال‌سازی پلاگین
    }

    public static function uninstall() {
        global $wpdb;

        // حذف جدول محصولات
        $table_name_products = $wpdb->prefix . 'hesabfa_products';
        $wpdb->query("DROP TABLE IF EXISTS $table_name_products");

        // حذف جدول خدمات
        $table_name_services = $wpdb->prefix . 'hesabfa_services';
        $wpdb->query("DROP TABLE IF EXISTS $table_name_services");

        // حذف جدول گروه محصولات
        $table_name_groups = $wpdb->prefix . 'hesabfa_product_groups';
        $wpdb->query("DROP TABLE IF EXISTS $table_name_groups");

        // حذف جدول واحدها
        $table_name_units = $wpdb->prefix . 'hesabfa_units';
        $wpdb->query("DROP TABLE IF EXISTS $table_name_units");
    }
}
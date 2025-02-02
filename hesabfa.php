<?php
/*
Plugin Name: حسابفا
Description: یک پلاگین حسابداری پیشرفته برای وردپرس
Version: 1.0
Author: شما
*/

// جلوگیری از دسترسی مستقیم
if (!defined('ABSPATH')) {
    exit;
}

// تعریف ثابت‌ها
define('HESABFA_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('HESABFA_PLUGIN_URL', plugin_dir_url(__FILE__));

// بارگذاری فایل‌های ضروری
require_once HESABFA_PLUGIN_DIR . 'includes/core/Core.php';
require_once HESABFA_PLUGIN_DIR . 'includes/core/Installer.php';

// فعال‌سازی پلاگین
register_activation_hook(__FILE__, ['Hesabfa\Core\Installer', 'activate']);

// غیرفعال‌سازی پلاگین
register_deactivation_hook(__FILE__, ['Hesabfa\Core\Installer', 'deactivate']);

// حذف پلاگین
register_uninstall_hook(__FILE__, ['Hesabfa\Core\Installer', 'uninstall']);

// شروع پلاگین
add_action('plugins_loaded', function () {
    Hesabfa\Core\Core::init();
});
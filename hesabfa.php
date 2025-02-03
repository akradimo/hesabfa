<?php
/*
Plugin Name: Hesabfa
Description: A custom accounting plugin for managing products.
Version: 1.0
Author: Your Name
*/

// فعال‌سازی پلاگین و ایجاد جدول دیتابیس
function hesabfa_activate() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'hesabfa_products';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        product_group varchar(255) NOT NULL,
        product_subgroup varchar(255) NOT NULL,
        product_name varchar(255) NOT NULL,
        serial varchar(255) NOT NULL,
        barcode varchar(255) NOT NULL,
        barcode2 varchar(255) NOT NULL,
        unit varchar(255) NOT NULL,
        initial_stock int(11) NOT NULL,
        purchase_price decimal(10,3) NOT NULL,
        shop_purchase_price decimal(10,3) NOT NULL,
        purchase_discount decimal(10,3) NOT NULL,
        sale_price decimal(10,3) NOT NULL,
        shop_sale_price decimal(10,3) NOT NULL,
        sale_discount decimal(10,3) NOT NULL,
        tax_percentage decimal(5,2) NOT NULL,
        description text NOT NULL,
        date date NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'hesabfa_activate');

// افزودن منو به پیشخوان وردپرس
function hesabfa_admin_menu() {
    add_menu_page(
        'Hesabfa', // عنوان صفحه
        'Hesabfa', // عنوان منو
        'manage_options', // سطح دسترسی
        'hesabfa', // اسلاگ منو
        'hesabfa_admin_page', // تابع نمایش صفحه
        'dashicons-calculator', // آیکون
        6 // موقعیت منو
    );
}
add_action('admin_menu', 'hesabfa_admin_menu');

// افزودن فایل‌های CSS و JavaScript
function hesabfa_enqueue_scripts() {
    // افزودن Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

    // افزودن Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // افزودن CSS اختصاصی
    wp_enqueue_style('hesabfa-style', plugin_dir_url(__FILE__) . 'css/style.css');

    // افزودن JS اختصاصی
    wp_enqueue_script('hesabfa-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
}
add_action('admin_enqueue_scripts', 'hesabfa_enqueue_scripts');

// تابع نمایش صفحه مدیریت
function hesabfa_admin_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'hesabfa_products';

    // ذخیره ورودی جدید
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $product_group = sanitize_text_field($_POST['product_group']);
        $product_subgroup = sanitize_text_field($_POST['product_subgroup']);
        $product_name = sanitize_text_field($_POST['product_name']);
        $serial = sanitize_text_field($_POST['serial']);
        $barcode = sanitize_text_field($_POST['barcode']);
        $barcode2 = sanitize_text_field($_POST['barcode2']);
        $unit = sanitize_text_field($_POST['unit']);
        $initial_stock = intval($_POST['initial_stock']);
        $purchase_price = floatval($_POST['purchase_price']);
        $shop_purchase_price = floatval($_POST['shop_purchase_price']);
        $purchase_discount = floatval($_POST['purchase_discount']);
        $sale_price = floatval($_POST['sale_price']);
        $shop_sale_price = floatval($_POST['shop_sale_price']);
        $sale_discount = floatval($_POST['sale_discount']);
        $tax_percentage = floatval($_POST['tax_percentage']);
        $description = sanitize_text_field($_POST['description']);
        $date = sanitize_text_field($_POST['date']);

        $wpdb->insert(
            $table_name,
            array(
                'product_group' => $product_group,
                'product_subgroup' => $product_subgroup,
                'product_name' => $product_name,
                'serial' => $serial,
                'barcode' => $barcode,
                'barcode2' => $barcode2,
                'unit' => $unit,
                'initial_stock' => $initial_stock,
                'purchase_price' => $purchase_price,
                'shop_purchase_price' => $shop_purchase_price,
                'purchase_discount' => $purchase_discount,
                'sale_price' => $sale_price,
                'shop_sale_price' => $shop_sale_price,
                'sale_discount' => $sale_discount,
                'tax_percentage' => $tax_percentage,
                'description' => $description,
                'date' => $date,
            )
        );
        echo '<div class="updated"><p>ورودی جدید ذخیره شد!</p></div>';
    }

    // نمایش فرم
    ?>
    <div class="wrap">
        <h1 class="mb-4">مدیریت محصولات</h1>
        <form method="post" action="" class="mb-4">
            <div class="row g-3">
                <!-- گروه کالا -->
                <div class="col-md-6">
                    <label for="product_group" class="form-label">گروه کالا:</label>
                    <div class="input-group">
                        <input type="text" name="product_group" id="product_group" class="form-control" required>
                        <button type="button" class="btn btn-outline-secondary" id="add_group">+</button>
                    </div>
                </div>

                <!-- زیر گروه -->
                <div class="col-md-6">
                    <label for="product_subgroup" class="form-label">زیر گروه:</label>
                    <div class="input-group">
                        <input type="text" name="product_subgroup" id="product_subgroup" class="form-control" required>
                        <button type="button" class="btn btn-outline-secondary" id="add_subgroup">+</button>
                    </div>
                </div>

                <!-- نام کالا -->
                <div class="col-md-6">
                    <label for="product_name" class="form-label">نام کالا:</label>
                    <input type="text" name="product_name" id="product_name" class="form-control" required>
                </div>

                <!-- سریال -->
                <div class="col-md-6">
                    <label for="serial" class="form-label">سریال:</label>
                    <input type="text" name="serial" id="serial" class="form-control" required>
                </div>

                <!-- بارکد -->
                <div class="col-md-6">
                    <label for="barcode" class="form-label">بارکد:</label>
                    <div class="input-group">
                        <input type="text" name="barcode" id="barcode" class="form-control" required>
                        <button type="button" class="btn btn-outline-secondary" id="generate_barcode">تولید بارکد</button>
                    </div>
                </div>

                <!-- بارکد دوم -->
                <div class="col-md-6">
                    <label for="barcode2" class="form-label">بارکد دوم:</label>
                    <div class="input-group">
                        <input type="text" name="barcode2" id="barcode2" class="form-control">
                        <button type="button" class="btn btn-outline-secondary" id="generate_barcode2">تولید بارکد دوم</button>
                    </div>
                </div>

                <!-- واحد -->
                <div class="col-md-6">
                    <label for="unit" class="form-label">واحد:</label>
                    <div class="input-group">
                        <select name="unit" id="unit" class="form-select" required>
                            <option value="عدد">عدد</option>
                            <option value="کیلوگرم">کیلوگرم</option>
                            <option value="لیتر">لیتر</option>
                        </select>
                        <button type="button" class="btn btn-outline-secondary" id="add_unit">+</button>
                    </div>
                </div>

                <!-- موجودی اولیه -->
                <div class="col-md-6">
                    <label for="initial_stock" class="form-label">موجودی اولیه:</label>
                    <input type="number" name="initial_stock" id="initial_stock" class="form-control" required>
                </div>

                <!-- قیمت خرید -->
                <div class="col-md-6">
                    <label for="purchase_price" class="form-label">قیمت خرید:</label>
                    <input type="number" step="0.001" name="purchase_price" id="purchase_price" class="form-control" required>
                </div>

                <!-- قیمت خرید فروشگاه -->
                <div class="col-md-6">
                    <label for="shop_purchase_price" class="form-label">قیمت خرید فروشگاه:</label>
                    <input type="number" step="0.001" name="shop_purchase_price" id="shop_purchase_price" class="form-control" required>
                </div>

                <!-- تخفیف خرید -->
                <div class="col-md-6">
                    <label for="purchase_discount" class="form-label">تخفیف خرید:</label>
                    <input type="number" step="0.001" name="purchase_discount" id="purchase_discount" class="form-control" required>
                </div>

                <!-- قیمت فروش -->
                <div class="col-md-6">
                    <label for="sale_price" class="form-label">قیمت فروش:</label>
                    <input type="number" step="0.001" name="sale_price" id="sale_price" class="form-control" required>
                </div>

                <!-- قیمت فروش فروشگاه -->
                <div class="col-md-6">
                    <label for="shop_sale_price" class="form-label">قیمت فروش فروشگاه:</label>
                    <input type="number" step="0.001" name="shop_sale_price" id="shop_sale_price" class="form-control" required>
                </div>

                <!-- تخفیف فروش -->
                <div class="col-md-6">
                    <label for="sale_discount" class="form-label">تخفیف فروش:</label>
                    <input type="number" step="0.001" name="sale_discount" id="sale_discount" class="form-control" required>
                </div>

                <!-- درصد مالیات -->
                <div class="col-md-6">
                    <label for="tax_percentage" class="form-label">درصد مالیات:</label>
                    <input type="number" step="0.01" name="tax_percentage" id="tax_percentage" class="form-control" required>
                </div>

                <!-- توضیحات -->
                <div class="col-md-12">
                    <label for="description" class="form-label">توضیحات:</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <!-- تاریخ -->
                <div class="col-md-6">
                    <label for="date" class="form-label">تاریخ:</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
            </div>

            <!-- دکمه ذخیره -->
            <div class="mt-4">
                <input type="submit" name="submit" value="ذخیره ورودی" class="btn btn-primary">
            </div>
        </form>

        <hr>

        <h2>لیست محصولات</h2>
        <?php
        $entries = $wpdb->get_results("SELECT * FROM $table_name ORDER BY date DESC");

        if ($entries) {
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>گروه کالا</th><th>زیر گروه</th><th>نام کالا</th><th>سریال</th><th>بارکد</th><th>بارکد دوم</th><th>واحد</th><th>موجودی اولیه</th><th>قیمت خرید</th><th>قیمت خرید فروشگاه</th><th>تخفیف خرید</th><th>قیمت فروش</th><th>قیمت فروش فروشگاه</th><th>تخفیف فروش</th><th>درصد مالیات</th><th>توضیحات</th><th>تاریخ</th><th>عملیات</th></tr></thead>';
            echo '<tbody>';
            foreach ($entries as $entry) {
                echo '<tr>';
                echo '<td>' . esc_html($entry->product_group) . '</td>';
                echo '<td>' . esc_html($entry->product_subgroup) . '</td>';
                echo '<td>' . esc_html($entry->product_name) . '</td>';
                echo '<td>' . esc_html($entry->serial) . '</td>';
                echo '<td>' . esc_html($entry->barcode) . '</td>';
                echo '<td>' . esc_html($entry->barcode2) . '</td>';
                echo '<td>' . esc_html($entry->unit) . '</td>';
                echo '<td>' . esc_html($entry->initial_stock) . '</td>';
                echo '<td>' . esc_html($entry->purchase_price) . '</td>';
                echo '<td>' . esc_html($entry->shop_purchase_price) . '</td>';
                echo '<td>' . esc_html($entry->purchase_discount) . '</td>';
                echo '<td>' . esc_html($entry->sale_price) . '</td>';
                echo '<td>' . esc_html($entry->shop_sale_price) . '</td>';
                echo '<td>' . esc_html($entry->sale_discount) . '</td>';
                echo '<td>' . esc_html($entry->tax_percentage) . '</td>';
                echo '<td>' . esc_html($entry->description) . '</td>';
                echo '<td>' . esc_html($entry->date) . '</td>';
                echo '<td>
                        <a href="?page=hesabfa&action=edit&id=' . $entry->id . '" class="btn btn-sm btn-warning">ویرایش</a> | 
                        <a href="?page=hesabfa&action=delete&id=' . $entry->id . '" class="btn btn-sm btn-danger" onclick="return confirm(\'آیا مطمئن هستید؟\')">حذف</a>
                      </td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo '<p>هیچ ورودی‌ای وجود ندارد.</p>';
        }
        ?>
    </div>
    <?php
}
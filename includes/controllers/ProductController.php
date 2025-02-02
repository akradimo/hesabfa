<?php
namespace Hesabfa\Controllers;

use Hesabfa\Models\Product;

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function list() {
        $products = $this->productModel->getAll();
        include HESABFA_PLUGIN_DIR . 'includes/views/products/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // اعتبارسنجی Nonce
            if (!isset($_POST['hesabfa_add_product_nonce']) || !wp_verify_nonce($_POST['hesabfa_add_product_nonce'], 'hesabfa_add_product')) {
                wp_die('درخواست نامعتبر است.');
            }

            // اعتبارسنجی و ذخیره داده‌ها
            $data = [
                'name' => sanitize_text_field($_POST['name']),
                'code' => sanitize_text_field($_POST['code']),
                'price' => floatval($_POST['price']),
                'stock' => intval($_POST['stock']),
                'created_at' => current_time('mysql'),
                'updated_at' => current_time('mysql')
            ];

            $this->productModel->add($data);
            wp_redirect(admin_url('admin.php?page=hesabfa-products'));
            exit;
        }
        include HESABFA_PLUGIN_DIR . 'includes/views/products/add.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // اعتبارسنجی Nonce
            if (!isset($_POST['hesabfa_edit_product_nonce']) || !wp_verify_nonce($_POST['hesabfa_edit_product_nonce'], 'hesabfa_edit_product')) {
                wp_die('درخواست نامعتبر است.');
            }

            // اعتبارسنجی و ذخیره داده‌ها
            $data = [
                'name' => sanitize_text_field($_POST['name']),
                'code' => sanitize_text_field($_POST['code']),
                'price' => floatval($_POST['price']),
                'stock' => intval($_POST['stock']),
                'updated_at' => current_time('mysql')
            ];

            $this->productModel->update($id, $data);
            wp_redirect(admin_url('admin.php?page=hesabfa-products'));
            exit;
        }

        $product = $this->productModel->getById($id);
        if (!$product) {
            wp_die('محصول مورد نظر یافت نشد.');
        }

        include HESABFA_PLUGIN_DIR . 'includes/views/products/edit.php';
    }

    public function delete($id) {
        // اعتبارسنجی Nonce
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'hesabfa_delete_product_' . $id)) {
            wp_die('درخواست نامعتبر است.');
        }

        $this->productModel->delete($id);
        wp_redirect(admin_url('admin.php?page=hesabfa-products'));
        exit;
    }
}
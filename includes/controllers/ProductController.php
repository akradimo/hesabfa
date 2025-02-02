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
        include HESABFA_VIEWS_PATH . '/products/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => sanitize_text_field($_POST['name']),
                'code' => sanitize_text_field($_POST['code']),
                'price' => floatval($_POST['price']),
                'stock' => intval($_POST['stock'])
            ];
            $this->productModel->add($data);
            wp_redirect(admin_url('admin.php?page=hesabfa-products'));
            exit;
        }
        include HESABFA_VIEWS_PATH . '/products/add.php';
    }
}
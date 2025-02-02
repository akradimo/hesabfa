<?php
namespace Hesabfa\Controllers;

use Hesabfa\Models\Service;

class ServiceController {
    private $serviceModel;

    public function __construct() {
        $this->serviceModel = new Service();
    }

    public function list() {
        $services = $this->serviceModel->getAll();
        include HESABFA_PLUGIN_DIR . 'includes/views/services/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // اعتبارسنجی Nonce
            if (!isset($_POST['hesabfa_add_service_nonce']) || !wp_verify_nonce($_POST['hesabfa_add_service_nonce'], 'hesabfa_add_service')) {
                wp_die('درخواست نامعتبر است.');
            }

            // اعتبارسنجی و ذخیره داده‌ها
            $data = [
                'name' => sanitize_text_field($_POST['name']),
                'code' => sanitize_text_field($_POST['code']),
                'price' => floatval($_POST['price']),
                'description' => sanitize_textarea_field($_POST['description']),
                'created_at' => current_time('mysql'),
                'updated_at' => current_time('mysql')
            ];

            $this->serviceModel->add($data);
            wp_redirect(admin_url('admin.php?page=hesabfa-services'));
            exit;
        }
        include HESABFA_PLUGIN_DIR . 'includes/views/services/add.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // اعتبارسنجی Nonce
            if (!isset($_POST['hesabfa_edit_service_nonce']) || !wp_verify_nonce($_POST['hesabfa_edit_service_nonce'], 'hesabfa_edit_service')) {
                wp_die('درخواست نامعتبر است.');
            }

            // اعتبارسنجی و ذخیره داده‌ها
            $data = [
                'name' => sanitize_text_field($_POST['name']),
                'code' => sanitize_text_field($_POST['code']),
                'price' => floatval($_POST['price']),
                'description' => sanitize_textarea_field($_POST['description']),
                'updated_at' => current_time('mysql')
            ];

            $this->serviceModel->update($id, $data);
            wp_redirect(admin_url('admin.php?page=hesabfa-services'));
            exit;
        }

        $service = $this->serviceModel->getById($id);
        if (!$service) {
            wp_die('خدمت مورد نظر یافت نشد.');
        }

        include HESABFA_PLUGIN_DIR . 'includes/views/services/edit.php';
    }

    public function delete($id) {
        // اعتبارسنجی Nonce
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'hesabfa_delete_service_' . $id)) {
            wp_die('درخواست نامعتبر است.');
        }

        $this->serviceModel->delete($id);
        wp_redirect(admin_url('admin.php?page=hesabfa-services'));
        exit;
    }
}
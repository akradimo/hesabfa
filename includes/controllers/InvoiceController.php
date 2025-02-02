<?php
namespace Hesabfa\Controllers;

use Hesabfa\Models\Invoice;

class InvoiceController {
    private $invoiceModel;

    public function __construct() {
        $this->invoiceModel = new Invoice();
    }

    public function list() {
        $invoices = $this->invoiceModel->getAll();
        include HESABFA_PLUGIN_DIR . 'includes/views/invoices/list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // اعتبارسنجی Nonce
            if (!isset($_POST['hesabfa_add_invoice_nonce']) || !wp_verify_nonce($_POST['hesabfa_add_invoice_nonce'], 'hesabfa_add_invoice')) {
                wp_die('درخواست نامعتبر است.');
            }

            // اعتبارسنجی و ذخیره داده‌ها
            $data = [
                'customer_name' => sanitize_text_field($_POST['customer_name']),
                'total_amount' => floatval($_POST['total_amount']),
                'created_at' => current_time('mysql'),
                'updated_at' => current_time('mysql')
            ];

            $this->invoiceModel->add($data);
            wp_redirect(admin_url('admin.php?page=hesabfa-invoices'));
            exit;
        }
        include HESABFA_PLUGIN_DIR . 'includes/views/invoices/add.php';
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // اعتبارسنجی Nonce
            if (!isset($_POST['hesabfa_edit_invoice_nonce']) || !wp_verify_nonce($_POST['hesabfa_edit_invoice_nonce'], 'hesabfa_edit_invoice')) {
                wp_die('درخواست نامعتبر است.');
            }

            // اعتبارسنجی و ذخیره داده‌ها
            $data = [
                'customer_name' => sanitize_text_field($_POST['customer_name']),
                'total_amount' => floatval($_POST['total_amount']),
                'updated_at' => current_time('mysql')
            ];

            $this->invoiceModel->update($id, $data);
            wp_redirect(admin_url('admin.php?page=hesabfa-invoices'));
            exit;
        }

        $invoice = $this->invoiceModel->getById($id);
        if (!$invoice) {
            wp_die('فاکتور مورد نظر یافت نشد.');
        }

        include HESABFA_PLUGIN_DIR . 'includes/views/invoices/edit.php';
    }

    public function delete($id) {
        // اعتبارسنجی Nonce
        if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'hesabfa_delete_invoice_' . $id)) {
            wp_die('درخواست نامعتبر است.');
        }

        $this->invoiceModel->delete($id);
        wp_redirect(admin_url('admin.php?page=hesabfa-invoices'));
        exit;
    }
}
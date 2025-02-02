<?php
namespace Hesabfa\Models;

class Product {
    // تعریف پروپرتی‌ها
    private $table_name; // پروپرتی برای نام جدول
    private $db; // پروپرتی برای اتصال به پایگاه داده

    public function __construct() {
        $this->table_name = 'products'; // مقداردهی اولیه به نام جدول
        $this->db = new \wpdb(DB_USER, DB_PASSWORD, DB_NAME, DB_HOST); // ارتباط با پایگاه داده
    }

    // متد برای دریافت همه محصولات
    public function getAll() {
        return $this->db->get_results("SELECT * FROM {$this->table_name}", ARRAY_A);
    }

    // متد برای اضافه کردن یک محصول جدید
    public function add($data) {
        return $this->db->insert($this->table_name, $data);
    }

    // متد برای ویرایش اطلاعات یک محصول بر اساس ID
    public function update($id, $data) {
        return $this->db->update($this->table_name, $data, ['id' => $id]);
    }

    // متد برای دریافت محصول بر اساس ID
    public function getById($id) {
        return $this->db->get_row("SELECT * FROM {$this->table_name} WHERE id = %d", $id, ARRAY_A);
    }

    // متد برای حذف یک محصول بر اساس ID
    public function delete($id) {
        return $this->db->delete($this->table_name, ['id' => $id]);
    }
}
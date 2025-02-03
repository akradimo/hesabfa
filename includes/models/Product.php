<?php
namespace Hesabfa\Models;

class Product {
    private $wpdb;
    private $table_name;

    public $id;
    public $code;
    public $group;
    public $sub_group;
    public $name;
    public $serial;
    public $barcode1;
    public $barcode2;
    public $unit;
    public $tax_id;
    public $initial_stock;
    public $purchase_price;
    public $store_purchase_price;
    public $purchase_discount;
    public $sale_price;
    public $store_sale_price;
    public $sale_discount;
    public $tax_percentage;
    public $description;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $wpdb->prefix . 'products'; // تغییر نام جدول به 'products'
    }

    public function getAll() {
        return $this->wpdb->get_results("SELECT * FROM {$this->table_name}");
    }

    public function getById($id) {
        return $this->wpdb->get_row($this->wpdb->prepare("SELECT * FROM {$this->table_name} WHERE id = %d", $id));
    }

    public function add($data) {
        return $this->wpdb->insert($this->table_name, $data);
    }

    public function update($id, $data) {
        return $this->wpdb->update($this->table_name, $data, array('id' => $id));
    }

    public function delete($id) {
        return $this->wpdb->delete($this->table_name, array('id' => $id));
    }

    public function save() {
        $this->wpdb->insert($this->table_name, array(
            'code' => $this->code,
            'group' => $this->group,
            'sub_group' => $this->sub_group,
            'name' => $this->name,
            'serial' => $this->serial,
            'barcode1' => $this->barcode1,
            'barcode2' => $this->barcode2,
            'unit' => $this->unit,
            'tax_id' => $this->tax_id,
            'initial_stock' => $this->initial_stock,
            'purchase_price' => $this->purchase_price,
            'store_purchase_price' => $this->store_purchase_price,
            'purchase_discount' => $this->purchase_discount,
            'sale_price' => $this->sale_price,
            'store_sale_price' => $this->store_sale_price,
            'sale_discount' => $this->sale_discount,
            'tax_percentage' => $this->tax_percentage,
            'description' => $this->description
        ));
    }

    public static function get_all() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'products';
        return $wpdb->get_results("SELECT * FROM $table_name");
    }
}
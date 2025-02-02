<?php
namespace Hesabfa\Models;

class Unit {
    private $wpdb;

    public function __construct() {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_name = $wpdb->prefix . 'hesabfa_units';
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
}
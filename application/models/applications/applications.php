<?php
namespace applications;

use interfaces\applicationsInterface;
use interfaces\mysqlInterface;

class applications implements applicationsInterface {
    public $db;
    public $select = 'SELECT * FROM applications ';
    public $status = ['active' => 1, 'pending' => 2, 'deleted' => 3];

    public function  __construct(mysqlInterface $db) {
        $this->db = $db;
    }

    public function getByID (int $ID) {
        $this->db->parseSql('SELECT * FROM applications WHERE id = ?')->bind_param('i', $ID);
        return $this->db->selectOne();
    }

    public function getAll() {
        return $this->db->select($this->select . 'WHERE status != ' . $this->status['deleted'], true);
    }

    public function getActive () {
        return $this->db->select($this->select . 'WHERE status = ' . $this->status['active'], true);
    }
}
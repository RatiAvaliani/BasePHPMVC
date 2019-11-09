<?php
namespace model;
use database\mysql;
use users\users;

abstract class model {
    public $db;
    public $users;

    public function __construct () {
        $this->db = new mysql();
        $this->users = new users($this->db);
    }

    public function redirect(string $path = null) {
        if (is_null($path)) return null;

        header("Location: $path");
        die('505 server error.');
    }
}
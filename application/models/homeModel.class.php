<?php
use model\model;
use applications\applications;

class homeModel extends model {
    public $applications;

    public function __construct() {
        parent::__construct();
        $this->applications = new applications($this->db);
    }

    public function getActiveApplications () {
        return $this->applications->getActive();
    }
}
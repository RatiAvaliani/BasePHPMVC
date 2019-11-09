<?php

use applications\applications;
use model\model;
use users\users;
use traits\notifications;
use traits\session;
use upload\uploadImages;

class applicationModel extends model {

    private $sqlInsert = 'INSERT INTO applications SET ';
    private $sqlUpdate = 'UPDATE applications SET ';
    public $applications;
    public $application;

    use notifications;
    use session;

    public function __construct() {
        parent::__construct();
        $this->applications = new applications($this->db);
    }

    public function saveApplication (array $application) {
        $imageUpload = new uploadImages('image');
        $imageName = $imageUpload->upload();
        $text = strip_tags($application['text']);

        if (trim($text) != '') {
            $this->sqlInsert .= 'text = ?, user_id = ? ';
            $this->db->parseSql($this->sqlInsert)->bind_param('si', $text, $this->getSession('userID'));
            $this->db->query->execute();
        } elseif (!is_null($imageName) && trim($imageName) != '') {
            $this->sqlInsert .= 'image = ?, user_id = ? ';
            $this->db->parseSql($this->sqlInsert)->bind_param('si', $imageName, $this->getSession('userID'));
            $this->db->query->execute();
        } else {
            return null;
        }

        $this->setNotification('Your Application was sent successfully.');
    }

    public function getAllApplications () {
        return $this->applications->getAll();
    }

    public function updateApplication (array $application) {
        $imageUpload = new uploadImages('image');
        $imageName = $imageUpload->upload();
        $text = strip_tags($application['text']);

        if (trim($text) != '') {
            $this->sqlUpdate .= ' text = ? WHERE id = ? ';
            $this->db->parseSql($this->sqlUpdate)->bind_param('si', $text, $application['applicationID']);
            $this->db->query->execute();
        } elseif (!is_null($imageName) && trim($imageName) != '') {
            $this->sqlUpdate .= 'image = ?, text = null WHERE id = ? ';
            $this->db->parseSql($this->sqlUpdate)->bind_param('si', $imageName, $application['applicationID']);
            $this->db->query->execute();
        } else {
            return null;
        }

        $this->setNotification('Application was updated successfully.');
    }

    public function deleteApplication (int $ID) {
        $this->db->parseSql('UPDATE applications SET status = 3 WHERE id = ?')->bind_param('i', $ID);
        $this->db->query->execute();
    }

    public function approveApplication (int $ID) {
        $this->db->parseSql('UPDATE applications SET status = 1 WHERE id = ?')->bind_param('i', $ID);
        $this->db->query->execute();
    }

    public function deleteImageApplication (int $ID) {
        $this->db->parseSql('UPDATE applications SET status = 2, image = null WHERE id = ?')->bind_param('i', $ID);
        $this->db->query->execute();
    }
}
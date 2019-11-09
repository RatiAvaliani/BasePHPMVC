<?php
namespace users;
use interfaces\userInterface;
use interfaces\usersInterface;
use traits\session;

class users implements usersInterface {
    use session;
    public $db;
    public $user;
    public $selectSql = 'SELECT * FROM users ';

    public function __construct($db){
        return $this->db = $db;
        $this->setLoggedInUserInfo();
    }

    public function getAllActive (): array {
        return $this->db->select($this->selectSql . 'WHERE status = 1', true);
    }

    public function getUser (?array $userInfo) {
        return is_null($userInfo) ? null : new user($userInfo, $this->db);
    }

    public function setLoggedInUserInfo () {
        $userID = $this->userLoginStatus();
        if ($userID) {
            $this->user = $this->getUserByID($userID);
        }
    }

    public function userLoginStatus () {
        return $this->getSession('userID');
    }

    public function userLogout () {
        $this->unsetSession('userID');
        $this->unsetSession('userType');
    }

    /**
     * @param int $ID
     * @return userInterface
     * gets ID and returns UserObject.
     */
    public function getUserByID (int $ID) {
        $this->db->parseSql($this->selectSql . 'WHERE id = ?')->bind_param('i', $ID);

        return $this->getUser($this->db->selectOne());
    }

    public function getUserByUsername (string $username) {
        $this->db->parseSql($this->selectSql . 'WHERE username = ?')->bind_param('s', $username);

        return $this->getUser($this->db->selectOne());
    }
}
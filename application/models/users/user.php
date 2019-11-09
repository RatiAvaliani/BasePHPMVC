<?php
namespace users;
use interfaces\userInterface;
use interfaces\mysqlInterface;
use traits\session;

class user implements userInterface{
    private $id;
    private $type;
    private $status;
    private $username;
    private $password;
    private $updateSql = 'UPDATE users SET ';
    public $db;

    use session;

    public function __construct (array $userInfo, mysqlInterface $db) {
        $this->db = $db;
        $this->loadInfo($userInfo);
    }

    private function loadInfo(array $userInfo) {
        foreach ($userInfo as $name => $val) {
            $this->$name = $val;
        }
    }

    public function comparePassword (string $incomingPassword): bool {
        $verify =  password_verify($incomingPassword, $this->password);
        if (!is_null($verify)) {
            $this->saveUser();
        }
        return $verify;
    }

    private function saveUser (): void {
        $this->setSession('userID', $this->id);
        $this->setSession('userType', $this->type);
    }

    public function delete (): self  {
        $sql = $this->updateSql . 'status = 2';
        $this->db->query($sql);

        return $this;
    }

    public function activate (): self  {
        $sql = $this->updateSql . 'status = 1';
        $this->db->query($sql);

        return $this;
    }

    public function updateUsername () {
        //...
    }
    public function updatePassword () {
        //...
    }
    public function create () {
        //...
    }
}
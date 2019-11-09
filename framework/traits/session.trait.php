<?php
namespace traits;

trait session {
    public function setSession ($ID, $val) {
        $_SESSION[$ID] = $val;
    }
    public function getSession ($ID) {
        return !isset($_SESSION[$ID]) ? null : $_SESSION[$ID];
    }
    public function unsetSession ($ID) {
        unset($_SESSION[$ID]);
    }
}
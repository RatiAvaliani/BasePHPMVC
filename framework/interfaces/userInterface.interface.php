<?php
namespace interfaces;

interface userInterface {
    public function comparePassword (string $incomingPassword): bool;
    public function delete ();
    public function activate();
    public function updateUsername();
    public function updatePassword();
    public function create();
}
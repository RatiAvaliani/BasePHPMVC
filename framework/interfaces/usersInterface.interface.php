<?php
namespace interfaces;

interface usersInterface {
    public function getAllActive (): array;
    public function getUser(?array $userInfo);
    public function getUserByID (int $ID);
    public function getUserByUsername (string $username);
    public function userLoginStatus ();
}
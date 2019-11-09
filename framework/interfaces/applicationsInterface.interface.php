<?php
namespace interfaces;

interface applicationsInterface {
    public function getActive();
    public function getAll();
    public function getByID(int $ID);
}

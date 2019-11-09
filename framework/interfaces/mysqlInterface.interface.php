<?php
namespace interfaces;

interface mysqlInterface {
    public function customConnect (array $connInfo);
    public function connect ();
    public function errors ();
    public function query (string $sql);
    public function selectOne();
    public function getLastID ();
    public function multiQuery (string $sql);
    public function parseSql (string $sql);
    public function select (string $sql, bool $indexing);
}
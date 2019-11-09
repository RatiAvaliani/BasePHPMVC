<?php
namespace database;
use interfaces\mysqlInterface;

class mysql implements mysqlInterface {
    private $host;
    private $username;
    private $password;
    private $database;
    private $selectInfo;
    public $query;
    public $conn;

    public function __construct () {
        $this->host = DB_HOST;
        $this->database = DB_NAME;
        $this->password = DB_PASSWORD;
        $this->username = DB_USERNAME;

        $this->connect();
    }

    public function connect(): self {
        $this->conn = new \mysqli($this->host, $this->username, $this->password, $this->database);

        return $this;
    }

    /**
     * @param array $connInfo
     * @return mysql
     * for other servers.
     */
    public function customConnect (array $connInfo): self {
        $this->conn = new \mysqli($connInfo['host'], $connInfo['username'], $connInfo['password'], $connInfo['database']);

        return $this;
    }

    public function errors (): self {

        if ($this->conn->connect_error) {

            die('Mysqli :' . $this->conn->connection_error);
        }
        if ($this->conn->error) {
            die('Mysqli: '. $this->conn->error);
        }

        return $this;
    }

    public function query(string $sql): self{
        $this->query = $this->conn->query($sql);
        return $this->errors();
    }

    public function multiQuery (string $sql) {
        $this->query = $this->conn->multi_query($sql);
        return $this->errors();
    }

    public function parseSql (string $sql) {
        $this->query = $this->conn->prepare($sql);

       return $this->query;
    }

    public function selectOne () {
        $this->query->execute();

        return $this->query->get_result()->fetch_assoc();
    }

    public function select (string $sql, ?bool $indexing) {
        $this->query($sql);
        if ($this->query->num_rows > 0) {
            while ($row = $this->query->fetch_assoc()) {
                $this->selectInfo[] = $row;
            }
        }

        return $this->selectInfo;
    }

    public function getLastID () {
        return $this->conn->insert_id;
    }
}
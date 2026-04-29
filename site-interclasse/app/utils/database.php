<?php

class Database {
    private static Database | null $instance = null;
    
    private string $host = '127.0.0.1';
    private string $db = 'interclasse';
    private string $username = 'root';
    private string $password = '';
    private string $charset = 'utf8mb4';
    private PDO $conn;

    private function __construct() {
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            echo "Database Connected";
        
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

// Pra usar:
// $database = Database::getInstance()->getConnection();
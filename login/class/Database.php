<?php

class Database
{
    private $connections = [];
    private $configurations = [];
    private $activeConnectionName;
    private $activeConnection;

    public function __construct()
    {
    }

    public function addConnection($name, $host, $dbName, $username, $password, $type = 'mysql')
    {
        if (isset($this->configurations[$name])) {
            die("Connection configuration $name already exists.");
        }

        if (!in_array($type, ['mysql', 'sqlite'])) {
            die("Invalid database type $type.");
        }

        if ($type === 'sqlite') {
            $this->configurations[$name] = [
                'dsn' => "{$type}:{$dbName}",
                'username' => $username,
                'password' => $password
            ];
            return;
        } else {
            $this->configurations[$name] = [
                'dsn' => "{$type}:host={$host};dbname={$dbName};charset=utf8mb4",
                'username' => $username,
                'password' => $password
            ];
        }
    }

    public function setActiveConnection($name)
    {
        if (isset($this->configurations[$name])) {
            $this->activeConnectionName = $name;
            $this->activeConnection = null;  // Reset active connection to enforce lazy loading
        } else {
            die("Connection configuration $name not found.");
        }
    }

    private function getConnection()
    {
        if ($this->activeConnection === null) {
            if (!isset($this->configurations[$this->activeConnectionName])) {
                die("Active connection configuration not set.");
            }
            $config = $this->configurations[$this->activeConnectionName];
            try {
                $this->activeConnection = new PDO($config['dsn'], $config['username'], $config['password']);
                $this->activeConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection to {$this->activeConnectionName} failed: " . $e->getMessage());
            }
        }
        return $this->activeConnection;
    }

    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->getConnection()->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function fetchAll($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function fetch($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function execute($sql, $params = [])
    {
        $stmt = $this->query($sql, $params);
        return $stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->getConnection()->lastInsertId();
    }

    public function close($name = null)
    {
        if ($name) {
            if (isset($this->connections[$name])) {
                $this->connections[$name] = null;
            }
        } else {
            foreach ($this->connections as &$conn) {
                $conn = null;
            }
            $this->activeConnection = null;
        }
    }
}

<?php

class Database {
    public function __construct() {
        // Simulate an expensive database connection operation
        echo "Connecting to the database...\n";
    }

    public function query($sql) {
        // Simulate executing a database query
        return "Executing query: $sql";
    }
}

class DatabaseProxy {
    private $database = null;

    private function initialize() {
        if ($this->database === null) {
            $this->database = new Database();
        }
    }

    public function query($sql) {
        $this->initialize();
        return $this->database->query($sql);
    }
}

// Client code
$proxy = new DatabaseProxy();

// The database connection will be initialized only when the query method is called
echo $proxy->query("SELECT * FROM users");

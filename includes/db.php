<?php
class DB {
    private $mysqli;

    public function __construct($host, $user, $password, $dbname, $charset = 'utf8mb4') {
        $this->mysqli = new mysqli($host, $user, $password, $dbname);
        if ($this->mysqli->connect_error) {
            die('Ошибка подключения: ' . $this->mysqli->connect_error);
        }
        $this->mysqli->set_charset($charset);
        $this->mysqli->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;
    }

    public function query($sql) {
        $result = $this->mysqli->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function close() {
        $this->mysqli->close();
    }
}
?>
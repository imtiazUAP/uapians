<?php
class dbClass
{
    private $connection;
    function __construct()
    {
        $this->mysqlConnect('localhost', 'root', '', 'uapians_mylab');
    }
    private function mysqlConnect($host, $email, $password, $name)
    {
        $this->connection = new mysqli($host, $email, $password, $name);
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }
    public function getConnection()
    {
        return $this->connection;
    }
    function myQuery($query)
    {
        $result = $this->connection->query($query);
        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}
?>
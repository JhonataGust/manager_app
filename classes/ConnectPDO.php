<?php
class ConnectPDO
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $conn;

    public function __construct($host, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }

    public function conectar()
    {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Falha na conexão: " . $e->getMessage();
        }
    }

    public function desconectar()
    {
        $this->conn = null;
        echo "Conexão encerrada!";
    }

    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }
}
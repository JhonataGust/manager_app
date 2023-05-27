<?php
class User
{
    private $cnpj;
    private $password;

    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }
    public function setPassword($password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $hashedPassword;
    }

    public function insertInto($conn)
    {
        $sql = 'INSERT INTO `users` (cnpj, password) VALUES (:cnpj, :password)';
        $conn->conectar();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cnpj', $this->cnpj);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
    }

    public function saveSession($conn, $cnpj, $password)
    {
        $sql = 'SELECT * FROM `users` WHERE cnpj = :cnpj';
        $conn->conectar();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cnpj', $cnpj);
        $stmt->execute();
        $row = $stmt->fetch();

        if ($row) {
            $storedHashedPassword = $row['password'];
            if (password_verify($password, $storedHashedPassword)) {
                $_SESSION['userId'] = $row['id'];
                $_SESSION['cnpj'] = $row['cnpj'];
                $_SESSION['user_login'] = true;
                return true;
            }
        }
        return false;
    }
}
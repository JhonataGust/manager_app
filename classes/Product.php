<?php
class Product
{
    private $name;
    private $description;
    private $amount;
    private $stock;

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function set_amount($amount)
    {
        $this->amount = $amount;
    }

    public function set_description($description)
    {
        $this->description = $description;
    }

    public function set_stock($stock)
    {
        $this->stock = $stock;
    }

    public function insertInto($conn)
    {
        $sql = 'INSERT INTO `products` (name, description, amount, stock, user_id) VALUES (:name, :description, :amount, :stock, :user_id)';
        $conn->conectar();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':user_id', $_SESSION['userId']);

        $stmt->execute();
    }

    public function updateById($conn, $id)
    {
        $sql = 'UPDATE `products` SET name = :name, description = :description, amount = :amount, stock = :stock WHERE id = :id';
        $conn->conectar();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':amount', $this->amount);
        $stmt->bindParam(':stock', $this->stock);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function deleteById($conn, $id)
    {
        $sql = 'DELETE FROM `products` WHERE id = :id';
        $conn->conectar();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
    }

    public function getProductsByUserId($conn)
    {
        $sql = 'SELECT * FROM `products` WHERE user_id = :user_id';
        $conn->conectar();
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':user_id', $_SESSION['userId']);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    


}
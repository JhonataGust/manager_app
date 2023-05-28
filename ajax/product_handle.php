<?php
include('../config.php');
include('../classes/Product.php');
$date = date('Y-m-d H:i:s');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product();
    $product->set_name($_POST['name']);
    $product->set_description($_POST['description']);
    $product->set_amount($_POST['amount']);
    $product->set_stock($_POST['stock']);
    $product->set_supplier($_POST['supplier']);
    $product->set_updated_at($date);
    $product_id = $_POST['id'];
    $response = array("success" => true);
    $jsonResponse = json_encode($response);
    if ($product_id != 'null') {
        $product->updateById($conn, $product_id);
        echo $jsonResponse;
        return true;
    }

    $product->insertInto($conn);
    echo $jsonResponse;

}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // O tipo da requisição é POST
    $product = new Product();
    $product_id = $_GET['id'];
    $product->set_name($_POST['name']);
    $product->set_description($_POST['description']);
    $product->set_amount($_POST['amount']);
    $product->set_stock($_POST['stock']);
    $product->set_supplier($_POST['supplier']);
    $product->set_updated_at($date);

    $product->updateById($conn, $product_id);
    $response = array("success" => true);
    $jsonResponse = json_encode($response);
    echo $jsonResponse;
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // O tipo da requisição é POST
    $product = new Product();
    $product_id = $_GET['id'];

    $product->deleteById($conn, $product_id);
    $response = array("success" => true);
    $jsonResponse = json_encode($response);
    echo $jsonResponse;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // O tipo da requisição é POST
    $product = new Product();
    $jsonResponse = json_encode($product->getProductsByUserId($conn));
    echo $jsonResponse;
}

?>
<?php
include('../config.php');
include('../classes/Product.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = new Product();
    $product->set_name($_POST['name']);
    $product->set_description($_POST['description']);
    $product->set_amount($_POST['amount']);
    $product->set_stock($_POST['stock']);

    $product->insertInto($conn);
    $response = array("success" => true);
    $jsonResponse = json_encode($response);
    echo $jsonResponse;

}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // O tipo da requisição é POST
    $product = new Product();
    $product_id = $_POST['id'];
    $product->set_name($_POST['name']);
    $product->set_description($_POST['description']);
    $product->set_amount($_POST['amount']);
    $product->set_stock($_POST['stock']);

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
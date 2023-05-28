<?php
include('../config.php');
include('../classes/User.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $user->setCnpj($_POST['cnpj']);
    $user->setPassword($_POST['password']);
    if ($_GET['create'] == 'true') {
        $user->insertInto($conn);
        $response = array("success" => true);
        $jsonResponse = json_encode($response);
        echo $jsonResponse;
        return false;
    } else {
        if ($user->saveSession($conn, $_POST['cnpj'], $_POST['password']) == true) {
            $response = array("success" => true);
            $jsonResponse = json_encode($response);
            echo $jsonResponse;
        } else {
            $response = array("success" => false);
            $jsonResponse = json_encode($response);
            echo $jsonResponse;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $user = new User();
    $user->setCnpj($_PUT['cnpj']);
    $user->setPassword($_PUT['password']);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // O tipo da requisição é POST
    echo 'A requisição é do tipo POST.';
}

?>
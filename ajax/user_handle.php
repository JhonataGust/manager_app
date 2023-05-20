<?php
include('../config.php');
include('../classes/User.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User();
    $user->setCnpj($_POST['cnpj']);
    $user->setPassword($_POST['password']);
    if (!$user->saveSession($conn, $_POST['cnpj'], $_POST['password'])) {
        $user->insertInto($conn);
    }

    if ($user->saveSession($conn, $_POST['cnpj'], $_POST['password'])) {
        $response = array("success" => true);
        $jsonResponse = json_encode($response);
        echo $jsonResponse;
    }else{
        $response = array("false" => true);
        $jsonResponse = json_encode($response);
        echo $jsonResponse;
    }

}

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // O tipo da requisição é POST
    echo 'A requisição é do tipo POST.';
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // O tipo da requisição é POST
    echo 'A requisição é do tipo POST.';
}

?>
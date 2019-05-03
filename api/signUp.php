<?php
include "functions.php";

if (empty($_REQUEST['name']) || empty($_REQUEST['email']) || empty($_REQUEST['password'])){
    header('Location: ../index.php');
} else{
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $created_Date = date('Y-m-d H:i:s');

    $emailExists = isEmailExist($email);
    if ($emailExists){
        echo "El email ya esta registrado";
    } else {
        $result = singUp($name, $email, $password, $created_Date);

        if ($result){
            echo json_encode($result);
        }
    }
}

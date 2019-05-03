<?php

include "../auth/db.php";

function singUp($user, $email, $password, $created_Date){
    global $con;
    $USER_NAME = mysqli_real_escape_string($con, $user);
    $USER_EMAIL = mysqli_real_escape_string($con, $email);
    $USER_PASSWORD = mysqli_real_escape_string($con, $password);

    $PASSWROD = password_hash($USER_PASSWORD, PASSWORD_ARGON2ID);
    $query = "INSERT INTO `users`(`name`, `email`, `password`, `created_date`)";
    $query .= "VALUES ('$USER_NAME','$USER_EMAIL','$PASSWROD','$created_Date')";

    $result = mysqli_query($con, $query);

    if (!$result){
        die("Query fallo" .mysqli_error($con));
    }else{
        return $result;
    }
}

function logIn($email, $password){
    global $con;
    $USER_EMAIL = mysqli_real_escape_string($con, $email);
    $USER_PASSWORD = mysqli_real_escape_string($con, $password);

    $query = "SELECT * FROM users  WHERE email  = '$USER_EMAIL'";
    $result = mysqli_query($con, $query);
    if ($result){
        $rowcount = mysqli_num_rows($result);
        if ($rowcount == 1){
            $user = mysqli_fetch_array($result);
            $PASSWORD = $user['password'];

            if (password_verify($USER_PASSWORD,$PASSWORD)){
                return true;
            }else{
                return "Las contraseñas no coinciden";
            }
        }
    } else {
        die("Query fallo" .mysqli_error($con));
    }
}

function isEmailExist($email){
    global $con;

    $query = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    if ($result){
        $rows = mysqli_num_rows($result);
        if ($rows >= 1){
            return true;
        } else {
            return false;
        }
    } else {
        die("Query fallo" .mysqli_error($con));
    }
}

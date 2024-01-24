<?php
    session_start();

    require_once "Controlleur.php";

    if (isset($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = ConnexionUser($email,$password,$pdo);

        if (!empty($user)) {
            $_SESSION['Rest_User'] = $user;
             
        }else{
           $_SESSION['error'] = "information erroner ou compte innexistant!"; 
        }

        header('location:../index.php');
    }
?>
<?php
    session_start();

    require_once "Controlleur.php";

    if (isset($_GET['a'])) {
        switch ($_GET['a']) {
            
            case 'delete':
                if (isset($_POST)) {
                    $id = $_GET['id'];
                    
                    DeleteUser($id,$pdo);
            
                    header('location:../index.php?p=utilisateur');
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    
?>
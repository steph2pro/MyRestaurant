<?php
    session_start();

    require_once "controlleur.php";
    if (isset($_GET['a'])) {
        switch ($_GET['a']) {
            case 'add':
                if (isset($_POST)) {

                    $nom = $_POST['nom'];
                    $description = $_POST['description'];
                    //recuperation de l'image du plat
                    if(isset($_FILES['image'])) {
                        $image = uploadImage();
                    
                        if(!is_string($image)) {
                            // Le téléchargement de l'image s'est bien déroulé
                            echo "L'image a été téléchargée et enregistrée avec succès : " . $image;
                        } else {
                            // Une erreur s'est produite lors du téléchargement de l'image
                            echo $image;
                        }
                    }
                
                    //...
                    $prix = $_POST['prix'];
                    $etat = $_POST['etat'];
                    $id_menu_Menu = $_POST['id_menu_Menu'];

                    CreatePlat( $nom,$description,$image,$prix,$etat,$nbr_limite,$id_menu_Menu,$pdo);
                   
                    header('location:../index.php?p=Plat');
                }
                break;
            case 'update':
                if (isset($_POST)) {
                    
                    $nom = $_POST['nom'];
                    $description = $_POST['description'];
                    //recuperation de l'image du plat
                    if(isset($_FILES['image'])) {
                        $image = uploadImage();
                    
                        if(!is_string($image)) {
                            // Le téléchargement de l'image s'est bien déroulé
                            echo "L'image a été téléchargée et enregistrée avec succès : " . $image;
                        } else {
                            // Une erreur s'est produite lors du téléchargement de l'image
                            echo $image;
                        }
                    }
                    //...
                    $prix = $_POST['prix'];
                    $etat = $_POST['etat'];
                    $id_menu_Menu = $_POST['id_menu_Menu'];

                    UpdatePlat( $id,$nom,$description,$image,$prix,$etat,$nbr_limite,$id_menu_Menu,$pdo)

                    header('location:../index.php?p=Plat');
                }
                break;
            case 'delete':
                if (isset($_POST)) {
                    $id = $_GET['id'];
                    
                    DeletePlat($id,$pdo);
            
                    header('location:../index.php?p=Plat');
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    
?>
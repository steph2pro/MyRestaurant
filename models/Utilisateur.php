<?php
    require_once 'Model.php';

    

//fonction de connection
    function ConnexionUser($email,$pass,$pdo)
    {
        $sql="SELECT * from Utilisateur WHERE email='$email' AND mot_de_passe='$pass'";
        $req=$pdo->prepare($sql);
        $req->execute();
        $data=$req->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }
//fonction de modification du role de l'utilisateur
    function SetRole( $id,$role,$pdo)
    {
        $sql="UPDATE Utilisateur SET role='$role' WHERE id_user='$id'";
        $req=$pdo->prepare($sql);
        $req->execute();
    }

//fonction de supression d'un tutilisateur
    function DeleteUser($id,$pdo)
    {
        $sql="DELETE FROM Utilisateur WHERE id_user='$id'";
        $req=$pdo->prepare($sql);
        $req->execute();
    }
    // function CountUtilisateur($pdo)
    // {
    //     $sql="SELECT * from Utilisateur";
    //     $req=$pdo->prepare($sql);
    //     $req->execute();        
    //     $req->fetchAll(PDO::FETCH_OBJ);
    //     $datas=$req->rowCount();
    //     return $datas;
    // }

    // function ReadALLUtilisateur($pdo)
    // {
    //     $sql="SELECT * from Utilisateur";
    //     $req=$pdo->prepare($sql);
    //     $req->execute();
    //     $datas=$req->fetchAll(PDO::FETCH_ASSOC);

    //     return $datas;
    // }

    // function ReadUtilisateur($id,$pdo)
    // {
    //     $sql="SELECT * from Utilisateur WHERE id_user='$id'";
    //     $req=$pdo->prepare($sql);
    //     $req->execute();
    //     $data=$req->fetchAll(PDO::FETCH_ASSOC);

    //     return $data;
    // }

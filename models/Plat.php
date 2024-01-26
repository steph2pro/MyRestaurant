<?php
    require_once 'Model.php';

    function CreatePlat( $nom,$description,$image,$prix,$etat,$nbr_limite,$id_menu_Menu,$pdo)
    {
        $sql="INSERT INTO Plat SET  nom='$nom',description='$description',image='$image',prix='$prix',etat='$etat',nbr_limite='$nbr_limite',id_menu_Menu='$id_menu_Menu';";
        $req=$pdo->prepare($sql);
        $req->execute();
    }

    function ReadALLPlat($pdo)
    {
        $sql="SELECT * from Plat";
        $req=$pdo->prepare($sql);
        $req->execute();
        $datas=$req->fetchAll();

        return $datas;
    }

    function ReadPlat($id,$pdo)
    {
        $sql="SELECT * from Plat WHERE id_plat='$id'";
        $req=$pdo->prepare($sql);
        $req->execute();
        $data=$req->fetchAll();

        return $data;
    }

    function UpdatePlat( $id,$nom,$description,$image,$prix,$etat,$nbr_limite,$id_menu_Menu,$pdo)
    {
        $sql="UPDATE Plat SET  nom='$nom',description='$description',image='$image',prix='$prix',etat='$etat',nbr_limite='$nbr_limite',id_menu_Menu='$id_menu_Menu' WHERE id_plat='$id';";
        $req=$pdo->prepare($sql);
        $req->execute();
    }

    function DeletePlat($id,$pdo)
    {
        $sql="DELETE FROM Plat WHERE id_plat='$id';";
        $req=$pdo->prepare($sql);
        $req->execute();
    }

    function CountPlat($pdo)
    {
        $sql="SELECT * from Plat";
        $req=$pdo->prepare($sql);
        $req->execute();        
        $req->fetchAll(PDO::FETCH_OBJ);
        $datas=$req->rowCount();
        return $datas;
    }
    //recuperation de l'image
    function uploadImage() {
        $repertoire = '../assets/images/plat_images/';
        $nomImage = basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($nomImage, PATHINFO_EXTENSION));
    
        // Vérifier si le fichier est une image
        if(getimagesize($_FILES['image']['tmp_name'])) {
            // Déplacer l'image vers le répertoire plat_image
            if(move_uploaded_file($_FILES['image']['tmp_name'], $nomImage)) {
                return $nomImage;
            } else {
                return "Désolé, une erreur s'est produite lors du téléchargement de l'image.";
            }
        } else {
            return "Le fichier sélectionné n'est pas une image valide.";
        }
    }
#Ma base de données : 

DROP TABLE IF EXISTS Utilisateur;
CREATE TABLE Utilisateur(
        id_user      Int(25) Auto_increment,
        nom     Varchar (25),
        mot_de_passe     Varchar (25),
        email     Varchar (25),
        adresse     Varchar (25),
        role     Enum ("client","gestionnaire","livreur"),
        tel     Int (25),
        ville     Varchar (25),
        photo     Varchar (25),
        PRIMARY KEY (id_user)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS Plat;
CREATE TABLE Plat(
        id_plat      Int(25) Auto_increment,
        nom     Varchar (25),
        description     Varchar (25),
        image     Varchar (45),
        prix     Int (25)  default 0,
        etat     Char (1) default 'N',
        nbr_limite Int(25),
        id_menu_Menu Int (25),
        PRIMARY KEY (id_plat)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS Commande;
CREATE TABLE Commande(
        id_commande     Int(25)  Auto_increment ,
        date_commande     Datetime default CURRENT_TIMESTAMP,
        statut_paiement     Char (1) default 'N',
        statut_livraison     Char (1) default 'N',
        somme     Int (25)  default 0,
        id_user_Utilisateur     Int (25),
        id_paiement_paiement     Int (25),
        PRIMARY KEY (id_commande)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS Restaurant;
CREATE TABLE Restaurant(
        id_restau      Int(25) Auto_increment ,
        nom     Varchar (25),
        adresse     Varchar (25),
        tel     Int (25),
        ville     Varchar (25),
        PRIMARY KEY (id_restau)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS Menu;
CREATE TABLE Menu(
        id_menu     Int (25) Auto_increment ,
        nom     Varchar (25),
        PRIMARY KEY (id_menu)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS paiement;
CREATE TABLE paiement(
        id_paiement      Int(25) Auto_increment,
        statut     Char (1) default 'N',
        date_paiement     Datetime default CURRENT_TIMESTAMP,
        somme     Int (25) default 0,
        mode_paiement     Enum("Orange Money","MTN Mobile Money"),
        id_restau_Restaurant Int(25),
        PRIMARY KEY (id_paiement)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS Livraison;
CREATE TABLE Livraison(
        id      Int(25) Auto_increment,
        date_livraison     Datetime default CURRENT_TIMESTAMP,
        id_user_Utilisateur     Int(25),
        id_commande_Commande     Int(25),
        id_point_Liv_point_livraison     Int (25),
        PRIMARY KEY (id)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS commentaires;
CREATE TABLE commentaires(
        id_commentaire     Int (25) Auto_increment,
        message     Varchar (25),
        nb_etoile     Int (25) default 0,
        nb_avis     Int (25) default 0,
        nom_plat     Varchar (25),
        id_user_Utilisateur     Int(25),
        PRIMARY KEY (id_commentaire)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS point_livraison;
CREATE TABLE point_livraison(
        id_point_Liv     Int (25) Auto_increment,
        nom     Varchar (25),
        ville     Varchar (25),
        PRIMARY KEY (id_point_Liv)
)ENGINE=InnoDB;



DROP TABLE IF EXISTS est_composer;
CREATE TABLE est_composer(
        quantite     Int (25),
        frais     Int (25) default 1500,
        delai     Varchar (25) default "30 min",
        id_plat_Plat     Int(25),
        id_commande_Commande     Int (25),
        PRIMARY KEY (id_plat_Plat,id_commande_Commande)
)ENGINE=InnoDB;



ALTER TABLE Plat ADD CONSTRAINT FK_Plat_id_menu_Menu FOREIGN KEY (id_menu_Menu) REFERENCES Menu(id_menu);
ALTER TABLE Commande ADD CONSTRAINT FK_Commande_id_user_Utilisateur FOREIGN KEY (id_user_Utilisateur) REFERENCES Utilisateur(id_user);
ALTER TABLE Commande ADD CONSTRAINT FK_Commande_id_paiement_paiement FOREIGN KEY (id_paiement_paiement) REFERENCES paiement(id_paiement);
ALTER TABLE paiement ADD CONSTRAINT FK_paiement_id_restau_Restaurant FOREIGN KEY (id_restau_Restaurant) REFERENCES Restaurant(id_restau);
ALTER TABLE Livraison ADD CONSTRAINT FK_Livraison_id_user_Utilisateur FOREIGN KEY (id_user_Utilisateur) REFERENCES Utilisateur(id_user);
ALTER TABLE Livraison ADD CONSTRAINT FK_Livraison_id_commande_Commande FOREIGN KEY (id_commande_Commande) REFERENCES Commande(id_commande);
ALTER TABLE Livraison ADD CONSTRAINT FK_Livraison_id_point_Liv_point_livraison FOREIGN KEY (id_point_Liv_point_livraison) REFERENCES point_livraison(id_point_Liv);
ALTER TABLE commentaires ADD CONSTRAINT FK_commentaires_id_user_Utilisateur FOREIGN KEY (id_user_Utilisateur) REFERENCES Utilisateur(id_user);
ALTER TABLE est_composer ADD CONSTRAINT FK_est_composer_id_plat_Plat FOREIGN KEY (id_plat_Plat) REFERENCES Plat(id_plat);
ALTER TABLE est_composer ADD CONSTRAINT FK_est_composer_id_commande_Commande FOREIGN KEY (id_commande_Commande) REFERENCES Commande(id_commande);

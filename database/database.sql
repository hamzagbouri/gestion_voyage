-- CREATION DE LA BASE DE DONNEE
create database voyage;
-- CREATION DES TABLES;
create table client ( 
    id_client INT(11) AUTO_INCREMENT,
    nom VARCHAR(100),
    email VARCHAR(150) UNIQUE,
    telephone VARCHAR(15),
    adresse TEXT, 
    date_naissance DATE, 
    PRIMARY KEY(id_client) 
);
create table activite ( 
    id_activite INT(11) AUTO_INCREMENT,
    titre VARCHAR(150),
    description TEXT, 
    prix DECIMAL(10,2),
    date_debut DATE,
    date_fin DATE,
    places_disponibles INT(11),
    PRIMARY KEY(id_activite) 
);
CREATE TABLE reservation (
    id_reservation INT(11) AUTO_INCREMENT,
    id_client INT(11),
    id_activite INT(11),
    date_reservation TIMESTAMP,
    status ENUM('En Attente', 'Confirmée', 'Annulée'),
    PRIMARY KEY (id_reservation),
    FOREIGN KEY (id_client) REFERENCES client(id_client) 
        ON UPDATE CASCADE 
        ON DELETE CASCADE,
    FOREIGN KEY (id_activite) REFERENCES activite(id_activite) 
        ON UPDATE CASCADE 
        ON DELETE CASCADE
);

-- EXEMPLE D'AJOUT DES CHAMPS DANS LES TABLES

ALTER TABLE client 
ADD CIN VARCHAR(50);

ALTER TABLE activite 
ADD heure_debut TIME;

-- EXEMPLE DE MODIFICATION DES CHAMPS DANS DES TABLES
    -- modify type
ALTER TABLE client 
MODIFY CIN INT(11);
    -- modify name
ALTER TABLE client
CHANGE COLUMN `CIN` `identite` INT(11);

-- EXEMPLE DE SUPPRESION DE COLUMN

ALTER TABLE client 
DROP identite;
ALTER TABLE activite
DROP heure_debut;

-- modify table name

ALTER TABLE client RENAME clients;

-- DELETE TABLE 
DROP TABLE client;

-- INSERE DANS LA TABLE

INSERT INTO client (`nom`, `email`, `telephone`, `adresse`, `date_naissance`) 
VALUES ("Hamza GBOURI", "hamzagbouri@gmail.com", "0684608669", "Youssoufia", "2004-11-16");
INSERT INTO activite (`titre`,`description`,`prix`,`date_debut`,`date_fin`,`places_disponibles`)
 VALUES ("Voyage","Voyage Organisé","89.50","2024-11-04","2024-11-09","42");
 INSERT INTO reservation (`id_client`,`id_activite`,`date_reservation`,`status`) VALUES ("1","1","2024-12-07","En Attente");

 -- DELETE FROM TABLE

 DELETE from client where id = 1;

 -- modify on tbale
 UPDATE  client set `nom` = "Test" where id_client = 2;
 -- Afficher 
 Select * from activite
  join reservation
   on activite.id_activite = reservation.id_activite
   join client 
   on reservation.id_client = 2;

Select * from activite 
Inner Join reservation
 on activite.id_activite = reservation.id_activite
  Inner Join client
   on reservation.id_client=2;
DROP DATABASE IF EXISTS projet;
CREATE DATABASE IF NOT EXISTS projet;
USE projet;

CREATE TABLE User(
    idUser INTEGER PRIMARY KEY AUTO_INCREMENT,
    prenom VARCHAR(50),
    nom VARCHAR(50),
    tauxHoraire FLOAT,
    total FLOAT DEFAULT 0
);

CREATE TABLE Ticket(
    libelleMainNumTicket TEXT,
    defintion TEXT,
    idUser INTEGER, -- afficher nom et prénom du user
    idLigne INTEGER PRIMARY KEY AUTO_INCREMENT,
    libelleMail TEXT,
    numTicket INTEGER,
    dateTicket date,
    tempsDebut TIME,
    tempsFin TIME,
    tempsIntervention INT,
    statut VARCHAR(50),
    categorie VARCHAR(50),
    coeff FLOAT,
    FOREIGN KEY (idUser) REFERENCES User (idUser)
);
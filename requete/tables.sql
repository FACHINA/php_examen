CREATE TABLE filiere (
	codeFil VARCHAR(10) NOT NULL PRIMARY KEY,
    nomFil VARCHAR(255) NOT NULL
);

CREATE TABLE candidat (
	idCand INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    datenais DATE NOT NULL,
    ville VARCHAR(255) NOT NULL,
    sexe VARCHAR(1) NOT NULL,
    codeFil VARCHAR(10) NOT NULL,
    
    FOREIGN KEY (codeFil) REFERENCES filiere(codeFil)
    
);
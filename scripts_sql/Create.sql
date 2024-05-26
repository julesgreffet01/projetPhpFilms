CREATE TABLE Acteur(
   id_Act INT AUTO_INCREMENT,
   nom_Act VARCHAR(50) NOT NULL,
   pre_Act VARCHAR(50) NOT NULL,
   nat_Act VARCHAR(100) NOT NULL,
   dat_nai_Act DATE NOT NULL,
   CONSTRAINT acteur_PK PRIMARY KEY(id_Act))
   ENGINE = INNODB;


CREATE TABLE Realisateur(
   id_Real INT AUTO_INCREMENT,
   nom_Real VARCHAR(50) NOT NULL,
   pre_Real VARCHAR(50) NOT NULL,
   nat_Real VARCHAR(100) NOT NULL,
   rec_Real BOOLEAN NOT NULL,
   CONSTRAINT realisateur_PK PRIMARY KEY(id_Real))
   ENGINE = INNODB;

CREATE TABLE Classification(
   id_Cla INT AUTO_INCREMENT,
   lib_Cla VARCHAR(50) NOT NULL,
   CONSTRAINT classification_PK PRIMARY KEY(id_Cla))
   ENGINE = INNODB;




CREATE TABLE Genre(
   id_Gen INT AUTO_INCREMENT,
   lib_Gen VARCHAR(50) NOT NULL,
   CONSTRAINT genre_PK PRIMARY KEY(id_Gen))
   ENGINE = INNODB;


CREATE TABLE Administrateur(
   id_Admin INT AUTO_INCREMENT,
   nom_Admin VARCHAR(50) NOT NULL,
   pre_Admin VARCHAR(50) NOT NULL,
   mdp_Admin VARCHAR(100) NOT NULL,
   CONSTRAINT administrateur_PK PRIMARY KEY(id_Admin))
   ENGINE = INNODB;


CREATE TABLE Oeuvre(
   id_Oeuvre INT AUTO_INCREMENT,
   tit_ori_Oeuvre VARCHAR(100) NOT NULL,
   tit_fr_Oeuvre VARCHAR(100) NOT NULL,
   anne_sort_Oeuvre INT NOT NULL,
   res_Oeuvre VARCHAR(8000) NOT NULL,
   nb_ep_Oeuvre INT NOT NULL,
   img_Oeuvre VARCHAR(50) NOT NULL,
   id_Cla INT,
   CONSTRAINT oeuvre_PK PRIMARY KEY(id_Oeuvre),
   CONSTRAINT oeuvre_classification_FK FOREIGN KEY(id_Cla) REFERENCES 
   Classification(id_Cla))
   ENGINE = INNODB;

CREATE TABLE Realiser(
   id_Oeuvre INT,
   id_Real INT,
   CONSTRAINT realiser_PK PRIMARY KEY(id_Oeuvre, id_Real),
   CONSTRAINT realiser_oeuvre_FK FOREIGN KEY(id_Oeuvre) REFERENCES 
   Oeuvre(id_Oeuvre),
   CONSTRAINT realiser_realisateur_FK FOREIGN KEY(id_Real) REFERENCES 
   Realisateur(id_Real))
   ENGINE = INNODB;


CREATE TABLE Jouer(
   id_Act INT,
   id_Oeuvre INT,
   prem_role BOOLEAN NOT NULL,
   CONSTRAINT jouer_PK PRIMARY KEY(id_Act, id_Oeuvre),
   CONSTRAINT jouer_acteur_FK FOREIGN KEY(id_Act) REFERENCES 
   Acteur(id_Act),
   CONSTRAINT jouer_oeuvre_FK FOREIGN KEY(id_Oeuvre) REFERENCES 
   Oeuvre(id_Oeuvre))
   ENGINE = INNODB;



CREATE TABLE Appartenir(
   id_Oeuvre INT,
   id_Gen INT,
   CONSTRAINT appartenir_PK PRIMARY KEY(id_Oeuvre, id_Gen),
   CONSTRAINT appartenir_oeuvre_FK FOREIGN KEY(id_Oeuvre) REFERENCES 
   Oeuvre(id_Oeuvre),
   CONSTRAINT appartenir_genre_FK FOREIGN KEY(id_Gen) REFERENCES 
   Genre(id_Gen))
   ENGINE = INNODB;


   
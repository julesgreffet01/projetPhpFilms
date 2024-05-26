<?php

namespace DAO;

require_once ('ActeurDAO.php');
require_once ('GenreDAO.php');
require_once ('RealisateurDAO.php');
require_once ('ClassificationDAO.php');

use Bo\Oeuvre;


class OeuvreDAO {
    private $bdd;

    public function __construct(\PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function getAllOeuvre() : ?array
    {
        $resultSet = NULL;
        $query = 'SELECT * FROM Oeuvre';
        $rqtResult = $this->bdd->query($query);
        if ($rqtResult) {
            $rqtResult->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($rqtResult as $row ) {
                $dao = new ClassificationDAO($this->bdd);
                $laCla = $dao->findCla($row['id_Cla']);
                $resultSet[] = new Oeuvre($row['id_Oeuvre'],$row['tit_ori_Oeuvre'],$row['tit_fr_Oeuvre'],$row['anne_sort_Oeuvre'],$row['res_Oeuvre'],$row['nb_ep_Oeuvre'],$row['img_Oeuvre'],$laCla);
	    }
        }
        return $resultSet;
    }

    public function findOeuvre(int $id) : ?Oeuvre
    {
        $resultSet = NULL;
        $query = 'SELECT * FROM Oeuvre WHERE id_Oeuvre=:idOeuvre;';
        $reqPrep = $this->bdd->prepare($query);
        $res = $reqPrep->execute([':idOeuvre' => $id]);
        if ($res !== FALSE) {
            $row = $reqPrep->fetch(\PDO::FETCH_ASSOC);
            if(!is_null($row)) {
                $daoReal = new \DAO\RealisateurDAO($this->bdd);
                $daoGen = new \DAO\GenreDAO($this->bdd);
                $daoAct = new \DAO\ActeurDAO($this->bdd);
                $dao = new \DAO\ClassificationDAO($this->bdd);
                $laCla = $dao->findCla($row['id_Cla']);
                $resultSet = new Oeuvre($row['id_Oeuvre'],$row['tit_ori_Oeuvre'],$row['tit_fr_Oeuvre'],$row['anne_sort_Oeuvre'],$row['res_Oeuvre'],$row['nb_ep_Oeuvre'],$row['img_Oeuvre'],$laCla);

                $acteurs = $daoAct->getAllActByOeuvre($row['id_Oeuvre']);
                if ($acteurs === null) {
                    $acteurs = [];
                }
                $resultSet->setActeurs($acteurs);


                $acteursP = $daoAct->getAllActPByOeuvre($row['id_Oeuvre']);
                if ($acteursP === null) {
                    $acteursP = [];
                }
                $resultSet->setActeurP($acteursP);

                $genre = $daoGen->getAllGenByOeuvre($row['id_Oeuvre']);
                if ($genre === null) {
                    $genre = [];
                }
                $resultSet->setMesgenres($genre);

                $real = $daoReal->getAllRealByOeuvre($row['id_Oeuvre']);
                if ($real === null) {
                    $real = [];
                }
                $resultSet->setMesrealisateurs($real);
            }
        }
        return $resultSet;
    }

    public function getAllFilm() : ?array
    {
        $resultSet = NULL;
        $query = 'SELECT * FROM Oeuvre WHERE id_Cla = 1';
        $rqtResult = $this->bdd->query($query);
        if ($rqtResult) {
            $rqtResult->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($rqtResult as $row ) {
                $dao = new ClassificationDAO($this->bdd);
                $laCla = $dao->findCla($row['id_Cla']);
                $resultSet[] = new Oeuvre($row['id_Oeuvre'],$row['tit_ori_Oeuvre'],$row['tit_fr_Oeuvre'],$row['anne_sort_Oeuvre'],$row['res_Oeuvre'],$row['nb_ep_Oeuvre'],$row['img_Oeuvre'],$laCla);
            }
        }
        return $resultSet;
    }
    public function getAllSerie() : ?array
    {
        $resultSet = NULL;
        $query = 'SELECT * FROM Oeuvre WHERE id_Cla = 2';
        $rqtResult = $this->bdd->query($query);
        if ($rqtResult) {
            $rqtResult->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($rqtResult as $row ) {
                $dao = new ClassificationDAO($this->bdd);
                $laCla = $dao->findCla($row['id_Cla']);
                $resultSet[] = new Oeuvre($row['id_Oeuvre'],$row['tit_ori_Oeuvre'],$row['tit_fr_Oeuvre'],$row['anne_sort_Oeuvre'],$row['res_Oeuvre'],$row['nb_ep_Oeuvre'],$row['img_Oeuvre'],$laCla);
            }
        }
        return $resultSet;
    }
    public function getAllAnime() : ?array
    {
        $resultSet = NULL;
        $query = 'SELECT * FROM Oeuvre WHERE id_Cla = 3';
        $rqtResult = $this->bdd->query($query);
        if ($rqtResult) {
            $rqtResult->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($rqtResult as $row ) {
                $dao = new ClassificationDAO($this->bdd);
                $laCla = $dao->findCla($row['id_Cla']);
                $resultSet[] = new Oeuvre($row['id_Oeuvre'],$row['tit_ori_Oeuvre'],$row['tit_fr_Oeuvre'],$row['anne_sort_Oeuvre'],$row['res_Oeuvre'],$row['nb_ep_Oeuvre'],$row['img_Oeuvre'],$laCla);
            }
        }
        return $resultSet;
    }

    //----------------------------------------------CREATE------------------------------------------------------------
    public function createOeuvre(Oeuvre $entity): ?Oeuvre {
        $resultSet = NULL;

        // Insertion de l'oeuvre principale
        $query = "INSERT INTO Oeuvre (id_Oeuvre, tit_ori_Oeuvre, tit_fr_Oeuvre, anne_sort_Oeuvre, res_Oeuvre, nb_ep_Oeuvre, img_Oeuvre, id_Cla) VALUES (:idOeuvre, :titOri, :titFr, :anneeSort, :resOeuvre, :nbEp, :img, :Cla)";
        $reqPrep = $this->bdd->prepare($query);
        $res = $reqPrep->execute([
            ':idOeuvre' => $entity->getIdOeuvre(),
            ':titOri' => $entity->getTitreOriginal(),
            ':titFr' => $entity->getTitreFrancais(),
            ':anneeSort' => $entity->getAnneeSortie(),
            ':resOeuvre' => $entity->getResume(),
            ':nbEp' => $entity->getNombreEpisodes(),
            ':img' => $entity->getImage(),
            ':Cla' => $entity->getClassification()->getIdCla()
        ]);

        if ($res !== FALSE) {
            $entity->setIdOeuvre($this->bdd->lastInsertId());
        }

        // Insertion dans la table Jouer pour les acteurs principaux
        foreach ($entity->getActeurP() as $row) {
            if ($row !== null) { // Vérifier que $row n'est pas null
                $query = "INSERT INTO Jouer (id_Act, id_Oeuvre, prem_role) VALUES (:idAct, :idOeuvre, 1)";
                $reqPrep = $this->bdd->prepare($query);
                $reqPrep->execute([
                    ':idAct' => $row->getIdAct(),
                    ':idOeuvre' => $entity->getIdOeuvre()
                ]);
            }
        }

        // Insertion dans la table Jouer pour les acteurs secondaires
        foreach ($entity->getActeurs() as $row) {
            if ($row !== null) { // Vérifier que $row n'est pas null
                $query = "INSERT INTO Jouer (id_Act, id_Oeuvre, prem_role) VALUES (:idAct, :idOeuvre, 0)";
                $reqPrep = $this->bdd->prepare($query);
                $reqPrep->execute([
                    ':idAct' => $row->getIdAct(),
                    ':idOeuvre' => $entity->getIdOeuvre()
                ]);
            }
        }

        // Insertion dans la table Realiser
        foreach ($entity->getMesrealisateurs() as $row) {
            if ($row !== null) { // Vérifier que $row n'est pas null
                $query = "INSERT INTO Realiser (id_Oeuvre, id_Real) VALUES (:idOeuvre, :idReal)";
                $reqPrep = $this->bdd->prepare($query);
                $reqPrep->execute([
                    ':idOeuvre' => $entity->getIdOeuvre(),
                    ':idReal' => $row->getIdReal()
                ]);
            }
        }

        // Insertion dans la table Appartenir
        foreach ($entity->getMesgenres() as $row) {
            if ($row !== null) { // Vérifier que $row n'est pas null
                $query = "INSERT INTO Appartenir (id_Oeuvre, id_Gen) VALUES (:idOeuvre, :idGen)";
                $reqPrep = $this->bdd->prepare($query);
                $reqPrep->execute([
                    ':idOeuvre' => $entity->getIdOeuvre(),
                    ':idGen' => $row->getIdGen()
                ]);
            }
        }

        $resultSet = $entity;

        return $resultSet;
    }



    //----------------------------------------------------UPDATE--------------------------------------------
    public function updateOeuvre(Oeuvre $entity) {
        $resultSet = false;
        if ($entity->getIdOeuvre() !== null && $this->findOeuvre($entity->getIdOeuvre()) !== null) {
            $query = "UPDATE Oeuvre SET tit_ori_Oeuvre = :titOri, tit_fr_Oeuvre = :titFr, anne_sort_Oeuvre = :anneeSort, res_Oeuvre = :res, nb_ep_Oeuvre = :nbEp, img_Oeuvre=:img, id_Cla=:idCla WHERE id_Oeuvre = :idOeuvre";
            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute([
                ':titOri' => $entity->getTitreOriginal(),
                ':titFr'=> $entity->getTitreFrancais(),
                ':anneeSort' => $entity->getAnneeSortie(),
                ':res'=> $entity->getResume(),
                ':nbEp' => $entity->getNombreEpisodes(),
                ':img'=> $entity->getImage(),
                ':idCla'=> $entity->getClassification()->getIdCla(),
                ':idOeuvre'=> $entity->getIdOeuvre()
            ]);

            //-----------------------JOUER-----------------------------
            // Supprime les anciennes associations
            $query = "DELETE FROM Jouer WHERE id_Oeuvre = :idOeuvre";
            $reqPrep = $this->bdd->prepare($query);
            $reqPrep->execute([':idOeuvre' => $entity->getIdOeuvre()]);

            // Insère les nouvelles associations
            foreach ($entity->getActeurP() as $row){
                if ($row !== null) { // Vérifie que $row n'est pas null
                    $query = "INSERT INTO Jouer (id_Act, id_Oeuvre, prem_role) VALUES (:idAct, :idOeuvre, 1)";
                    $reqPrep = $this->bdd->prepare($query);
                    $reqPrep->execute([
                        ':idAct' => $row->getIdAct(),
                        ':idOeuvre' => $entity->getIdOeuvre()
                    ]);
                }
            }

            foreach ($entity->getActeurs() as $row){
                if ($row !== null) { // Vérifie que $row n'est pas null
                    $query = "INSERT INTO Jouer (id_Act, id_Oeuvre, prem_role) VALUES (:idAct, :idOeuvre, 0)";
                    $reqPrep = $this->bdd->prepare($query);
                    $reqPrep->execute([
                        ':idAct' => $row->getIdAct(),
                        ':idOeuvre' => $entity->getIdOeuvre()
                    ]);
                }
            }

            //--------------------------Genre------------------
            // Supprime les anciennes associations
            $query = "DELETE FROM Appartenir WHERE id_Oeuvre = :idOeuvre";
            $reqPrep = $this->bdd->prepare($query);
            $reqPrep->execute([':idOeuvre' => $entity->getIdOeuvre()]);

            // Insère les nouvelles associations
            foreach ($entity->getMesgenres() as $row){
                if ($row !== null) { // Vérifie que $row n'est pas null
                    $query = "INSERT INTO Appartenir (id_Oeuvre, id_Gen) VALUES (:idOeuvre, :idGen)";
                    $reqPrep = $this->bdd->prepare($query);
                    $reqPrep->execute([
                        ':idOeuvre' => $entity->getIdOeuvre(),
                        ':idGen' => $row->getIdGen()
                    ]);
                }
            }

            //--------------------------Realisateurs------------------------------
            // Supprime les anciennes associations
            $query = "DELETE FROM Realiser WHERE id_Oeuvre = :idOeuvre";
            $reqPrep = $this->bdd->prepare($query);
            $reqPrep->execute([':idOeuvre' => $entity->getIdOeuvre()]);

            // Insère les nouvelles associations
            foreach ($entity->getMesrealisateurs() as $row){
                if ($row !== null) { // Vérifie que $row n'est pas null
                    $query = "INSERT INTO Realiser (id_Oeuvre, id_Real) VALUES (:idOeuvre, :idReal)";
                    $reqPrep = $this->bdd->prepare($query);
                    $reqPrep->execute([
                        ':idOeuvre' => $entity->getIdOeuvre(),
                        ':idReal' => $row->getIdReal()
                    ]);
                }
            }

            $resultSet = $entity;
        }
        return $resultSet;
    }



//-------------------------------------------------DELETE----------------------------------------------------

    public function deleteOeuvre($idOeuvre) {
        $resultSet = false;

        if ($this->findOeuvre($idOeuvre) !== null) {
            // Supprimer les associations dans les tables Jouer, Realiser et Appartenir
            $query = "DELETE FROM Jouer WHERE id_Oeuvre = :idOeuvre";
            $reqPrep = $this->bdd->prepare($query);
            $reqPrep->execute([':idOeuvre' => $idOeuvre]);

            $query = "DELETE FROM Realiser WHERE id_Oeuvre = :idOeuvre";
            $reqPrep = $this->bdd->prepare($query);
            $reqPrep->execute([':idOeuvre' => $idOeuvre]);

            $query = "DELETE FROM Appartenir WHERE id_Oeuvre = :idOeuvre";
            $reqPrep = $this->bdd->prepare($query);
            $reqPrep->execute([':idOeuvre' => $idOeuvre]);

            // Supprimer l'oeuvre principale de la table Oeuvre
            $query = "DELETE FROM Oeuvre WHERE id_Oeuvre = :idOeuvre";
            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute([':idOeuvre' => $idOeuvre]);

            if ($res) {
                $resultSet = true;
            }
        }

        return $resultSet;
    }

}
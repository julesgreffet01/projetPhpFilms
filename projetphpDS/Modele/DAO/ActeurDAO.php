<?php

namespace DAO;

use Bo\Acteur;

class ActeurDAO {
    private $bdd;

    public function __construct(\PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function getAllAct() {
        $resultSet = NULL;
        $query = "SELECT * FROM Acteur";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt as $row ) {
                $resultSet[] = new Acteur($row['id_Act'],$row['nom_Act'],$row['pre_Act'],$row['nat_Act'],new \DateTime($row['dat_nai_Act']));
            }
        }
        return $resultSet;
    }

    public function findAct(int $id) {
        $resultSet = NULL;
        $query = "SELECT * FROM Acteur WHERE id_Act = :id";
        $stmt = $this->bdd->prepare($query);
        $res = $stmt->execute(array(':id' => $id));
        if ($res !== FALSE) {
            $row = ($tmp = $stmt->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if(!is_null($row)) {
                $resultSet = new Acteur($row['id_Act'],$row['nom_Act'],$row['pre_Act'],$row['nat_Act'],new \DateTime($row['dat_nai_Act']));
            }
        }
        return $resultSet;
    }

    public function createAct(Acteur $entity) {
        $resultSet = NULL;
        if ($entity->getIdAct()!= $this->findAct($entity->getIdAct())){
            $query = "INSERT INTO Acteur (nom_Act, pre_Act, nat_Act, dat_nai_Act) VALUES (:nomAct,:preAct,:natAct,:datNai)";
            $stmt = $this->bdd->prepare($query);
            $res = $stmt->execute(
                [
                    ':nomAct' => $entity->getNomAct(),
                    ':preAct' => $entity->getPrenomAct(),
                    ':natAct' => $entity->getNationaliteAct(),
                    ':datNai' => $entity->getDateNaissanceAct()->format('Y-m-d')
                ]
            );
            if ($res !== FALSE) {
                $entity->setIdAct($this->bdd->lastInsertId());
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }


    public function updateAct(Acteur $entity) {
        $resultSet = false;
        if ($entity->getIdAct() !== null && $this->findAct($entity->getIdAct()) !== null) {
            $query = "UPDATE Acteur " .
                "SET nom_Act = :nomAct, pre_Act = :preAct, nat_Act = :natAct, dat_nai_Act = :datNai " .
                "WHERE id_Act = :idAct";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':nomAct' => $entity->getNomAct(),
                    ':preAct' => $entity->getPrenomAct(),
                    ':natAct' => $entity->getNationaliteAct(),
                    ':datNai' => $entity->getDateNaissanceAct()->format('Y-m-d'), // Formatage de la date de naissance
                    ':idAct' => $entity->getIdAct()
                ]);

            if ($res !== false) {
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }

    public function deleteAct(Acteur $entity) {
        $resultSet = FALSE;
        if ($entity->getIdAct()!=null && $this->findAct($entity->getIdAct())!=null){
            $query = "DELETE FROM Acteur ".
                "WHERE id_Act = :idAct";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':idAct'=>$entity->getIdAct()
                ]);

            if ($res !== FALSE) {
                $resultSet = TRUE;
            }
        }
        return $resultSet;
    }


    public function getAllActByOeuvre(int $id){
        $resultSet = NULL;
        $query = "SELECT id_Act FROM Jouer WHERE id_Oeuvre = :id AND prem_role = 0";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute(array(':id' => $id));
        if ($stmt !== FALSE) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt as $row ) {
                $act = $this->findAct($row['id_Act']);
                    $resultSet[] = $act;

            }
        }
        return $resultSet;
    }

    public function getAllActPByOeuvre(int $id){
        $resultSet = NULL;
        $query = "SELECT id_Act FROM Jouer WHERE id_Oeuvre = :id AND prem_role = 1";
        $stmt = $this->bdd->prepare($query);
        $res = $stmt->execute(array(':id' => $id));
        if ($res !== FALSE) {
            foreach($stmt as $row ) {
                $act = $this->findAct($row['id_Act']);
                $resultSet [] = $act;
            }
        }
        return $resultSet;
    }

}


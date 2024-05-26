<?php

namespace DAO;

use Bo\Realisateur;
class RealisateurDAO {
    private $bdd;

    public function __construct(\PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function getAllReal() {
        $query = "SELECT * FROM Realisateur";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt as $row ) {
                $resultSet[] = new Realisateur($row['id_Real'],$row['nom_Real'],$row['pre_Real'],$row['nat_Real'],$row['rec_Real']);
            }
        }
        return $resultSet;
    }

    public function findReal(int $id) {
        $resultSet = NULL;
        $query = "SELECT * FROM Realisateur WHERE id_Real = :id";
        $stmt = $this->bdd->prepare($query);
        $res = $stmt->execute(array(':id' => $id));
        if ($res !== FALSE) {
            $row = ($tmp = $stmt->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if(!is_null($row)) {
                $resultSet = new Realisateur($row['id_Real'],$row['nom_Real'],$row['pre_Real'],$row['nat_Real'],$row['rec_Real']);
            }
        }
        return $resultSet;
    }

    public function createReal(Realisateur $entity) {
        if ($entity->getIdReal()!= $this->findReal($entity->getIdReal())){
            $query = "INSERT INTO Realisateur (nom_Real, pre_Real, nat_Real, rec_Real) VALUES (:nomReal,:preReal,:natReal,:recReal)";
            $stmt = $this->bdd->prepare($query);
            $res = $stmt->execute(
                [
                    ':nomReal' => $entity->getNomReal(),
                    ':preReal' => $entity->getPrenomReal(),
                    ':natReal' => $entity->getNationaliteReal(),
                    ':recReal' => $entity->getRecompenseReal()
                ]
            );
            if ($res !== FALSE) {
                $entity->setIdReal($this->bdd->lastInsertId());
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }

    public function updateReal(Realisateur $entity) {
        $resultSet = false;

        if ($entity->getIdReal() !== null && $this->findReal($entity->getIdReal()) !== null) {
            $query = "UPDATE Realisateur SET nom_Real = :nomReal, pre_Real = :preReal, nat_Real = :natReal, rec_Real = :recReal WHERE id_Real = :idReal";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':nomReal' => $entity->getNomReal(),
                    ':preReal' => $entity->getPrenomReal(),
                    ':natReal' => $entity->getNationaliteReal(),
                    ':recReal' => $entity->getRecompenseReal(), // Formatage de la date de naissance
                    ':idReal' => $entity->getIdReal()
                ]);

            if ($res !== false) {
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }

    public function deleteReal(Realisateur $entity) {
        $resultSet = FALSE;

        if ($entity->getIdReal()!=null && $this->findReal($entity->getIdReal())!=null){
            $query = "DELETE FROM Realisateur WHERE id_Real = :idReal";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':idReal'=>$entity->getIdReal()
                ]);

            if ($res !== FALSE) {
                $resultSet = TRUE;
            }
        }
        return $resultSet;
    }

    public function getAllRealByOeuvre(int $id){
        $resultSet = NULL;
        $query = "SELECT id_Real FROM Realiser WHERE id_Oeuvre = :id";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute(array(':id' => $id));
        if ($stmt !== FALSE) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt as $row ) {
                $real = $this->findReal($row['id_Real']);
                $resultSet[] = $real;

            }
        }
        return $resultSet;
    }
}

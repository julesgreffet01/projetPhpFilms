<?php

namespace DAO;

use Bo\Administrateur;

class AdministrateurDAO {
    private $bdd;

    public function __construct(\PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function getAllAdmin() {
        $query = "SELECT * FROM Administrateur";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt as $row ) {
                $resultSet[] = new Administrateur($row['id_Admin'],$row['nom_Admin'],$row['pre_Admin'],$row['mdp_Admin']);
            }
        }
        return $resultSet;
    }

    public function findAdmin(int $id) {
        $resultSet = NULL;
        $query = "SELECT * FROM Administrateur WHERE id_Admin = :id";
        $stmt = $this->bdd->prepare($query);
        $res = $stmt->execute(array(':id' => $id));
        if ($res !== FALSE) {
            $row = ($tmp = $stmt->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if(!is_null($row)) {
                $resultSet[] = new Administrateur($row['id_Admin'],$row['nom_Admin'],$row['pre_Admin'],$row['mdp_Admin']);
            }
        }
        return $resultSet;
    }


    //--------------------------------------------------------je suis la---------------------------------------------------
    public function createAdmin(Administrateur $entity) {
        if ($entity->getIdAdmin()!= $this->findAdmin($entity->getIdAdmin())){
            $query = "INSERT INTO Administrateur (nom_Admin, pre_Admin, mdp_Admin) VALUES (:nomAdmin,:preAdmin,:mdpAdmin)";
            $stmt = $this->bdd->prepare($query);
            $res = $stmt->execute(
                [
                    ':nomAdmin' => $entity->getNomAdmin(),
                    ':preAdmin' => $entity->getPrenomAdmin(),
                    ':mdpAdmin' => $entity->getMdpAdmin()
                ]
            );
            if ($res !== FALSE) {
                $entity->setIdAdmin($this->bdd->lastInsertId());
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }


    public function updateAdmin(Administrateur $entity) {
        $resultSet = false;
        if ($entity->getIdAdmin() !== null && $this->findAdmin($entity->getIdAdmin()) !== null){
            $query = "UPDATE Administrateur " .
                "SET nom_Admin = :nomAdmin, pre_Admin = :preAdmin, mdp_Admin = :mdpAdmin WHERE id_Admin = :idAdmin";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':nomAdmin' => $entity->getNomAdmin(),
                    ':preAdmin' => $entity->getPrenomAdmin(),
                    ':mdpAdmin' => $entity->getMdpAdmin(),
                    ':idAdmin' => $entity->getIdAdmin()
                ]);

            if ($res !== false) {
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }

    public function deleteAdmin(Administrateur $entity) {
        $resultSet = FALSE;
        if ($entity->getIdAdmin() !== null && $this->findAdmin($entity->getIdAdmin()) !== null){
            $query = "DELETE FROM Administrateur ".
                "WHERE id_Admin = :idAdmin";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':idAdmin'=>$entity->getIdAdmin()
                ]);

            if ($res !== FALSE) {
                $resultSet = TRUE;
            }
        }
        return $resultSet;
    }

    public function verifAdmin($nom, $password) {
        $req = $this->bdd->prepare("SELECT * FROM Administrateur WHERE nom_Admin = :nom AND mdp_Admin = :password");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':password', $password);
        $req->execute();
        $row = $req->fetch();

        if ($row) {
            $resultSet = new Administrateur($row['id_Admin'],$row['nom_Admin'],$row['pre_Admin'],$row['mdp_Admin']);
        }else {
            $resultSet = null;
        }
        return $resultSet;
    }
}


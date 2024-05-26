<?php

namespace DAO;
use Bo\Classification;
class ClassificationDAO {
    public function __construct(\PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function getAllCla() {
        $query = "SELECT * FROM Classification";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt as $row ) {
                $resultSet[] = new Classification($row['id_Cla'],$row['lib_Cla']);
            }
        }
        return $resultSet;
    }

    public function findCla(int $id) {
        $resultSet = NULL;
        $query = "SELECT * FROM Classification WHERE id_Cla = :id";
        $stmt = $this->bdd->prepare($query);
        $res = $stmt->execute(array(':id' => $id));
        if ($res !== FALSE) {
            $row = ($tmp = $stmt->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if(!is_null($row)) {
                $resultSet = new Classification($row['id_Cla'],$row['lib_Cla']);
            }
        }
        return $resultSet;
    }

    public function createCla(Classification $entity) {
        if ($entity->getIdCla()!= $this->findCla($entity->getIdCla())){
            $query = "INSERT INTO Classification (id_Cla, lib_Cla) VALUES (:idCla,:libCla)";
            $stmt = $this->bdd->prepare($query);
            $res = $stmt->execute(
                [
                    ':idCla' => $entity->getIdCla(),
                    ':libCla' => $entity->getLibCla()
                ]
            );
            if ($res !== FALSE) {
                $entity->setIdCla($this->bdd->lastInsertId());
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }


    public function updateCla(Classification $entity) {
        $resultSet = false;

        if ($entity->getIdCla() !== null && $this->findCla($entity->getIdCla()) !== null) {
            $query = "UPDATE Classification SET lib_Cla = :libCla WHERE id_Cla = :idCla";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':libCla' => $entity->getLibCla(),
                    ':idCla' => $entity->getIdCla()
                ]);

            if ($res !== false) {
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }

    public function deleteCla(Classification $entity) {
        $resultSet = FALSE;

        if ($entity->getIdCla()!=null && $this->findCla($entity->getIdCla())!=null){
            $query = "DELETE FROM Classification ".
                "WHERE id_Cla = :idCla";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':idCla'=>$entity->getIdCla()
                ]);

            if ($res !== FALSE) {
                $resultSet = TRUE;
            }
        }
        return $resultSet;
    }
}
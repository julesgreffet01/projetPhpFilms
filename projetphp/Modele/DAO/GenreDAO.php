<?php

namespace DAO;

use Bo\Genre;
class GenreDAO
{
    public function __construct(\PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    public function getAllGenre() {
        $query = "SELECT * FROM Genre";
        $stmt = $this->bdd->query($query);
        if ($stmt) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt as $row ) {
                $resultSet[] = new Genre($row['id_Gen'],$row['lib_Gen']);
            }
        }
        return $resultSet;
    }

    public function findGenre(int $id) {
        $resultSet = NULL;
        $query = "SELECT * FROM Genre WHERE id_Gen = :id";
        $stmt = $this->bdd->prepare($query);
        $res = $stmt->execute(array(':id' => $id));
        if ($res !== FALSE) {
            $row = ($tmp = $stmt->fetch(\PDO::FETCH_ASSOC)) ? $tmp : null;
            if(!is_null($row)) {
                $resultSet = new Genre($row['id_Gen'],$row['lib_Gen']);
            }
        }
        return $resultSet;
    }

    public function createGenre(Genre $entity) {
        if ($entity->getIdGen()!= $this->findGenre($entity->getIdGen())){
            $query = "INSERT INTO Genre (lib_Gen) VALUES (:libGen)";
            $stmt = $this->bdd->prepare($query);
            $res = $stmt->execute(
                [
                    ':libGen' => $entity->getLibGen()
                ]
            );
            if ($res !== FALSE) {
                $entity->setIdGen($this->bdd->lastInsertId());
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }

    public function updateGenre(Genre $entity) {
        $resultSet = false;
        if ($entity->getIdGen() !== null && $this->findGenre($entity->getIdGen()) !== null) {
            $query = "UPDATE Genre SET lib_Gen = :libGen WHERE id_Gen = :idGen";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':libGen' => $entity->getLibGen(),
                    ':idGen'=> $entity->getIdGen()
                ]);

            if ($res !== false) {
                $resultSet = $entity;
            }
        }
        return $resultSet;
    }

    public function deleteGenre(Genre $entity) {
        $resultSet = FALSE;

        if ($entity->getIdGen()!=null && $this->findGenre($entity->getIdGen())!=null){
            $query = "DELETE FROM Genre ".
                "WHERE id_Gen = :idGen";

            $reqPrep = $this->bdd->prepare($query);
            $res = $reqPrep->execute(
                [
                    ':idGen'=>$entity->getIdGen()
                ]);

            if ($res !== FALSE) {
                $resultSet = TRUE;
            }
        }
        return $resultSet;
    }

    public function getAllGenByOeuvre(int $id){
        $resultSet = [];
        $query = "SELECT id_Gen FROM Appartenir WHERE id_Oeuvre = :id ";
        $stmt = $this->bdd->prepare($query);
        $stmt->execute(array(':id' => $id));
        if ($stmt !== FALSE) {
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            foreach($stmt as $row ) {
                $gen = $this->findGenre($row['id_Gen']);
                $resultSet[] = $gen;

            }
        }
        return $resultSet;
    }
}
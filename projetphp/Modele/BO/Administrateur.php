<?php

namespace BO;

class Administrateur {
    private int $idAdmin;
    private string $nomAdmin;
    private string $prenomAdmin;
    private string $mdpAdmin;

    public function __construct(int $idAdmin, string $nomAdmin, string $prenomAdmin, string $mdpAdmin)
    {
        $this->idAdmin = $idAdmin;
        $this->nomAdmin = $nomAdmin;
        $this->prenomAdmin = $prenomAdmin;
        $this->mdpAdmin = $mdpAdmin;
    }

    public function getIdAdmin(): int
    {
        return $this->idAdmin;
    }

    public function setIdAdmin(int $idAdmin): void
    {
        $this->idAdmin = $idAdmin;
    }

    public function getNomAdmin(): string
    {
        return $this->nomAdmin;
    }

    public function setNomAdmin(string $nomAdmin): void
    {
        $this->nomAdmin = $nomAdmin;
    }

    public function getPrenomAdmin(): string
    {
        return $this->prenomAdmin;
    }

    public function setPrenomAdmin(string $prenomAdmin): void
    {
        $this->prenomAdmin = $prenomAdmin;
    }

    public function getMdpAdmin(): string
    {
        return $this->mdpAdmin;
    }

    public function setMdpAdmin(string $mdpAdmin): void
    {
        $this->mdpAdmin = $mdpAdmin;
    }
}

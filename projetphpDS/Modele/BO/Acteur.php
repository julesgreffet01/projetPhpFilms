<?php

namespace BO;

class Acteur {
    private int $idAct;
    private string $nomAct;
    private string $prenomAct;
    private string $nationaliteAct;
    private \DateTime $dateNaissanceAct;

    public function __construct(int $idAct, string $nomAct, string $prenomAct, string $nationaliteAct, \DateTime $dateNaissanceAct)
    {
        $this->idAct = $idAct;
        $this->nomAct = $nomAct;
        $this->prenomAct = $prenomAct;
        $this->nationaliteAct = $nationaliteAct;
        $this->dateNaissanceAct = $dateNaissanceAct;
    }

    public function getIdAct(): int
    {
        return $this->idAct;
    }

    public function setIdAct(int $idAct): void
    {
        $this->idAct = $idAct;
    }

    public function getNomAct(): string
    {
        return $this->nomAct;
    }

    public function setNomAct(string $nomAct): void
    {
        $this->nomAct = $nomAct;
    }

    public function getPrenomAct(): string
    {
        return $this->prenomAct;
    }

    public function setPrenomAct(string $prenomAct): void
    {
        $this->prenomAct = $prenomAct;
    }

    public function getNationaliteAct(): string
    {
        return $this->nationaliteAct;
    }

    public function setNationaliteAct(string $nationaliteAct): void
    {
        $this->nationaliteAct = $nationaliteAct;
    }

    public function getDateNaissanceAct(): \DateTime
    {
        return $this->dateNaissanceAct;
    }

    public function setDateNaissanceAct(\DateTime $dateNaissanceAct): void
    {
        $this->dateNaissanceAct = $dateNaissanceAct;
    }
}


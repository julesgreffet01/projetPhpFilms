<?php

namespace BO;

class Realisateur {
    private int $idReal;
    private string $nomReal;
    private string $prenomReal;
    private string $nationaliteReal;
    private bool $recompenseReal;

    public function __construct(int $idReal, string $nomReal, string $prenomReal, string $nationaliteReal, bool $recompenseReal)
    {
        $this->idReal = $idReal;
        $this->nomReal = $nomReal;
        $this->prenomReal = $prenomReal;
        $this->nationaliteReal = $nationaliteReal;
        $this->recompenseReal = $recompenseReal;
    }

    public function getIdReal(): int
    {
        return $this->idReal;
    }

    public function setIdReal(int $idReal): void
    {
        $this->idReal = $idReal;
    }

    public function getNomReal(): string
    {
        return $this->nomReal;
    }

    public function setNomReal(string $nomReal): void
    {
        $this->nomReal = $nomReal;
    }

    public function getPrenomReal(): string
    {
        return $this->prenomReal;
    }

    public function setPrenomReal(string $prenomReal): void
    {
        $this->prenomReal = $prenomReal;
    }

    public function getNationaliteReal(): string
    {
        return $this->nationaliteReal;
    }

    public function setNationaliteReal(string $nationaliteReal): void
    {
        $this->nationaliteReal = $nationaliteReal;
    }

    public function getRecompenseReal(): bool
    {
        return $this->recompenseReal;
    }

    public function setRecompenseReal(bool $recompenseReal): void
    {
        $this->recompenseReal = $recompenseReal;
    }
}

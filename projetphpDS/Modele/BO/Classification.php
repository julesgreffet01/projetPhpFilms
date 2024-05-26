<?php

namespace BO;

class Classification {
    private int $idCla;
    private string $libCla;

    public function __construct(int $idCla, string $libCla)
    {
        $this->idCla = $idCla;
        $this->libCla = $libCla;
    }

    public function getIdCla(): int
    {
        return $this->idCla;
    }

    public function setIdCla(int $idCla): void
    {
        $this->idCla = $idCla;
    }

    public function getLibCla(): string
    {
        return $this->libCla;
    }

    public function setLibCla(string $libCla): void
    {
        $this->libCla = $libCla;
    }

}
<?php

namespace BO;

class Genre
{
    private int $idGen;
    private string $libGen;

    public function __construct(int $idGen, string $libGen)
    {
        $this->idGen = $idGen;
        $this->libGen = $libGen;
    }

    public function getIdGen(): int
    {
        return $this->idGen;
    }

    public function setIdGen(int $idGen): void
    {
        $this->idGen = $idGen;
    }

    public function getLibGen(): string
    {
        return $this->libGen;
    }

    public function setLibGen(string $libGen): void
    {
        $this->libGen = $libGen;
    }


}
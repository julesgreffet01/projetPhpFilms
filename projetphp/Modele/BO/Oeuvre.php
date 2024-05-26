<?php

namespace BO;

class Oeuvre {
    private int $idOeuvre;
    private string $titreOriginal;
    private string $titreFrancais;
    private int $anneeSortie;
    private string $resume;
    private int $nombreEpisodes;
    private string $image;
    private array $acteurs;
    private array $acteurP;
    private array $mesgenres;
    private array $mesrealisateurs;
    private Classification $classification;

    public function __construct(int $idOeuvre, string $titreOriginal, string $titreFrancais, int $anneeSortie, string $resume, int $nombreEpisodes, string $image, Classification $classification)
    {
        $this->idOeuvre = $idOeuvre;
        $this->titreOriginal = $titreOriginal;
        $this->titreFrancais = $titreFrancais;
        $this->anneeSortie = $anneeSortie;
        $this->resume = $resume;
        $this->nombreEpisodes = $nombreEpisodes;
        $this->image = $image;
        $this->classification = $classification;
        $this->acteurs = [null];
        $this->acteurP = [null];
        $this->mesgenres = [null];
        $this->mesrealisateurs = [null];
    }

    public function getIdOeuvre(): int
    {
        return $this->idOeuvre;
    }

    public function setIdOeuvre(int $idOeuvre): void
    {
        $this->idOeuvre = $idOeuvre;
    }

    public function getTitreOriginal(): string
    {
        return $this->titreOriginal;
    }

    public function setTitreOriginal(string $titreOriginal): void
    {
        $this->titreOriginal = $titreOriginal;
    }

    public function getTitreFrancais(): string
    {
        return $this->titreFrancais;
    }

    public function setTitreFrancais(string $titreFrancais): void
    {
        $this->titreFrancais = $titreFrancais;
    }

    public function getAnneeSortie(): int
    {
        return $this->anneeSortie;
    }

    public function setAnneeSortie(int $anneeSortie): void
    {
        $this->anneeSortie = $anneeSortie;
    }

    public function getResume(): string
    {
        return $this->resume;
    }

    public function setResume(string $resume): void
    {
        $this->resume = $resume;
    }

    public function getNombreEpisodes(): int
    {
        return $this->nombreEpisodes;
    }

    public function setNombreEpisodes(int $nombreEpisodes): void
    {
        $this->nombreEpisodes = $nombreEpisodes;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getClassification(): Classification
    {
        return $this->classification;
    }

    public function setClassification(Classification $classification): void
    {
        $this->classification = $classification;
    }

    public function getActeurs(): array
    {
        return $this->acteurs;
    }

    public function setActeurs(array $acteurs): void
    {
        $this->acteurs = $acteurs;
    }

    public function getActeurP(): array
    {
        return $this->acteurP;
    }

    public function setActeurP(array $acteurP): void
    {
        $this->acteurP = $acteurP;
    }

    public function getMesgenres(): array
    {
        return $this->mesgenres;
    }

    public function setMesgenres(array $mesgenres): void
    {
        $this->mesgenres = $mesgenres;
    }

    public function getMesrealisateurs(): array
    {
        return $this->mesrealisateurs;
    }

    public function setMesrealisateurs(array $mesrealisateurs): void
    {
        $this->mesrealisateurs = $mesrealisateurs;
    }



}

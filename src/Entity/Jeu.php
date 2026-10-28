<?php

namespace App\Entity;

use App\Enum\StatutJeu;
use App\Repository\JeuRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: JeuRepository::class)]
class Jeu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    #[Assert\Range(min: 0, max: 10, notInRangeMessage: 'La note doit être entre {{ min }} et {{ max }}.')]
    private ?int $note = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 100)]
    private ?string $plateforme = null;

    #[ORM\Column(length: 50, enumType: StatutJeu::class)]
    private ?StatutJeu $statut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getPlateforme(): ?string
    {
        return $this->plateforme;
    }

    public function setPlateforme(string $plateforme): static
    {
        $this->plateforme = $plateforme;

        return $this;
    }

    public function getStatut(): ?StatutJeu
    {
        return $this->statut;
    }

    public function setStatut(StatutJeu $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(?int $note): static
    {
        $this->note = $note;

        return $this;
    }
}
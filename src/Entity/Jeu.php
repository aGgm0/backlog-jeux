<?php

namespace App\Entity;

use App\Repository\JeuRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;


#[ORM\Entity(repositoryClass: JeuRepository::class)]
class Jeu
{
    #[Assert\Callback]
    public function validate(ExecutionContextInterface $context): void
    {
        if ($this->sansFin && $this->statut === 'fini') {
            $context->buildViolation('Un jeu sans fin ne peut pas être "fini".')
                ->atPath('statut')
                ->addViolation();
        }
    }
    #[ORM\Id]   
    #[ORM\GeneratedValue]
    #[ORM\Column(nullable: true)]
    #[Assert\Range(min: 0, max: 10, notInRangeMessage: 'La note doit être entre {{ min }} et {{ max }}.')]
    private ?int $note = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 100)]
    private ?string $plateforme = null;

    #[ORM\Column(length: 50)]
    private ?string $statut = null;

    #[ORM\Column]
    private ?bool $sansFin = null;

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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): static
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

    public function isSansFin(): ?bool
    {
        return $this->sansFin;
    }

    public function setSansFin(bool $sansFin): static
    {
        $this->sansFin = $sansFin;

        return $this;
    }
}

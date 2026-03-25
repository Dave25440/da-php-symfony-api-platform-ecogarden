<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\MonthRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: MonthRepository::class)]
#[UniqueEntity(fields: ['number'], message: 'Ce numéro de mois existe déjà.')]
#[ApiResource]
class Month
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private ?int $id = null;

    #[ORM\Column(name: 'number', unique: true)]
    #[Groups(['tip_list'])]
    #[Assert\NotNull(message: 'Le numéro du mois est obligatoire.')]
    #[Assert\Choice(
        choices: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
        message: 'Le mois numéro {{ value }} est invalide.'
    )]
    private ?int $number = null;

    #[ORM\Column(name: 'name', length: 255)]
    #[Groups(['tip_list'])]
    #[Assert\NotBlank(message: 'Le nom du mois est obligatoire.')]
    #[Assert\Choice(
        choices: [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
        ],
        message: 'Le nom du mois "{{ value }}" est invalide.'
    )]
    private ?string $name = null;

    /**
     * @var Collection<int, Tip>
     */
    #[ORM\ManyToMany(targetEntity: Tip::class, mappedBy: 'months')]
    private Collection $tips;

    public function __construct()
    {
        $this->tips = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Tip>
     */
    public function getTips(): Collection
    {
        return $this->tips;
    }

    public function addTip(Tip $tip): static
    {
        if (!$this->tips->contains($tip)) {
            $this->tips->add($tip);
        }

        return $this;
    }

    public function removeTip(Tip $tip): static
    {
        $this->tips->removeElement($tip);

        return $this;
    }
}

<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\OpenApi\Model;
use App\Controller\TipController;
use App\Repository\TipRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TipRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            name: 'legacy_tips_index',
            uriTemplate: '/legacy/tips',
            controller: TipController::class,
            read: false,
            paginationEnabled: false,
            openapi: new Model\Operation(
                tags: ['Legacy Tip'],
                summary: 'Liste les conseils du mois courant.',
                description: 'Renvoie la liste des conseils de jardinage liés au mois courant.',
                responses: [
                    200 => new Model\Response(description: 'Liste des conseils de jardinage du mois courant')
                ]
            )
        ),
        new GetCollection(
            name: 'legacy_tips_show',
            uriTemplate: '/legacy/tips/{month}',
            uriVariables: ['month'],
            requirements: ['month' => '^(1[0-2]|[1-9])$'],
            controller: TipController::class,
            read: false,
            paginationEnabled: false,
            openapi: new Model\Operation(
                tags: ['Legacy Tip'],
                summary: 'Récupère les conseils d\'un mois donné.',
                description: 'Renvoie la liste des conseils de jardinage liés au mois spécifié en paramètre (de 1 à 12).',
                parameters: [
                    new Model\Parameter(
                        name: 'month',
                        in: 'path',
                        description: 'Numéro du mois (1 à 12)',
                        required: true,
                        schema: ['type' => 'integer', 'minimum' => 1, 'maximum' => 12]
                    )
                ],
                responses: [
                    200 => new Model\Response(description: 'Liste des conseils de jardinage du mois spécifié')
                ]
            )
        )
    ]
)]
class Tip
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    #[Groups(['tip_list', 'tip_detail'])]
    private ?int $id = null;

    #[ORM\Column(name: 'content', type: Types::TEXT)]
    #[Groups(['tip_list', 'tip_detail'])]
    #[Assert\NotBlank(message: 'Le conseil est obligatoire.')]
    private ?string $content = null;

    /**
     * @var Collection<int, Month>
     */
    #[ORM\ManyToMany(targetEntity: Month::class, inversedBy: 'tips')]
    #[ORM\JoinTable(
        name: 'tip_month',
        joinColumns: [new ORM\JoinColumn(name: 'tip_id', referencedColumnName: 'id')],
        inverseJoinColumns: [new ORM\JoinColumn(name: 'month_id', referencedColumnName: 'id')]
    )]
    #[Groups(['tip_list'])]
    #[Assert\Count(min: 1, minMessage: 'Au moins un mois doit être sélectionné.')]
    private Collection $months;

    public function __construct()
    {
        $this->months = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return Collection<int, Month>
     */
    public function getMonths(): Collection
    {
        return $this->months;
    }

    public function addMonth(Month $month): static
    {
        if (!$this->months->contains($month)) {
            $this->months->add($month);
            $month->addTip($this);
        }

        return $this;
    }

    public function removeMonth(Month $month): static
    {
        if ($this->months->removeElement($month)) {
            $month->removeTip($this);
        }

        return $this;
    }
}

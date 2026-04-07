<?php

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\OpenApi\Model;
use App\Entity\Month;
use App\Entity\Tip as TipEntity;
use App\State\TipProvider;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\ObjectMapper\Attribute\Map;
use Symfony\Component\Serializer\Attribute\Groups;

#[ApiResource(
    shortName: 'Tip',
    stateOptions: new Options(entityClass: TipEntity::class),
    operations: [
        new GetCollection(
            name: 'tips_index',
            uriTemplate: '/tips',
            provider: TipProvider::class,
            paginationEnabled: false,
            normalizationContext: ['groups' => ['tip_list']],
            openapi: new Model\Operation(
                summary: 'Liste les conseils du mois courant.',
                description: 'Renvoie la liste des conseils de jardinage liés au mois courant.',
                responses: [
                    200 => new Model\Response(description: 'Liste des conseils de jardinage du mois courant')
                ]
            )
        ),
        new GetCollection(
            name: 'tips_show',
            uriTemplate: '/tips/{month}',
            uriVariables: ['month'],
            requirements: ['month' => '^(1[0-2]|[1-9])$'],
            provider: TipProvider::class,
            paginationEnabled: false,
            normalizationContext: ['groups' => ['tip_detail']],
            openapi: new Model\Operation(
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
#[Map(source: TipEntity::class)]
final class Tip
{
    #[Groups(['tip_list', 'tip_detail'])]
    public int $id;

    #[Groups(['tip_list', 'tip_detail'])]
    public string $content;

    #[Map(transform: [self::class, 'mapMonths'])]
    #[Groups(['tip_list'])]
    public array $months;

    public static function mapMonths(mixed $months, object $source): array
    {
        if ($months instanceof Collection) {
            return $months->map(fn(Month $month) => [
                'number' => $month->getNumber(),
                'name' => $month->getName()
            ])->toArray();
        }

        return [];
    }
}

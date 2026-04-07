<?php

namespace App\ApiResource;

use ApiPlatform\Doctrine\Orm\State\Options;
use ApiPlatform\Metadata\ApiResource;
use App\Entity\Month;
use App\Entity\Tip as TipEntity;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\ObjectMapper\Attribute\Map;
use Symfony\Component\Serializer\Attribute\Groups;

#[ApiResource(
    shortName: 'Tip',
    stateOptions: new Options(entityClass: TipEntity::class)
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

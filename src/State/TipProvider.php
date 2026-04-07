<?php

namespace App\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use App\ApiResource\Tip;
use App\Repository\TipRepository;

final class TipProvider implements ProviderInterface
{
    public function __construct(
        private readonly TipRepository $tipRepository,
    ) {}

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): iterable|Tip|null
    {
        $month = $uriVariables['month'] ?? (int) date('n');

        return $this->tipRepository->findByMonth($month);
    }
}

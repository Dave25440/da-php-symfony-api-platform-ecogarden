<?php

namespace App\Controller;

use App\Repository\TipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

final class TipController extends AbstractController
{
    public function __construct(
        private readonly SerializerInterface $serializer,
    ) {}

    /**
     * Liste les conseils du mois courant ou d'un mois donné s'il est précisé.
     * 
     * @param int $month
     * @param TipRepository $tipRepository
     * @return JsonResponse
     */
    public function __invoke(?int $month = null, TipRepository $tipRepository): JsonResponse
    {
        $isCurrentMonth = $month === null;
        $month = $month ?? (int) date('n');
        $tips = $tipRepository->findByMonth($month);

        $group = $isCurrentMonth ? 'tip_list' : 'tip_detail';
        $jsonTips = $this->serializer->serialize($tips, 'json', ['groups' => $group]);

        return new JsonResponse($jsonTips, Response::HTTP_OK, [], true);
    }
}

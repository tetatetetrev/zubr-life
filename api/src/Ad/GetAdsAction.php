<?php

namespace App\Ad;

use Doctrine\DBAL\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetAdsAction extends AbstractController
{
    public function __invoke(Connection $connection): JsonResponse
    {
        return $this->json([
            'data' => $connection->fetchAllAssociative(
                'SELECT 
                        id, 
                        name, 
                        description 
                   FROM ad
                  WHERE hidden is NULL AND approved IS NOT NULL
               ORDER BY created_at DESC'
            ),
        ]);
    }
}

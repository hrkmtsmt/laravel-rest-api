<?php

declare(strict_types=1);

namespace App\Http\Actions\Todo;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;

use Root\Todo\Entity\TodoEntity;

class GetAction extends Controller
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function __invoke(): array
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('t.id', 't.title', 't.isCompleted')->from(TodoEntity::class, 't');

        return $queryBuilder->getQuery()->getResult();
    }
}

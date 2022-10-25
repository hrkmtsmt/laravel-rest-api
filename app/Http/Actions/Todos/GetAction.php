<?php

declare(strict_types=1);

namespace App\Http\Actions\Todos;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;

use Root\Todo\Entity\Todo;

class GetAction extends Controller
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(): array
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('t')->from(Todo::class, 't');

        return $queryBuilder->getQuery()->getResult();
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Actions\Todos;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Response;

use Root\Todo\Entity\Todo;

class GetAction extends Controller
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function __invoke(): Response
    {
        $queryBuilder = $this->entityManager->createQueryBuilder('t');
        $queryBuilder->select('t.id', 't.title', 't.isCompleted', 't.createdAt')
            ->from(Todo::class, 't');

        return $queryBuilder->getQuery()->getResult();
    }
}

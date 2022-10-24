<?php

declare(strict_types=1);

namespace App\Http\Actions\Todo\Item;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Root\Todo\Entity\TodoEntity;

class GetAction extends Controller
{
    private EntityManagerInterface $entityManager;
    private TodoEntity $todo;

    public function __construct(EntityManagerInterface $entityManager, TodoEntity $todo)
    {
        $this->entityManager = $entityManager;
        $this->todo = $todo;
    }

    public function __invoke(int $id)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('t.id', 't.title', 't.isCompleted', 't.createdAt')
            ->from(TodoEntity::class, 't')
            ->where("t.id = $id");

        return $queryBuilder->getQuery()->getResult()[0];
    }

}

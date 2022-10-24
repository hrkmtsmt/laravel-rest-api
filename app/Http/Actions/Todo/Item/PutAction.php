<?php

declare(strict_types=1);

namespace App\Http\Actions\Todo\Item;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Root\Todo\Entity\TodoEntity;

class PutAction extends Controller
{
    private EntityManagerInterface $entityManager;
    private TodoEntity $todo;

    public function __construct(EntityManagerInterface $entityManager, TodoEntity $todo)
    {
        $this->entityManager = $entityManager;
        $this->todo = $todo;
    }

    public function __invoke(Request $request, int $id): Response
    {
        $title = $request->input('title');
        $isCompleted = $request->input('isCompleted');

        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->update(TodoEntity::class, 't')
            ->set('title', $title)
            ->set('isCompleted', $isCompleted)
            ->where("t.id = $id");

        $queryBuilder->getQuery()->execute();

        return ['hello'];
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Actions\Todo;

use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;

use Root\Todo\Entity\TodoEntity;

class PostAction extends Controller
{
    private EntityManager $entityManager;
    private TodoEntity $todo;

    public function __construct(EntityManager $entityManager, TodoEntity $todo)
    {
        $this->entityManager = $entityManager;
        $this->todo = $todo;
    }

    public function __invoke(Request $request): array
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $title = $request->input('title');
        $isCompleted = $request->input('isCompleted');

        $this->todo->setId();
        $this->todo->setTitle($title);
        $this->todo->setIsCompleted($isCompleted);

        $this->entityManager->persist($this->todo);

        $this->entityManager->flush();

        return ['message' => 'Success'];
    }
}

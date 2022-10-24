<?php

declare(strict_types=1);

namespace App\Http\Actions\Todo;

<<<<<<< HEAD
=======
use App\Http\Controllers;
>>>>>>> 3cb3b39e465d0df0b7d549eec8dec5efed77579f
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
<<<<<<< HEAD
=======
        $queryBuilder = $this->entityManager->createQueryBuilder();

>>>>>>> 3cb3b39e465d0df0b7d549eec8dec5efed77579f
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

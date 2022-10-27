<?php

declare(strict_types=1);

namespace App\Http\Actions\Todos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\Response;

use Root\Todo\Entity\Todo;

class PostAction extends Controller
{
    public function __construct(private EntityManager $entityManager, private Todo $todo)
    {}

    public function __invoke(Request $request): Response
    {
        $title = $request->input('title');
        $isCompleted = $request->input('isCompleted');

        $this->todo->createId()
            ->setTitle($title)
            ->setIsCompleted($isCompleted)
            ->createCreatedAt();

        $this->entityManager->persist($this->todo);
        $this->entityManager->flush();

        $queryBuilder = $this->entityManager->createQueryBuilder('t');
        $queryBuilder->select('t.id', 't.title', 't.isCompleted', 't.createdAt')
            ->from(Todo::class, 't');

        return $queryBuilder->getQuery()->getResult();
    }
}

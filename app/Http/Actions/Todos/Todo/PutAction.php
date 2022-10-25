<?php

declare(strict_types=1);

namespace App\Http\Actions\Todos\Todo;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Root\Todo\Entity\Todo;

class PutAction extends Controller
{
    public function __construct(private EntityManagerInterface $entityManager, private Todo $todo)
    {}

    public function __invoke(Request $request, int $todoId)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('t.id')
            ->from(Todo::class, 't')
            ->where("t.id = $todoId");

        $_todoId = $queryBuilder->getQuery()->getResult();

        $title = $request->input('title');
        $isCompleted = $request->input('isCompleted');

        if (empty($_todoId)) {
            $this->todo->createId();
            $this->todo->setTitle($title);
            $this->todo->setIsCompleted($isCompleted);
            $this->todo->createCreatedAt();

            $this->entityManager->persist($this->todo);
            $this->entityManager->flush();

            return ['message' => 'Created new resource!'];
        }

        $queryBuilder->update(Todo::class, 't')
            ->set('t.title', "'$title'")
            ->set('t.isCompleted', $isCompleted)
            ->where("t.id = $todoId");

        $queryBuilder->getQuery()->execute();

        return ['message' => 'Updated todo!'];
    }
}

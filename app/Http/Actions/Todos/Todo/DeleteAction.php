<?php

declare(strict_types=1);

namespace App\Http\Actions\Todos\Todo;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Response;

use Root\Todo\Entity\Todo;

class DeleteAction extends Controller
{
    public function __construct(private EntityManagerInterface $entityManager, private Todo $todo)
    {}

    public function __invoke(int $todoId)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('t.id')
            ->from(Todo::class, 't')
            ->where("t.id = $todoId");

        $_todoId = $queryBuilder->getQuery()->getResult();

        if (empty($_todoId)) {
            return [
                'status' => 422,
                'message' => "Id $todoId is not found. Can not delete."
            ];
        }

        $queryBuilder->delete(Todo::class, 'todo')
            ->set('id', $todoId)
            ->where("todo.id = $todoId");

        $queryBuilder->getQuery()->execute();

        return ['message' => "Deleted id $todoId Todo."];
    }
}

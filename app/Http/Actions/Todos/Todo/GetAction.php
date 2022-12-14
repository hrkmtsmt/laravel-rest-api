<?php

declare(strict_types=1);

namespace App\Http\Actions\Todos\Todo;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Response;

use Root\Todo\Entity\Todo;

class GetAction extends Controller
{
    public function __construct(private EntityManagerInterface $entityManager, private Todo $todo)
    {}

    public function __invoke(int $todoId)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('t.id', 't.title', 't.isCompleted', 't.createdAt')
            ->from(Todo::class, 't')
            ->where("t.id = $todoId");

        $todo = $queryBuilder->getQuery()->getResult();

        if (empty($todo)) {
            return ['message' => "Id $todoId Todo is not found."];
        }

        return $todo[0];
    }

}

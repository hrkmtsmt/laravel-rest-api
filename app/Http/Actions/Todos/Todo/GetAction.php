<?php

declare(strict_types=1);

namespace App\Http\Actions\Todos\Todo;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Root\Todo\Entity\Todo;

class GetAction extends Controller
{
    public function __construct(private EntityManagerInterface $entityManager, private Todo $todo)
    {}

    public function __invoke(int $id)
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();

        $queryBuilder->select('t')
            ->from(Todo::class, 't')
            ->where("t.id = $id");

        return $queryBuilder->getQuery()->getResult()[0];
    }

}

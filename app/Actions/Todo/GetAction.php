<?php

declare(strict_types=1);

namespace App\Http\Actions\Todo;

use App\Http\Controllers\Controller;
use Todo\Repository\TodoRepository as Repository;
use Doctrine\ORM\EntityManagerInterface as EntityManager;

class GetAction extends Controller
{
    private Repository $repository;
    private EntityManger $entityManager;

    public function __construct(Repository $repository, EntityManager $entityManager)
    {
        $this->repository = $repository;
        $this->entityManager = $entityManager;
    }

    public function __invoke(): array
    {
        return $this->repository->findAll();
    }
}

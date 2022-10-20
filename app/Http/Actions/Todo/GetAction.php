<?php

declare(strict_types=1);

namespace App\Http\Actions\Todo;

use App\Http\Controllers\Controller;
//use Doctrine\ORM\EntityManagerInterface;

use Root\Todo\Repository\TodoRepository;

class GetAction extends Controller
{
    private TodoRepository $repository;
//    private EntityManger $entityManager;

    public function __construct(TodoRepository $repository /*, EntityManagerInterface $entityManager */)
    {
        $this->repository = $repository;
//        $this->entityManager = $entityManager;
    }

    public function __invoke(): array
    {
        return ['message' => 'Hello World!'];
    }
}

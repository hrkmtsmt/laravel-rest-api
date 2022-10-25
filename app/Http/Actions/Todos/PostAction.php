<?php

declare(strict_types=1);

namespace App\Http\Actions\Todos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;

use Root\Todo\Entity\Todo;

class PostAction extends Controller
{
    public function __construct(private EntityManager $entityManager, private Todo $todo)
    {}

    public function __invoke(Request $request): array
    {
        $title = $request->input('title');
        $isCompleted = $request->input('isCompleted');

        $this->todo->createId();
        $this->todo->setTitle($title);
        $this->todo->setIsCompleted($isCompleted);
        $this->todo->createCreatedAt();

        $this->entityManager->persist($this->todo);

        $this->entityManager->flush();

        return ['message' => 'Success'];
    }
}

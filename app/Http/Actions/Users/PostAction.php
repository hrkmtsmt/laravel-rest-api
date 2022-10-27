<?php

declare(strict_types=1);

namespace App\Http\Actions\Users;

use App\Http\Controllers\Controller;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;

use Root\User\Entity\User;

class PostUser extends Controller
{
    public function __construct(private EntityManagerInterface $entityManager, private User $user)
    {}

    public function __invoke(Request $request)
    {
        $id = $request->input('id');
        $password = $request->input('password');

        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('u.id')->from(User::class, 'u')->where("u.id = $id");

        $userId = $queryBuilder->getQuery()->getResult();

        if (empty($userId)) {
            $this->user->setId($id)->setPassword($password);

            $this->entityManager->persist($this->user);
            $this->entityManager->flush();

            return ['message' => 'Created user'];
        }

        return ['message' => "User $id is already registered."];
    }
}

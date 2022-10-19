<?php

declare(strict_types=1);

namespace Todo\Repository;

use Todo\Entity\TodoEntity as Todo;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use Doctrine\ORM\EntityRepository;

class TodoRepository extends EntityRepository
{
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Todo::class));
    }
}

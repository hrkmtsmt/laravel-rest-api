<?php

declare(strict_types=1);

namespace Root\Todo\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

use Root\Todo\Entity\TodoEntity;

class TodoRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(TodoEntity::class));
    }
}

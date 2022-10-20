<?php

declare(strict_types=1);

namespace Root\Todo\Repository;

use Root\Todo\Entity\TodoEntity;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

class TodoRepository extends EntityRepository
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(TodoEntity::class));
    }
}

<?php

declare(strict_types=1);

namespace Root\Todo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="todo")
 */
class TodoEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(name="title", type="string")
     */
    private string $title;

    /**
     * @ORM\Column(name="isCompleted", type="boolean")
     */
    private bool $isCompleted;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getIsCompleted(): bool
    {
        return $this->isCompleted;
    }
}

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

    /**
     * @ORM\Column(name="createdAt", type="string")
     */
    private string $createdAt;

    public function getId(): TodoEntity
    {
        $this->id;
        return $this;
    }

    public function getTitle(): TodoEntity
    {
        $this->title;
        return $this;
    }

    public function getIsCompleted(): TodoEntity
    {
        $this->isCompleted;
        return $this;
    }

    public function getCreatedAt(): TodoEntity
    {
        $this->createdAt;
        return $this;
    }

    public function createId(): void
    {
        $this->id = 0;
    }

    public function createCreatedAt(): void
    {
        $dateTimeImmutable = new \DateTimeImmutable();
        $this->createdAt = $dateTimeImmutable->format('c');
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setIsCompleted(bool $isCompleted): void
    {
        $this->isCompleted = $isCompleted;
    }

    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function setTodo($todo, $request): void
    {
        $this->setId($todo['id']);
        $this->setTitle($request['title']);
        $this->setIsCompleted($request['isCompleted']);
        $this->setCreatedAt($todo['createdAt']);
    }
}

<?php

declare(strict_types=1);

namespace Root\Todo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="todo")
 */
class Todo
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

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function createId(): Todo
    {
        $this->id = 0;
        return $this;
    }

    public function createCreatedAt(): Todo
    {
        $dateTimeImmutable = new \DateTimeImmutable();
        $this->createdAt = $dateTimeImmutable->format('c');
        return $this;
    }

    public function setId(int $id): Todo
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle(string $title): Todo
    {
        $this->title = $title;
        return $this;
    }

    public function setIsCompleted(bool $isCompleted): Todo
    {
        $this->isCompleted = $isCompleted;
        return $this;
    }

    public function setCreatedAt(string $createdAt): Todo
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function setTodo($todo, string $title, bool $isCompleted): Todo
    {
        $this->setId($todo['id']);
        $this->setTitle($title);
        $this->setIsCompleted($isCompleted);
        $this->setCreatedAt($todo['createdAt']);

        return $this;
    }
}

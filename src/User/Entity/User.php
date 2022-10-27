<?php

declare(strict_types=1);

namespace Root\User\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="email")
     */
    private string $id;

    /**
     * @ORM\Column(name="password", type="password")
     */
    private string $password;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function setUser(string $id, string $password): User
    {
        $this->setId($id)->setPassword($password);
        return $this;
    }
}

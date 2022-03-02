<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 100)]
    private $login;

    #[ORM\Column(type: 'string', length: 100)]
    private $password;

    #[ORM\Column(type: 'string', length: 100, unique: true)]
    private $email;

    #[ORM\Column(type: 'datetime')]
    private $dt_subscribe;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $dt_last_connection;

    #[ORM\Column(type: 'smallint')]
    private $is_admin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getDtSubscribe(): ?\DateTimeInterface
    {
        return $this->dt_subscribe;
    }

    public function setDtSubscribe(\DateTimeInterface $dt_subscribe): self
    {
        $this->dt_subscribe = $dt_subscribe;

        return $this;
    }

    public function getDtLastConnection(): ?\DateTimeInterface
    {
        return $this->dt_last_connection;
    }

    public function setDtLastConnection(?\DateTimeInterface $dt_last_connection): self
    {
        $this->dt_last_connection = $dt_last_connection;

        return $this;
    }

    public function getIsAdmin(): ?int
    {
        return $this->is_admin;
    }

    public function setIsAdmin(int $is_admin): self
    {
        $this->is_admin = $is_admin;

        return $this;
    }
}

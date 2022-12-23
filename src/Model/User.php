<?php

namespace App\Model;

use App\Service\Config;

class User
{
    private ?int $id = null;
    private ?string $email = null;
    private ?string $password = null;


    public static function find($email): ?User
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM user WHERE email = :email';
        $statement = $pdo->prepare($sql);
        $statement->execute(['email' => $email]);

        $userArray = $statement->fetch(\PDO::FETCH_ASSOC);

        if (! $userArray ) {
            return null;
        }

        $user = User::fromArray($userArray);

        return $user;
    }


    public static function fromArray($array): User
    {
        $user = new self();
        $user->fill($array);

        return $user;
    }

    public function fill($array): User
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['email'])) {
            $this->setEmail($array['email']);
        }
        if (isset($array['password'])) {
            $this->setPassword($array['password']);
        }

        return $this;
    }










    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }



}
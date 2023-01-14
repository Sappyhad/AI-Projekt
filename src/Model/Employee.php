<?php
namespace App\Model;

use App\Service\Config;

class Employee
{
    private ?int $id = null;
    private ?string $name = null;
   
    private ?string $lastname = null;

    private ?string $position = null;

    private ?string $schedule = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Employee
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Employee
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(?string $lastname): Employee
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(?string $position): Employee
    {
        $this->position = $position;

        return $this;
    }

    public function getSchedule(): ?string
    {
        return $this->schedule;
    }

    public function setSchedule(?string $schedule): Employee
    {
        $this->schedule = $schedule;

        return $this;
    }

    

    public static function fromArray($array): Employee
    {
        $employee = new self();
        $employee->fill($array);

        return $employee;
    }

    public function fill($array): Employee
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['name'])) {
            $this->setName($array['name']);
        }
        
        if (isset($array['lastname'])) {
            $this->setLastName($array['lastname']);
        }

        if (isset($array['schedule'])) {
            $this->setSchedule($array['schedule']);
        }

        if (isset($array['position'])) {
            $this->setPosition($array['position']);
        }

        return $this;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM employee';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $employees = [];
        $employeesArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($employeesArray as $employeeArray) {
            $employees[] = self::fromArray($employeeArray);
        }

        return $employees;
    }

    public static function find($id): ?Employee
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM employee WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $employeeArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $employeeArray) {
            return null;
        }
        $employee = Employee::fromArray($employeeArray);

        return $employee;
    }

    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO employee (name, lastname, position, schedule) VALUES (:name, :lastname, :position, :schedule)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'name' => $this->getName(),
                'lastname' => $this->getLastName(),
                'position' => $this->getPosition(),
                'schedule' => $this->getSchedule(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE employee SET name = :name, lastname = :lastname, position = :position, schedule = :schedule WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':name' => $this->getName(),
                ':lastname' => $this->getLastName(),
                ':position' => $this->getPosition(),
                ':schedule' => $this->getSchedule(),
                ':id' => $this->getId(),
            ]);
        }
    }

    public function delete(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM employee WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute([
            ':id' => $this->getId(),
        ]);

        $this->setId(null);
        $this->setName(null);
        $this->setLastName(null);
        $this->setPosition(null);
        $this->setSchedule(null);
    }
}

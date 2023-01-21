<?php
namespace App\Model;

use App\Service\Config;

class Room
{
    private ?int $id = null;
    private ?string $name = null;
   
    private ?string $teachername = null;

    private ?string $teacherlastname = null;

    private ?string $linktosubjects = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): Room
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): Room
    {
        $this->name = $name;

        return $this;
    }

    public function getTeacherName(): ?string
    {
        return $this->teachername;
    }

    public function setTeacherName(?string $teachername): Room
    {
        $this->teachername = $teachername;

        return $this;
    }

    public function getTeacherLastName(): ?string
    {
        return $this->teacherlastname;
    }

    public function setTeacherLastName(?string $teacherlastname): Room
    {
        $this->teacherlastname = $teacherlastname;

        return $this;
    }

    public function getLinkToSubjects(): ?string
    {
        return $this->linktosubjects;
    }

    public function setLinkToSubjects(?string $linktosubjects): Room
    {
        $this->linktosubjects = $linktosubjects;

        return $this;
    }


    

    public static function fromArray($array): Room
    {
        $room = new self();
        $room->fill($array);

        return $room;
    }

    public function fill($array): Room
    {
        if (isset($array['id']) && ! $this->getId()) {
            $this->setId($array['id']);
        }
        if (isset($array['name'])) {
            $this->setName($array['name']);
        }

        if (isset($array['teachername'])) {
            $this->setTeacherName($array['teachername']);
        }
        
        if (isset($array['teacherlastname'])) {
            $this->setTeacherLastName($array['teacherlastname']);
        }

        if (isset($array['linktosubjects'])) {
            $this->setLinkToSubjects($array['linktosubjects']);
        }

        return $this;
    }

    public function toArray(): array
    {
        $data = [];
        if ($this->getId()){
            $data["id"] = $this->getId();
            $data["name"] = $this->getName();
            $data["teachername"] = $this->getTeacherName();
            $data["teacherlastname"] = $this->getTeacherLastName();
            $data["linktosubjects"] = $this->getLinkToSubjects();
        }
        
        return $data;
    }

    public static function findAll(): array
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM rooms';
        $statement = $pdo->prepare($sql);
        $statement->execute();

        $rooms = [];
        $roomsArray = $statement->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($roomsArray as $roomArray) {
            $rooms[] = self::fromArray($roomArray);
        }

        return $rooms;
    }

    public static function find($id): ?Room
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM rooms WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        $roomArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $roomArray) {
            return null;
        }
        $rooms = Room::fromArray($roomArray);

        return $rooms;
    }

    public static function find_by_name($name): ?Room
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = 'SELECT * FROM rooms WHERE name = :name';
        $statement = $pdo->prepare($sql);
        $statement->execute(['name' => $name]);

        $roomArray = $statement->fetch(\PDO::FETCH_ASSOC);
        if (! $roomArray) {
            return null;
        }
        $rooms = Room::fromArray($roomArray);

        return $rooms;
    }


    public function save(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        if (! $this->getId()) {
            $sql = "INSERT INTO rooms (name, teachername, teacherlastname, linktosubjects) VALUES (:name, :teachername, :teacherlastname, :linktosubjects)";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                'name' => $this->getName(),
                'teachername' => $this->getTeacherName(),
                'teacherlastname' => $this->getTeacherLastName(),
                'linktosubjects' => $this->getLinkToSubjects(),
            ]);

            $this->setId($pdo->lastInsertId());
        } else {
            $sql = "UPDATE rooms SET name = :name, teachername = :teachername, teacherlastname = :teacherlastname, linktosubjects = :linktosubjects WHERE id = :id";
            $statement = $pdo->prepare($sql);
            $statement->execute([
                ':name' => $this->getName(),
                ':teachername' => $this->getTeacherName(),
                ':teacherlastname' => $this->getTeacherLastName(),
                ':linktosubjects' => $this->getLinkToSubjects(),
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
        $this->setTeacherName(null);
        $this->setTeacherLastName(null);
        $this->setLinkToSubjects(null);
    }
}

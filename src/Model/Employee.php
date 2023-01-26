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



//        if (isset($_POST['submit']))
//        {
//
//            // Allowed mime types
//            $fileMimes = array(
//                'text/x-comma-separated-values',
//                'text/comma-separated-values',
//                'application/octet-stream',
//                'application/vnd.ms-excel',
//                'application/x-csv',
//                'text/x-csv',
//                'text/csv',
//                'application/csv',
//                'application/excel',
//                'application/vnd.msexcel',
//                'text/plain'
//            );
//
//            // Validate whether selected file is a CSV file
//            if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
//            {
//
//                // Open uploaded CSV file with read-only mode
//                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
//
//                // Skip the first line
//                fgetcsv($csvFile);
//
//                // Parse data from CSV file line by line
//                // Parse data from CSV file line by line
//                while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
//                {
//                    // Get row data
//                    $name = $getData[1];
//                    $lastname = $getData[2];
//                    $position  = $getData[3];
//                    $schedule = $getData[4];
//
//                    // If user already exists in the database with the same email
//                    $query = "SELECT id FROM empoloyee WHERE name = '" . $getData[1] . "' AND lastname = '" . $getData[2] . "'";
//
//                    $check = mysqli_query($pdo, $query);
//
//                    if ($check->num_rows > 0)
//                    {
//                        mysqli_query($pdo, "UPDATE users SET name = '" . $name . "', lastname = '" . $lastname . "', position = '" . $position . "', schedule = '" . $schedule . "'");
//                    }
//                    else
//                    {
//                        mysqli_query($pdo, "INSERT INTO users (name, lastname, position, schedule) VALUES ('" . $name . "', '" . $lastname . "', '" . $position . "', '" . $schedule . "')");
//                    }
//                }
//
//                // Close opened CSV file
//                fclose($csvFile);
//
//                header("Location: index.php");
//            }
//            else
//            {
//                echo "Please select valid file";
//            }
//        }

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

    public static function purge(): void
    {
        $pdo = new \PDO(Config::get('db_dsn'), Config::get('db_user'), Config::get('db_pass'));
        $sql = "DELETE FROM Employee";
        $statement = $pdo->prepare($sql);
        $statement->execute();
    }
}

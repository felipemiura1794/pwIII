<?php

require_once "utils/database.php";

class User {
    private int $id;
    private string $name;
    private string $email;
    private string $password;

    public function __construct(string $name, string $email, string $password, int $id = -1) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->id = $id;
    }

    public function create() {
        $pdo = Database::getInstance()->getConnection();
        $sql = "INSERT INTO users (name, email, password) 
                VALUES (:name, :email, :password)";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
        $stmt->execute();

        $id = $pdo->lastInsertId();
        $this->id = $id;
    }

    public function delete() {
        $pdo = Database::getInstance()->getConnection();
        $sql = "DELETE FROM users WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update() {
        $pdo = Database::getInstance()->getConnection();
        $sql = "UPDATE users SET 
                name = :name,
                email = :email,
                password = :password
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name", $this->name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $this->password, PDO::PARAM_STR);
        $stmt->bindParam(":id", $this->id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function list_all(): array {
        $pdo = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM users";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $_fetched_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = [];
        foreach ($_fetched_data as $user) {
            $users[$user["id"]] = new User(
                $user["name"],
                $user["email"],
                $user["password"],
                $user["id"]
            );
        }

        return $users;
    }

    public function get(): User {
        return User::static_get($this->id);
    }

    public static function static_get(int $id): User {
        $pdo = Database::getInstance()->getConnection();
        $sql = "SELECT * FROM users WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        $_fetched_data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return new User(
            $_fetched_data["name"],
            $_fetched_data["email"],
            $_fetched_data["password"],
            $_fetched_data["id"]
        );
    }
}
<?php
// Create a database connection class
class Database{
    private static $instance = null;
    private $conn ;

    // Private constructor
    private function __construct(){
        // Get credentials from a secure location
        $config = include 'config/database.php';

        try{
            $dsn ="mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
            $this->conn =new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
                PDO::ATTR_EMULATE_PREPARES => false, 
            ]);
        }catch(PDOExecption $e){
            die("Connection failed: " . $e->getMessage());

        }
    }

    // Get databse instance 
    public static function getInstance(){
        if (self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance ;
    }

    // Get PDO connection
    public function getConnection(){
        return $this->conn;
    }
}

// Basic CRUD Operations
// CRUD stands for Create , Read, Update and Delete - the four basic operations performed on database records

// Create /insert
function createUser($pdo, $username, $email, $password){
    // hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try{
        // Prepare the sql statement
        $stmt = $pdo->prepare("
            INSERT INTO users(username, email, password, created_at)
            VALUES(:username, :email, :password, NOW())
            ");
        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        // Execute the statement
        $stmt->execute();
        // Get the id of the newly created user
        return $pdo->lastInsertId();

    }catch (PDOException $e){
        echo "Error creating user:" . $e->getMessage();
        return false;
    }
}

// Usage
$db = Database::getInstance();
$pdo = $db->getConnection();

// $newUserId = createUser($pdo, "Sarah_smith", "sarah@example.com", "secure_password123");
// $newUserId = createUser($pdo, "Calvin_klein", "calvin@example.com", "secure_password456");
// $newUserId = createUser($pdo, "miles", "miles@example.com", "secure_password123");

// if ($newUserId){
//     echo "User created with ID:" . $newUserId;
// }

function createProduct($pdo, $name, $price, $description){
    try{
        $stmt = $pdo->prepare("
            INSERT INTO products (name, price, description, created_at)
            VALUES(:name, :price, :description, NOW())
        ");

        // Execute associative array
        $stmt->execute([
            ':name'=> $name,
            ':price'=> $price,
            ':description'=> $description,
        ]);
        return $pdo->lastInsertId();
    }catch (PDOException $e){
        echo "Error creating product: " . $e->getMessage();
        return false;
    }
}

// Usage create several products
$ProductID = createProduct($pdo, "smartphone", 599.99, "latest model with advanced features");
if ($ProductID){
    echo "Product created with ID:" . $ProductID;
}
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
    // echo "User created with ID:" . $newUserId;
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
// if ($ProductID){
    // echo "Product created with ID:" . $ProductID;
// }


// Tommorow 
// Inserting multiple records at once

function createMultiplerecords($pdo, $records){
    try{
        // begin transaction for multiple inserts
        $pdo->beginTransaction();

        $stmt = $pdo->prepare("
            INSERT INTO items(name, category, price)
            VALUES(:name, :category,:price)
        ");

        // Insert into each record
        foreach($records as $record){
            $stmt->execute([
                ':name'=>$record['name'],
                ':category'=>$record['category'],
                ':price'=>$record['price']
            ]);
        } 
        // Commit the transaction
        $pdo->commit();
        return true;

    }catch(PDOException $e){
        // Rollback if something went wrong
        $pdo->rollback();
        echo "Error creating products";
        return false;
    }
}

$items =[
    [
        'name'=> 'Laptop',
        'category'=>'Electronics',
        'price'=> 999.99
    ],
    [
        'name'=> 'Headphones',
        'category'=>'Accessories',
        'price'=> 149.99
    ],
    [
        'name'=> 'Mouse',
        'category'=>'Peripherals',
        'price'=> 29.99
    ]
    ];
//  if (createMultiplerecords($pdo, $items)){
//     Echo "all items created succesfully";
//  }

// Read (Select)
//1. REtrieving a single record by ID
function getUserByID($pdo, $userId){
    try{
        $stmt= $pdo->prepare("SELECT id, username, email, password, created_at FROM users WHERE id = :id");
        $stmt= $pdo->prepare("SELECT *  FROM users WHERE id = :id");
        $stmt->execute([ ':id' =>$userId]);

        // Fetch a single
        return $stmt->fetch();

    }catch(PDOException $e) {
        echo "Error retrieving user: ". $e->getMessage();
        return false;
    }
}

// Eample usage
// $user =getUserByID($pdo, 3);
// if ($user){
//     echo "Username: " .$user['username'] .",Email: " . $user['email'];
// } else{  echo "User not found";
// }

// 2. Retrieving multiplerecords{
function getAllUsers($pdo, $limit =10, $offset = 0){
    try{
        $stmt = $pdo->prepare("
            SELECT * FROM users
            ORDER BY created_at DESC
            LIMIT :limit OFFSET :offset
        ");

        // Bind parameters(must be bound as integers for LIMIT/OFFSET)
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch all rowa
        return $stmt->fetchAll();

    }catch(PDOException $e){
        echo "Error retrieving users: ". $e->getMessage();
        return [];
    }
}

// Example usage
// Get users from the beggining(first page)
$users = getAllUsers($pdo);

// Get 20 users from the beggining
$users = getAllUsers($pdo , 20);
// Get 10 users starting from the 11th user (second page of 10)
// $users = getAllUsers($pdo ,10, 10);

// display users
// foreach($users as $user){
//     echo "Username:{$user['username']} ,    Email: {$user['email']} <br>";
// } 


// 3. Retrieving with conditions
function searchUsers($pdo, $searchTerm){
    try{
        $searchTerm ="%$searchTerm%";  //Add wildcards for like query
        $stmt = $pdo->prepare("
            SELECT * FROM users
            WHERE username LIKE :term1
            OR email LIKE :term2
            ORDER BY username
        ");

        $stmt->bindParam(':term1', $searchTerm, PDO::PARAM_STR);
        $stmt->bindParam(':term2', $searchTerm, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }catch(PDOException $e){
        echo "Error searching users: ". $e->getMessage();
        return [];
    }
}

// Example usage
// search for results with "john" in username or email 
$searchResults = searchUsers($pdo, "a");

// Display search results
// if (count($searchResults) > 0) {
//     echo "Found :" . count($searchResults) . "users:<br>" ;
//     foreach ($searchResults as $user){
//         echo "Username:{$user['username']} ,    Email: {$user['email']} <br>";

//     }
// }else {
//     echo "No users matching your search<br>";
// }

// 4. Counting recrds
function countUsers($pdo){
    try{
        $stmt = $pdo->query("SELECT COUNT(*) FROM users");
        return $stmt->fetchColumn();
    }catch(PDOException $e){
        echo "Error counting users: ". $e->getMessage();
        return 0;
    }
}

// Example usage
$totalUsers = countUsers($pdo);
// echo "Total number of users:" . $totalUsers  . "<br>";

// Update (UPDATE) ->UPDATE table_name SET column_name = new_value
// 1. Updating a single record
function updateUser($pdo, $userId, $data){
    try{
        // Build the set part of the query dynamically
        $fields = [];
        $values = [];

        foreach ($data as $field => $value){
            $fields[] = "$field = :$field";
            $values[":$field"] = $value;
        }

        // Add the user ID to values array
        $values[':id'] = $userId;

        $sql = "UPDATE users SET " . implode(", ", $fields) . " WHERE id= :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($values);

        // return number of affected rows
        return $stmt->rowCount();
    }catch(PDOException $e){
        echo "Error updating user: " . $e->getMessage();
        return false;
    }
}

// // Usage
// $updated = updateUser($pdo, 1,  [
//     'username'=>'new_username',
//     'email'=> 'new_email@example.com'
// ]);

// if ($updated){
//     echo "User updated succesfully. Row affected: $updated";
// }else{
//     echo  "No changes made or user not found";
// }

//3.Updating multiple records
function updateProductPrices($pdo,$productId,$increasePercentage) {
    try{
        $stmt = $pdo->prepare("
        UPDATE products
        SET price= price * (1 + :percentage /100)
        WHERE id = :id
        ");

        $stmt->execute([
            ':percentage' => $increasePercentage,
            ':id' => $productId

        ]);

        return $stmt->rowCount();


    }catch (PDOException $e) {
        echo "Error updating prices: " . $e->getMessage();
        return false;
    }
}

//Usage
// $rowsUpdated = updateProductPrices($pdo ,1,5);
// if ($rowsUpdated) {
// echo "Prices updated successfully.$rowsUpdated products affected.";
// }else {
//     echo "No products were updated or an error occured.";
// }

//Delete(DELETE) -> DELETE FROM table_name WHERE column = value;
//1. Deleting a single record

function deleteUser($pdo,$userId) {
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id =:id");
        $stmt->execute([':id' => $userId]);

        //Return number of rows affected
        return $stmt->rowCount();

    }catch (PDOException $e) {
        echo "Error deleting user: ". $e->getMessage();
        return false;
    }
}

// //Usage
// $deleted =deleteUser($pdo,6);
// if($deleted) {
//     echo "User deleted successfully";

// }else {
//     echo "User not found or could not be deleted";
// }

//2.Soft deletes (marking as deleted instead of actual deletion)
function softDeleteUser($pdo,$userId) {
    try{
        $stmt =$pdo->prepare("
UPDATE USERS
SET deleted_at = NOW(),active =0
WHERE id =:id;
        
        ");
        $stmt->execute([':id' => $userId]);

        //Return number of rows affected
        return $stmt->rowCount();

    }catch (PDOException $e) {
        echo "Error soft-deleting user: ". $e->getMessage();
        return false;
    }
    }
    $deletedUser = softDeleteUser($pdo,2);
    if($deletedUser){
        echo "User deleted successfully";

    }else{
        echo "User not found or could not be deleted";
    }

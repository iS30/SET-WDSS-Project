<?php
global $conn;
require 'GSS_DB.php';

class Users {
    public $userID;
    public $adminUsername;
    public $email;
    public $userPassword;

    public function getUserID() {
        return $this->userID;
    }
    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function getAdminUsername() {
        return $this->adminUsername;
    }
    public function setAdminUsername($adminUsername) {
        $this->adminUsername = $adminUsername;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getUserPassword() {
        return $this->userPassword;
    }
    public function setUserPassword($userPassword) {
        $this->userPassword = $userPassword;
    }
}

// Fetch data from the database
$query = "SELECT user_ID, email, userPassword FROM users";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

$allUsers = array();

foreach ($row as $item) {
    // Create a User object and assign values
    $users = new Users();
    $users->setUserID($item['user_ID']);
    $users->setEmail($item['email']);
    $users->setUserPassword($item['userPassword']);

    $allUsers[] = $users;
}

// Now you can use the user details
foreach ($allUsers as $user) {
    echo "User ID: " . $user->getUserID() . "<br>";
    echo "Email: " . $user->getEmail() . "<br>";
    echo "User Password: " . $user->getUserPassword() . "<br>";
    echo "<hr>";
}
?>
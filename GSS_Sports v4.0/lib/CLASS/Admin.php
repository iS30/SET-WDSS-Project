<?php
global $conn;
require 'User.php';
class Admin extends User{
    public $adminID;
    public $username;
    public $password;

    public function getAdminID() {
        return $this->adminID;
    }
    public function setAdminID($adminID) {
        $this->adminID = $adminID;
    }

    public function getUsername() {
        return $this->username;
    }
    public function setUsername($username) {
        $this->username = $username;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
}

// Fetch data from the database
$query = "SELECT Admin_ID, username, password FROM admin";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

$allAdmins = array();

foreach ($row as $item) {
    // Create an Admin object and assign values
    $admin = new Admin();
    $admin->setAdminID($item['Admin_ID']);
    $admin->setUsername($item['username']);
    $admin->setPassword($item['password']);

    $allAdmins[] = $admin;
}
echo '<hr>'.'<br>'.'Admin:<br>';
// Now you can use the admin details
foreach ($allAdmins as $admin) {
    echo "Admin ID: " . $admin->getAdminID() . "<br>";
    echo "Username: " . $admin->getUsername() . "<br>";
    echo "Password: " . $admin->getPassword() . "<br>";
    echo "<hr>";
}
?>
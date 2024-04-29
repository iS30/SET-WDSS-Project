<?php
global $conn;
require 'config.php';

class Customer extends Users {
    public $customerID;
    public $firstName;
    public $lastName;
    public $phoneNumber;
    public $customerAddress;
    public $customerType;

    public function getCustomerID() {
        return $this->customerID;
    }
    public function setCustomerID($customerID) {
        $this->customerID = $customerID;
    }

    public function getFirstName() {
        return $this->firstName;
    }
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }
    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }

    public function getCustomerAddress() {
        return $this->customerAddress;
    }
    public function setCustomerAddress($customerAddress) {
        $this->customerAddress = $customerAddress;
    }

    public function getCustomerType() {
        return $this->customerType;
    }
    public function setCustomerType($customerType) {
        $this->customerType = $customerType;
    }
}

// Fetch data from the database
$query = "SELECT customer_ID, firstName, lastName, phoneNumber, email, customer_Address, customer_Type FROM CUSTOMER";
$stmt = $conn->prepare($query);
$stmt->execute();
$row = $stmt->fetchAll(PDO::FETCH_ASSOC);

$allCustomers = array();

foreach ($row as $item) {
    // Create a Customer object and assign values
    $customer = new Customer();
    $customer->setCustomerID($item['customer_ID']);
    $customer->setFirstName($item['firstName']);
    $customer->setLastName($item['lastName']);
    $customer->setPhoneNumber($item['phoneNumber']);
    $customer->setEmail($item['email']); // Inherits from User class
    $customer->setCustomerAddress($item['customer_Address']);
    $customer->setCustomerType($item['customer_Type']);

    $allCustomers[] = $customer;
}

// Now you can use the customer details
foreach ($allCustomers as $customer) {
    echo "Customer ID: " . $customer->getCustomerID() . "<br>";
    echo "First Name: " . $customer->getFirstName() . "<br>";
    echo "Last Name: " . $customer->getLastName() . "<br>";
    echo "Phone Number: " . $customer->getPhoneNumber() . "<br>";
    echo "Email: " . $customer->getEmail() . "<br>";
    echo "Address: " . $customer->getCustomerAddress() . "<br>";
    echo "Customer Type: " . $customer->getCustomerType() . "<br>";
    echo "<hr>";
}

?>
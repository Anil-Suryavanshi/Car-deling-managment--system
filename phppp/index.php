<?php

// Database Connection
$host = 'localhost';
$dbname = 'car_dealing';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// User Authentication (Signup & Login)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if ($_POST['action'] === 'signup') {
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
        $stmt->execute([$email, $password]);
        echo json_encode(["message" => "Signup successful"]);
    }
    elseif ($_POST['action'] === 'login') {
        $email = $_POST['email'];
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($_POST['password'], $user['password'])) {
            echo json_encode(["message" => "Login successful"]);
        } else {
            echo json_encode(["message" => "Invalid credentials"]);
        }
    }
}

// Car Listing Add/Edit/Delete
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'add_car') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $stmt = $conn->prepare("INSERT INTO cars (title, price) VALUES (?, ?)");
    $stmt->execute([$title, $price]);
    echo json_encode(["message" => "Car added successfully"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete_car') {
    $id = $_POST['id'];
    $stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
    $stmt->execute([$id]);
    echo json_encode(["message" => "Car deleted successfully"]);
}

// Search & Filter Cars
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM cars WHERE title LIKE ?");
    $stmt->execute(['%' . $search . '%']);
    echo json_encode($stmt->fetchAll());
}

// Booking System (Basic)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'book_car') {
    $car_id = $_POST['car_id'];
    $user_id = $_POST['user_id'];
    $stmt = $conn->prepare("INSERT INTO bookings (car_id, user_id) VALUES (?, ?)");
    $stmt->execute([$car_id, $user_id]);
    echo json_encode(["message" => "Car booked successfully"]);
}

// Payment Integration Placeholder
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'make_payment') {
    echo json_encode(["message" => "Payment processed (integration required)"]);
}

?>

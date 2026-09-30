<?php

include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash password
$hashed_password = password_hash(
    $password,
    PASSWORD_DEFAULT
);

// Check existing email
$check = $conn->prepare(
    "SELECT id FROM users WHERE email = ?"
);

$check->bind_param("s", $email);
$check->execute();

$result = $check->get_result();

if ($result->num_rows > 0) {

    echo "Email already registered!";
    exit;

}

// Insert user
$stmt = $conn->prepare(
    "INSERT INTO users (name, email, password)
     VALUES (?, ?, ?)"
);

$stmt->bind_param(
    "sss",
    $name,
    $email,
    $hashed_password
);

if ($stmt->execute()) {

    echo "Registration successful!";

    echo "<br><a href='index.html'>
          Login here
          </a>";

} else {

    echo "Registration failed!";
}

$stmt->close();
$check->close();
$conn->close();

?>
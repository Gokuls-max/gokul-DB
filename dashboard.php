<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>

<body>
<p style='text-align; center;' >
<h1>Welcome,
    <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
    
</h1>

<p>You have successfully logged in.</p>

<a href="logout.php">Logout</a>

</body>
</html>
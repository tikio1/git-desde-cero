<?php
session_start();


require('database.php');

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('select id, email, password FROM users Where id=:id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    if (count($results) > 0) {

        $user = $results;
    }
}
?>


<!doctype html>
<html>

<head>
    <meta charset="tf8">
    <title>Welcome to your app </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet " href="assets/css/styles.css">
</head>

<body>
    <?php require 'assets/partials/header.php' ?>

    <?php
    if (!empty($user)) : ?>
        <br> Welcome <?= $user['email'] ?>
        <br> you are succefully logged
        <a href="logout.php">logout</a>
    <?php
    else : ?>

        <h1>Please login or singup </h1>
        <a href="login.php"> login </a>
        <a href="singup.php"> singup </a>
    <?php endif; ?>
</body>

</html>
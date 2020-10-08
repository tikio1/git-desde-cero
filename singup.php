<?php
require('database.php');

$message = '';
if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $sql = "INSERT INTO users ( email, password) VALUES(:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $message = 'Succesfully create new user';
    } else {
        $message = 'Sorry there must have been an issue creating your password  ';
    }
}
?>

<!doctype html>

<head>
    <meta charset="tf8">
    <title>Singup </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet " href="assets/css/styles.css">
</head>

<body>
    <?php require 'assets/partials/header.php' ?>
    <?php
    if (!empty($message)):?>
        <p> <?= $message ?> </p>
    <?php
    endif;
    ?>

    <h1>Sing Up </h1>
    <span> or <a href="login.php"> login</a> </span>

    <form action="singup.php" method="post">
        <input type="text" name="email" placeholder="enter your email">

        <input type="password" name="password" placeholder="Enter your password">
        <input type="password" name="confirm_password" placeholder="Confirm your password">

        <input type="submit" value="send">
    </form>
</body>

</html>
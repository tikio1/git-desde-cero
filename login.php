<?php
session_start();


require('database.php');

if(isset($_SESSION['user_id'])){
    header('Location: ../my-crud');
}


if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare("SELECT id, email, password FROM users where email=:email");
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header('Location: ../my-crud');
    } else {
        $message = " sorry, those credential es incorrect ";
    }
}

?>

<!doctype html>
<html>

<head>
    <meta charset="tf8">
    <title>Login </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>



<body>


    <?php require 'assets/partials/header.php' ?>
    <h1>login</h1>

    <?php
    if (!empty($message)) :    ?>

        <p><?= $message ?></p>
    <?php endif; ?>

   
    <span>or <a href="singup.php">Singup</a> </span>

    <form action="login.php" method="post">
        <input type="text" name="email" placeholder="enter your email">

        <input type="password" name="password" placeholder="Enter your password">

        <input type="submit" value="send">
    </form>

</body>

</html>
<?php

require "../assets/database.php";
require "../assets/url.php";
require "../assets/user.php";


session_start();


if($_SERVER["REQUEST_METHOD"] === "POST") {

    $conn = connectionDB();
    $log_email = $_POST["login-email"];
    $log_password = $_POST["login-password"];

    if(authentication($conn,$log_email,$log_password)) {
        // ziskanie ID uživateľa
        $id = getUserId($conn, $log_email);

        session_regenerate_id(true);

        // Nastaví, že je uživateľ prihlasený
        $_SESSION["is_logged_in"] = true;
        // nastaví ID uživateľa
        $_SESSION["logged_in_user_id"] = $id;

        redirectUrl("/databaza_fresh/admin/ziaci.php");
        
    } else {
        $error = "Chyba pri prihlásení";

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(!empty($error)): ?>
        <p><?php echo $error ?></p>
        <a href= "../signin.php">Zpäť na prihlásenie</a>
    <?php endif ?>
</body>
</html>
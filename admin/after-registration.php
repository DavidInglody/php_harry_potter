<?php

require "../assets/url.php";
require "../assets/database.php";
require "../assets/user.php";

session_start();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $connection = connectionDB ();

    $first_name = $_POST["first-name"];
    $second_name = $_POST["second-name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    // plain text = admin123

    $id = createUser($connection ,$first_name ,$second_name , $email, $password);

    if(!empty($id)) {
        session_regenerate_id(true);

        $_SESSION["is_logged_in"] = true;
        $_SESSION["logged_in_user_id"] = $id;
        
        redirectUrl("/databaza_fresh/admin/ziaci.php");
    } else {
        echo "Uživatela sa nepodarilo pridať";
    }
}
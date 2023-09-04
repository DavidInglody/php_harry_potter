<?php

    require "../assets/database.php";
    require "../assets/ziak.php";
    require "../assets/auth.php";
    require "../assets/url.php";
    
    session_start();

    if(!isLoggedIn()) {
       die("nepovolený prístup"); 
    }
    
    $connection = connectionDB();

    if(isset($_GET["id"]) and is_numeric($_GET["id"])) {
        $one_student = getStudent($connection, $_GET["id"]);

        if($one_student) {
            $first_name = $one_student["first_name"];
            $second_name = $one_student["second_name"];
            $age = $one_student["age"];
            $life = $one_student["life"];
            $college = $one_student["college"];
            $id = $one_student["id"];
        } else {
            die("Student nenajdený");
        }


    } else {
        die("id nebolo zadane, študen nebol najdený");
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){

            $first_name = $_POST["first_name"];
            $second_name = $_POST["second_name"];
            $age = $_POST["age"];
            $life = $_POST["life"];
            $college = $_POST["college"];        

            if(updateStudent($connection,$first_name,$second_name, $age, $life, $college, $id)) {
                redirectUrl("/databaza_fresh/admin/jeden-ziak.php?id=$id");
            }     
    }
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/general.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    
    <link rel="stylesheet" href="../query/header-query.css">
    <script src="https://kit.fontawesome.com/9375ffc9d0.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>

    <?php require "../assets/formular-ziak.php"; ?>


    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>
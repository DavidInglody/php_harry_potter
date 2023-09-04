<?php

require "../assets/database.php";
require "../assets/ziak.php";
require "../assets/auth.php";
require "../assets/url.php";
    
session_start();

if(!isLoggedIn()) {
    die("nepovolený prístup"); 
}

$first_name = null;
$second_name = null;
$age = null;
$life = null;
$college = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $age = $_POST["age"];
    $life = $_POST["life"];
    $college = $_POST["college"];

    $connection = connectionDB();

    $id = createStudent($connection, $first_name, $second_name, $age, $life, $college);
    if ($id) {
        redirectUrl("/databaza_fresh/admin/jeden-ziak.php?id=$id");
    } else {
        echo "Žiak nebol vytvorený";
    }
}

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $first_name = $_POST["first_name"];
//     $second_name = $_POST["second_name"];
//     $age = $_POST["age"];
//     $life = $_POST["life"];
//     $college = $_POST["college"];

//     $connection = connectionDB();

//     $sql = "INSERT INTO student(first_name,second_name,age,life,college)
//             VALUES (?,?,?,?,?)";
    
//     $stmt = mysqli_prepare($connection, $sql);

//     if ($stmt === false) {
//         echo mysqli_error($connection);
//     } else {
//         mysqli_stmt_bind_param($stmt, "ssiss", $_POST["first_name"],$_POST["second_name"], $_POST["age"], $_POST["life"], $_POST["college"]);

//         if(mysqli_stmt_execute($stmt)) {
//             $id = mysqli_insert_id($connection);

//             redirectUrl("/databaza_fresh/jeden-ziak.php?id=$id");
//         }
//     }   
// }







// if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
//     $first_name = $_POST["first_name"];
//     $second_name = $_POST["second_name"];
//     $age = $_POST["age"];
//     $life = $_POST["life"];
//     $college = $_POST["college"];

//     $sql = "INSERT INTO student(first_name, second_name, age, life, college)
//     VALUES(?, ?, ?, ?, ?)";
    
//     $connection = connectionDB ();

//     $statement = mysqli_prepare($connection,$sql);

//     if($statement === false){
//         echo mysqli_error($connection);
//     } else {
//         mysqli_stmt_bind_param($statement, "ssiss", $_POST["first_name"], $_POST["second_name"], $_POST["age"], $_POST["life"], $_POST["college"]);

//         if (mysqli_stmt_execute($statement)){
//             $id = mysqli_insert_id($connection);

//             redirectUrl("/databaza_fresh/jeden-ziak.php?id=$id");
//         }
    // }




    // $statement= mysqli_prepare($connection, $sql);

    // if($statement === false) {
    //     echo mysqli_error($connection);
    // } else {
    //     mysqli_stmt_bind_param($statement, "ssiss", $_POST["first_name"], $_POST["second_name"], $_POST["age"], $_POST["life"], $_POST["college"]);

    //     if(mysqli_stmt_execute($statement)){
    //         $id = mysqli_insert_id($connection);
    //         echo "Úspešne vložený žiak s ID: $id";
    //     } else {
    //         echo mysqli_stmt_error($statement);
    //     }
    // }
// }

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

    <main>
        <section class = "add-form">
            <?php require "../assets/formular-ziak.php"; ?>
        </section>
    </main>

    <?php require "../assets/footer.php"; ?>
    <script src="../js/header.js"></script>
</body>
</html>
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

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(deleteStudent($connection, $_GET["id"])) {
            redirectUrl("/databaza_fresh/admin/ziaci.php");
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
    <title>Zmazať žiaka</title>
</head>
<body>
    <?php require "../assets/admin-header.php"; ?>
    <main>
        <section class="delete-form">
            <form method = "POST">
                <p>Ste si istý že chcete tohoto žiaka vymazať ?</p>
                <button>Zmazať</button>
                <a href="jeden-ziak.php?id=<?php echo $_GET['id'] ?>">Zrušiť</a>
            </form>
        </section>
    </main>
    <script src="../js/header.js"></script>
    <?php require "../assets/footer.php"; ?>
    
</body>
</html>
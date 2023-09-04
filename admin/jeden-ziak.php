<?php

    require "../assets/database.php";
    require "../assets/ziak.php";
    require "../assets/auth.php";
    
    session_start();

    if(!isLoggedIn()) {
       die("nepovolený prístup"); 
    }
    
    $connection = connectionDB();

    
    if(is_numeric($_GET["id"]) and isset($_GET["id"])) {
        $student = getStudent($connection, $_GET["id"]);
    } else {
        $student = null;
    }







    
?>

<!DOCTYPE html>
<html lang="en">
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
        <section class="main-heading">
            <h1>Info o žiakovi</h1>
        </section>

        <section>
            <?php if($student ===null): ?>
                <p>Žiak sa nenašiel</p>
            <?php else: ?>
                <h2><?= htmlspecialchars($student["first_name"])." ".htmlspecialchars($student["second_name"])?></h2>
                <p>Vek: <?= htmlspecialchars($student["age"])?></p>
                <p>Dodatočné informácie: <?= htmlspecialchars($student["life"])?></p>
                <p>Kolej: <?= htmlspecialchars($student["college"])?></p>

                <a href="ziaci.php">Späť na všetkých žiakov</a>
            <?php endif ?>
        </section>
        <section class= "buttons">
                <a href="editacia-ziaka.php?id=<?= $student['id'] ?>">Editovať</a>
                <a href="delete-ziak.php?id=<?= $student['id'] ?>">Vymazať</a>
        </section>
    </main>
    <?php require "../assets/footer.php" ?>
    <script src="../js/header.js"></script>
</body>
</html>
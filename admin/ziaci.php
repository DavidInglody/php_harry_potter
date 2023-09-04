<?php

    require "../assets/database.php";
    require "../assets/ziak.php";
    require "../assets/auth.php";
    
    session_start();

    if(!isLoggedIn()) {
       die("nepovolený prístup"); 
    }

    $connection = connectionDB();
    
    $students = getAllStudents($connection, "id, first_name, second_name" );


    

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
            <h1>Zoznam žiakov školy</h1>
        </section>
        <section class="studets-list">
            <?php if(empty($students)): ?>
                <p>Žiaden žiak nebol nájedný</p>
            <?php else: ?>
                <ul>    
                    <?php foreach($students as $one_student): ?>
                        <li><?= htmlspecialchars($one_student["first_name"])." ".htmlspecialchars($one_student["second_name"])?></li>
                        <a href="jeden-ziak.php?id=<?=$one_student["id"]?>">Viac informacií</a>
                    <?php endforeach ?>
                </ul>
            <?php endif?> 
        </section>
        <a href="pridat-ziaka.php">Pridať žiaka</a>
    </main>
    <?php require "../assets/footer.php" ?>
    <script src="../js/header.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/general.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="./query/header-query.css">
    <link rel="stylesheet" href="./css/footer.css">
    <script src="https://kit.fontawesome.com/9375ffc9d0.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/signin.css">
    <title>Document</title>
</head>
<body>

    <?php require "assets/header.php" ?>

    <main>
        <section class="form">
            <h1>Prihlásenie</h1>
            <form action="admin/login.php" method = "POST">
                <input class="email" type="email" placeholder= "E-mail" name = "login-email"><br>
                <input class= "password"type="password" placeholder = "Heslo" name = "login-password"> <br>
                <input class= "btn" type="submit" name = "prihlásiť sa"> <br>
            </form>
        </section>
    </main>

    <?php require "assets/footer.php" ?>
    <script src="./js/header.js"></script>
</body>
</html>
<?php

setcookie("testovaciecookies", "test", time() + 60 *60 *24, "/");

var_dump($_COOKIE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="zmazat-cookie.php">zmazať</a>    
</body>
</html>
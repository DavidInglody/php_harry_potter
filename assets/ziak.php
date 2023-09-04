<?php 

// require "url.php";

/**
 * získa jedného žiaka z databáze podľa ID
 * 
 * @param object $connection - napojenie do databázy
 * @param integer $id - id jedeho konkrétneho žiaka
 * 
 * @return mixed asociatívne pole, ktoré obsahuje informacie o jednom konkretom žiakovi alebo vráti null, pokial žiak nebol najdený. 
 * 
 */

function getStudent($connection, $id, $columns= "*")  {
    $sql = "SELECT $columns FROM student
            WHERE id = ? ";
    
    $stmt = mysqli_prepare($connection,$sql);

    if($stmt === false){
        mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }



    // $sql = "SELECT * FROM student 
    //         WHERE id = ?";
    
    // $stmt = mysqli_prepare($connection, $sql);

    // if ($stmt === false) {
    //     mysqli_error($connection);
    // } else {
    //     mysqli_stmt_bind_param($stmt, "i", $id);

    //     if(mysqli_stmt_execute($stmt)){
    //         $result = mysqli_stmt_get_result($stmt);
    //         return mysqli_fetch_array($result, MYSQLI_ASSOC);
    //     }
    // }
    
}
/**
 * updatuje info o žiakovi v databázi
 * 
 * @param object $connection - napojenie do databázy
 * @param string $first_name - krsn. meno žiaka
 * @param string $second_name - prezvisko žiaka
 * @param integer $age - vek žiaka
 * @param string $life -  info o žiakovi
 * @param string $college - kolej žiaka
 * @param integer $id - id žiaka
 * 
 * @return boolean true pokial je update žiaka úspešné
 * 
 */
function updateStudent($connection,$first_name,$second_name, $age, $life, $college, $id) {

    $sql = "UPDATE student
                SET first_name = ?,
                    second_name = ?,
                    age = ?,
                    life = ?,
                    college = ?
            WHERE id = ?";
    
    $stmt = mysqli_prepare($connection, $sql);

    if($stmt ===false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "ssissi", $first_name, $second_name, $age, $life, $college, $id);

        if (mysqli_stmt_execute($stmt)){
            return true;
        }
    }
}


/**
 * 
 * vymaže studenta z databazi podľa daného id
 * 
 * @param object $connetion - pre pripojene s databazou
 * @param integer $id - id daného žiaka
 * 
 * @return boolean true pokiaľ dojde k úspešnému vymazaniu žiaka
 */
function deleteStudent($connection, $id) {
    $sql ="DELETE FROM student
        WHERE id = ?";

    $stmt = mysqli_prepare($connection, $sql);

    if($stmt === false) {
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if(mysqli_stmt_execute($stmt)){
            return true;
        }
    }
}

/**
 * 
 * Vráti zoznam žiakov z databáze
 * 
 * @param object $connection - pripojenie do DB
 * 
 * @return array pole kde každý objekt je jeden žiak
 */
function getAllStudents($connection, $columns= "*"){
    
    $sql = "SELECT $columns FROM student";

    $result = mysqli_query($connection, $sql);

    if($result === false){
        echo mysqli_error($connection);
    } else {
        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $students;
    }
}


/**
 * 
 * prida žiaka do databáze a presmeruje na profil žiaka
 * 
 * @param object $connection - pripojenie do databáze
 * @param string $first_name - krstné meno žiaka
 * @param string $second_name - priezvisko žiaka
 * @param integer $age - vek žiaka
 * @param string $life - podrobnosti o žiakovi
 * @param string $college - trieda žiaka
 * 
 * @return int $id - id pridaného žiaka
 * 
 */

function createStudent($connection, $first_name, $second_name, $age, $life, $college){
    $sql = " INSERT INTO student (first_name, second_name, age , life, college)
         VALUES (?, ?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($connection, $sql);

    if($stmt === false){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "ssiss", $first_name, $second_name, $age, $life, $college);

        if (mysqli_stmt_execute($stmt)) {
            $id = mysqli_insert_id($connection);
            return $id;
        } else {
            echo mysqli_stmt_error($stmt);
        }
    }
}
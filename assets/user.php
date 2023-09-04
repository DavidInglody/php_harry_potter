<?php

/**
 * 
 * prida uživateľa do databáze
 * 
 * @param object $connection - pripojenie do databáze
 * @param string $first_name - krstné meno uživateľa
 * @param string $second_name - priezvisko uživateľa
 * @param string $email - email uživateľa
 * @param string $password - heslo uživateľa
 * 
 * @return integer $id - vracia id uživateľa
 * 
 */

function createUser($connection, $first_name, $second_name, $email, $password){
    $sql = " INSERT INTO user (first_name, second_name, email , password)
         VALUES (?, ?, ?, ?)";
    
    $stmt = mysqli_prepare($connection, $sql);

    if($stmt === false){
        echo mysqli_error($connection);
    } else {
        mysqli_stmt_bind_param($stmt, "ssss", $first_name, $second_name, $email, $password);
        
        mysqli_stmt_execute($stmt);
        $id = mysqli_insert_id($connection);
        return $id;

    }
}

/**
 *
 * Overenie použivateľa pomocou e-mailu a hesla
 * 
 * @param object $connection - pripojenie do databáze
 * @param string $log_email - email z fromulára pre prihlásenie
 * @param string $log_password - heslo z formulára pre prihlásenie 
 * 
 * @return boolean true - keď je prihlásenie úspšné, false pokiaľ je neuspešné
 */
 function authentication($connection, $log_email, $log_password) {
    $sql = "SELECT password
            FROM user
            WHERE email = ?";
    
    $stmt = mysqli_prepare($connection, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt,"s", $log_email);
        
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if($result -> num_rows != 0) {
                $password_database = mysqli_fetch_row($result); // tu je v premennej pole
                $user_password_database = $password_database[0]; // tu je v premennej string 

                if($user_password_database) {
                    return password_verify($log_password, $user_password_database);
                }
            } else {
                echo "chyba pri zadávaní emailu";
            }
            
        }


    } else {
        echo mysqli_error($connection);
    }
 }

/**
* 
* Získa ID od uživateľa pomocu emailu
*
* @param object $connection - prihlásenie do DB
* @param string $email - email uživáteľa, ktorého chceme zistiť ID
*
* @return integer vracia ID uživateľa 
*
*/

 function getUserId($connection, $email){
    $sql = "SELECT id FROM user
            WHERE email = ?";
    
    $stmt = mysqli_prepare($connection, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);

        if(mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            $id_database = mysqli_fetch_row($result);
            $user_id = $id_database[0];

            return $user_id;
        }
    } else {
        echo mysqli_error($connection);
    }
 }
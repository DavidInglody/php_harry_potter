<?php

/**
 * 
 * overi či je uživateľ prihlásený alebo nie
 * 
 * 
 * @return boolean True pokial je uživateľ prihlasený , inak false
 */
function isLoggedIn() {
    return isset ($_SESSION["is_logged_in"]) and $_SESSION["is_logged_in"];
}
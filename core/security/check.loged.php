<?php
if (!defined('SRCP')) {
    die("Logged Hacking attempt!");
}

if (isset($_COOKIE["session"]) && $_COOKIE["session"] != "") {
    $query = "SELECT logueado
              FROM usuarios
              WHERE cookie = :cookie";

    $query_params = array(':cookie' => $_COOKIE['session']);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        // Handle the error if needed
    }

    $row = $stmt->fetch();
    if ($row && $row['logueado'] == 'SI') {
        $login_ok = true;
    } else {
        $login_ok = false;
    }
} else {
    // Handle the case when the 'session' cookie is not set
    $login_ok = false;
}
?>

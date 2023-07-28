<?php
if (!defined('SRCP')) {
    die('Logged Hacking attempt!');
}

include_once CORE_DIR.'/sys_config.php';
require CORE_DIR.'/config.php';
include_once CORE_DIR.'/security/check.loged.php';
include_once CORE_DIR.'/security/functions.php';

// Ensure that $login_ok is defined and set before using it in the switch statement
$login_ok = false;

// Check if the "session" cookie is set before accessing it
if (isset($_COOKIE["session"]) && $_COOKIE["session"] != " ") {
    $query = "SELECT logueado FROM usuarios WHERE cookie = :cookie";
    $query_params = array(':cookie' => $_COOKIE['session']);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch (PDOException $ex) {
        //echo del error!
    }

    $row = $stmt->fetch();
    if ($row && $row['logueado'] == 'SI') {
        $login_ok = true;
    }
}

if (isset($_GET['do'])) {
    // Rest of the switch statement remains the same
    // ...
}

if (isset($_GET['accion'])) {
    // Rest of the code for handling 'accion' parameter remains the same
    // ...
}
?>

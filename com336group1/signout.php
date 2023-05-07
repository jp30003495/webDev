<?php
    session_start();

    //unset the session variables
    $_SESSION = array();

    //destory the session
    session_destroy();

    //redirect to the login page
    header("Location: login.php");
    exit;
?>
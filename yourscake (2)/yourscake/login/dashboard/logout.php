<?php
    session_start();
    session_unset();
    session_destroy();
    ob_start();
    header("location:http://localhost/yourscake/home.html");
    ob_end_flush();
    exit();
    
?>
<?php
//pagina per il logout, usata per il cambio di nickname
    session_start();
    session_unset();
    session_destroy();
    header("Location:index.php");
    exit(); 
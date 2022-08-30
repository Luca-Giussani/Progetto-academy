<?php
//pagina per l'inserimento dei dati nella sessione
    session_start();
    $nick = filter_input(INPUT_GET, 'nick');
    if($nick != null){}{
        $_SESSION["user"] = $nick;
    }
    $soluzione = array();
    $x=0;
    while($x < 4){
        $random= rand(0,9);
        if (!in_array($random,$soluzione)) {
            $soluzione[] = $random;
            $x++;
        }
    }
    $_SESSION["input"] = array(
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0),
        array(0,0,0,0)
    );
    $_SESSION["start"] = time();
    $_SESSION["soluzione"] = $soluzione;
    $_SESSION["punteggio"] = 0;
    $_SESSION["try"] = 0;
    $_SESSION["vittoria"] = false;
    $_SESSION["posizione"] = array(0,0,0,0,0,0,0);
    $_SESSION["numero"] = array(0,0,0,0,0,0,0);
    header("Location:game.php");
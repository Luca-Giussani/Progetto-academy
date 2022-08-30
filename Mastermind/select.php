<?php
    //pagina della selezione del menù
    session_start();
    $select = filter_input(INPUT_GET, 'select');
    //reindirizza verso la pagina di logout
    if($select=='out'){
        header("Location:logout.php");
    //reindirizza verso la pagina della leaderboard
    } else if($select=='lead'){
        header("Location:leaderboard.php");
    //resetta i dati per iniziare una nuova partita
    } else if($select=='new'){
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
        $_SESSION["punteggio"] = 0;
        $_SESSION["soluzione"] = $soluzione;
        $_SESSION["try"] = 0;
        $_SESSION["vittoria"] = false;
        $_SESSION["posizione"] = array(0,0,0,0,0,0,0);
        $_SESSION["numero"] = array(0,0,0,0,0,0,0);
        header("Location:game.php");
    } else {
        header("Location:game.php");
    }

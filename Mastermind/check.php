<?php
    if($_REQUEST != null){
        session_start();
        //verifica della vittoria
        for($x = 0; $x < 4; $x++){
            if( $_SESSION["soluzione"][strval($x)] !=  $_REQUEST[strval($x)+1]){
                $_SESSION["vittoria"] = false;
                break;
            } else {
                $_SESSION["vittoria"] = true;  
            } 
        }
        //calcolo dei numeri giusti nella posizione giusta
        $try = $_SESSION["try"];
        for($x = 0; $x < 4; $x++){
            if( $_SESSION["soluzione"][strval($x)] ==  $_REQUEST[strval($x)+1]){
                $_SESSION["posizione"][$try]++;
            }
        }
        //calcolo dei numeri giusti nella posizione sbagliatas
        for($x = 0; $x < 4; $x++){
            if( in_array($_REQUEST[strval($x)+1], $_SESSION["soluzione"]) and $_SESSION["soluzione"][strval($x)] !=  $_REQUEST[strval($x)+1]){
                $_SESSION["numero"][$try]++;
            }
        }
        for($x = 0; $x < 4; $x++){
            $_SESSION["input"][$try][$x] = $_REQUEST[strval($x)+1];
        }
        $_SESSION["try"]++;
    }
    header("Location:game.php");
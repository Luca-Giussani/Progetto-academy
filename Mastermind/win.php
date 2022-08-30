<?php
//pagina per il calcolo del punteggio in caso della vittoria e inserimento di esso nel DB
    session_start();
    if($_SESSION["vittoria"] == true and $_SESSION["punteggio"] == 0){
        $finish = time();
        $ore = date("h", $finish) - (date("h", $_SESSION["start"]));
        $minuti = date("i", $finish) - date("i", $_SESSION["start"]);
        $secondi = date("s", $finish) - date("s", $_SESSION["start"]);
        $punteggio = (((9 - $_SESSION["try"]) * 1000) - (($ore*3600) + ($minuti*60) + $secondi));
        $time = mktime($ore, $minuti, $secondi);
        $_SESSION["time"] = $time;
        $_SESSION["punteggio"] = $punteggio;
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "mastermind";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $nick = $_SESSION["user"];
        $sql = "INSERT INTO leaderboard (nickname, punteggio, tempo) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nick, $punteggio, date("H:i:s", $time));
        $stmt->execute();
        if ($conn->query($sql) === TRUE) {
            header("Location:game.php");
        }
        $conn -> close();
    }
    header("Location:game.php");
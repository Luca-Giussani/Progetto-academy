<?php
    session_start();
    /* soluzione a schermo da usare in fase di prova
    for($x = 0; $x < 4; $x++){
        echo $_SESSION["soluzione"][$x];
    }*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mastermind</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body onbeforeunload="document.getElementById('select').options.length = 0;">
        <!-- username a schermo -->
        <div class="txt"><?php echo $_SESSION["user"] ?></div>
        <!-- menù di selezione -->
        <div class="menù">
            <form action="select.php">
                <label>Menù</label>
                <select id="select" name="select" onchange="this.form.submit();">
                    <option selected></option>
                    <option value="new">Nuova Partita</option>
                    <option value="lead">Leaderboard</option>
                    <option value="out">Logout</option>
                </select>
            </form>
        </div>
        <details>
            <summary id="summary"> ? </summary>
            <p> Mastermind è un gioco in cui devi indovinare una sequenza di 4 cifre diverse in 7 tentativi</p>
        </details>
        <?php if($_SESSION["vittoria"] == false and $_SESSION["try"] < 7){ ?>
        <div class="game">
            <!-- primo try -->
            <form action="check.php" method="get">
                <input class="num" type="number" name="1" min="0" max="9" value="<?php if($_SESSION["try"] > 0){ echo $_SESSION["input"][0][0]; } ?>" <?php if($_SESSION["try"] != 0){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="2" min="0" max="9" value="<?php if($_SESSION["try"] > 0){ echo $_SESSION["input"][0][1]; } ?>" <?php if($_SESSION["try"] != 0){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="3" min="0" max="9" value="<?php if($_SESSION["try"] > 0){ echo $_SESSION["input"][0][2]; } ?>" <?php if($_SESSION["try"] != 0){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="4" min="0" max="9" value="<?php if($_SESSION["try"] > 0){ echo $_SESSION["input"][0][3]; } ?>" <?php if($_SESSION["try"] != 0){ ?> disabled="true" <?php } ?> required>
                <?php if($_SESSION["try"] == 0){ ?> <input class="sub" type="submit" value="▶"> <?php } if($_SESSION["try"] > 0){ ?>
                    <label class="lab1" onmouseover="show()"> <?php echo $_SESSION["posizione"][0]; ?> </label>
                    <label class="lab2" onmouseover="show2()"> <?php echo $_SESSION["numero"][0]; ?> </label>
                <?php } ?>
            </form>
            <!-- secondo try -->
            <form action="check.php" method="get">
                <input class="num" type="number" name="1" min="0" max="9" value="<?php if($_SESSION["try"] > 1){ echo $_SESSION["input"][1][0]; } ?>" <?php if($_SESSION["try"] != 1){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="2" min="0" max="9" value="<?php if($_SESSION["try"] > 1){ echo $_SESSION["input"][1][1]; } ?>" <?php if($_SESSION["try"] != 1){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="3" min="0" max="9" value="<?php if($_SESSION["try"] > 1){ echo $_SESSION["input"][1][2]; } ?>" <?php if($_SESSION["try"] != 1){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="4" min="0" max="9" value="<?php if($_SESSION["try"] > 1){ echo $_SESSION["input"][1][3]; } ?>" <?php if($_SESSION["try"] != 1){ ?> disabled="true" <?php } ?> required>
                <?php if($_SESSION["try"] == 1){ ?> <input class="sub" type="submit" value="▶"> <?php } if($_SESSION["try"] > 1){ ?>
                    <label class="lab1" onmouseover="show()"> <?php echo $_SESSION["posizione"][1]; ?> </label>
                    <label class="lab2" onmouseover="show()"> <?php echo $_SESSION["numero"][1]; ?> </label>
                <?php } ?>
            </form>
            <!-- terzo try -->
            <form action="check.php" method="get">
                <input class="num" type="number" name="1" min="0" max="9" value="<?php if($_SESSION["try"] > 2){ echo $_SESSION["input"][2][0]; } ?>" <?php if($_SESSION["try"] != 2){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="2" min="0" max="9" value="<?php if($_SESSION["try"] > 2){ echo $_SESSION["input"][2][1]; } ?>" <?php if($_SESSION["try"] != 2){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="3" min="0" max="9" value="<?php if($_SESSION["try"] > 2){ echo $_SESSION["input"][2][2]; } ?>" <?php if($_SESSION["try"] != 2){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="4" min="0" max="9" value="<?php if($_SESSION["try"] > 2){ echo $_SESSION["input"][2][3]; } ?>" <?php if($_SESSION["try"] != 2){ ?> disabled="true" <?php } ?> required>
                <?php if($_SESSION["try"] == 2){ ?> <input class="sub" type="submit" value=">"> <?php } if($_SESSION["try"] > 2){ ?>
                    <label class="lab1" onmouseover="show()"> <?php echo $_SESSION["posizione"][2]; ?> </label>
                    <label class="lab2" onmouseover="show()"> <?php echo $_SESSION["numero"][2]; ?> </label>
                <?php } ?>
            </form>
            <!-- quarto try -->
            <form action="check.php" method="get">
                <input class="num" type="number" name="1" min="0" max="9" value="<?php if($_SESSION["try"] > 3){ echo $_SESSION["input"][3][0]; } ?>" <?php if($_SESSION["try"] != 3){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="2" min="0" max="9" value="<?php if($_SESSION["try"] > 3){ echo $_SESSION["input"][3][1]; } ?>" <?php if($_SESSION["try"] != 3){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="3" min="0" max="9" value="<?php if($_SESSION["try"] > 3){ echo $_SESSION["input"][3][2]; } ?>" <?php if($_SESSION["try"] != 3){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="4" min="0" max="9" value="<?php if($_SESSION["try"] > 3){ echo $_SESSION["input"][3][3]; } ?>" <?php if($_SESSION["try"] != 3){ ?> disabled="true" <?php } ?> required>
                <?php if($_SESSION["try"] == 3){ ?> <input class="sub" type="submit" value="▶"> <?php } if($_SESSION["try"] > 3){ ?>
                    <label class="lab1" onmouseover="show()"> <?php echo $_SESSION["posizione"][3]; ?> </label>
                    <label class="lab2" onmouseover="show()"> <?php echo $_SESSION["numero"][3]; ?> </label>
                <?php } ?>
            </form>
            <!-- quinto try -->
            <form action="check.php" method="get">
                <input class="num" type="number" name="1" min="0" max="9" value="<?php if($_SESSION["try"] > 4){ echo $_SESSION["input"][4][0]; } ?>" <?php if($_SESSION["try"] != 4){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="2" min="0" max="9" value="<?php if($_SESSION["try"] > 4){ echo $_SESSION["input"][4][1]; } ?>" <?php if($_SESSION["try"] != 4){ ?> disabled="true" <?php } ?> required> 
                <input class="num" type="number" name="3" min="0" max="9" value="<?php if($_SESSION["try"] > 4){ echo $_SESSION["input"][4][2]; } ?>" <?php if($_SESSION["try"] != 4){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="4" min="0" max="9" value="<?php if($_SESSION["try"] > 4){ echo $_SESSION["input"][4][3]; } ?>" <?php if($_SESSION["try"] != 4){ ?> disabled="true" <?php } ?> required>
                <?php if($_SESSION["try"] == 4){ ?> <input class="sub" type="submit" value="▶"> <?php } if($_SESSION["try"] > 4){ ?>
                    <label class="lab1" onmouseover="show()"> <?php echo $_SESSION["posizione"][4]; ?> </label>
                    <label class="lab2" onmouseover="show()"> <?php echo $_SESSION["numero"][4]; ?> </label>
                <?php } ?>
            </form>
            <!-- sesto try -->
            <form action="check.php" method="get">
                <input class="num" type="number" name="1" min="0" max="9" value="<?php if($_SESSION["try"] > 5){ echo $_SESSION["input"][5][0]; } ?>" <?php if($_SESSION["try"] != 5){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="2" min="0" max="9" value="<?php if($_SESSION["try"] > 5){ echo $_SESSION["input"][5][1]; } ?>" <?php if($_SESSION["try"] != 5){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="3" min="0" max="9" value="<?php if($_SESSION["try"] > 5){ echo $_SESSION["input"][5][2]; } ?>" <?php if($_SESSION["try"] != 5){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="4" min="0" max="9" value="<?php if($_SESSION["try"] > 5){ echo $_SESSION["input"][5][3]; } ?>" <?php if($_SESSION["try"] != 5){ ?> disabled="true" <?php } ?> required>
                <?php if($_SESSION["try"] == 5){ ?> <input class="sub" type="submit" value="▶"> <?php } if($_SESSION["try"] > 5){ ?>
                    <label class="lab1" onmouseover="show()"> <?php echo $_SESSION["posizione"][5]; ?> </label>
                    <label class="lab2" onmouseover="show2()"> <?php echo $_SESSION["numero"][5]; ?> </label>
                <?php } ?>
            </form>
            <!-- settimo try -->
            <form action="check.php" method="get">
                <input class="num" type="number" name="1" min="0" max="9" value="<?php if($_SESSION["try"] > 6){ echo $_SESSION["input"][6][0]; } ?>" <?php if($_SESSION["try"] != 6){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="2" min="0" max="9" value="<?php if($_SESSION["try"] > 6){ echo $_SESSION["input"][6][1]; } ?>" <?php if($_SESSION["try"] != 6){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="3" min="0" max="9" value="<?php if($_SESSION["try"] > 6){ echo $_SESSION["input"][6][2]; } ?>" <?php if($_SESSION["try"] != 6){ ?> disabled="true" <?php } ?> required>
                <input class="num" type="number" name="4" min="0" max="9" value="<?php if($_SESSION["try"] > 6){ echo $_SESSION["input"][6][3]; } ?>" <?php if($_SESSION["try"] != 6){ ?> disabled="true" <?php } ?> required>
                <?php if($_SESSION["try"] == 6){ ?> <input class="sub" type="submit" value="▶"> <?php } if($_SESSION["try"] > 6){ ?>
                    <label class="lab1" onmouseover="show()"> <?php echo $_SESSION["posizione"][6]; ?> </label>
                    <label class="lab2" onmouseover="show2()"> <?php echo $_SESSION["numero"][6]; ?> </label>
                <?php } ?>
            </form>
        </div>
        <!-- schermata di perdita -->
        <?php } else if($_SESSION["vittoria"]==false and $_SESSION["try"]==7){ ?>
            <div class="login"><h1> HAI PERSO! </h1></div>
        <!-- schermata di vittoria -->
        <?php } else if($_SESSION["punteggio"] == 0){ header("Location:win.php"); } else {?>
            <div class="login">
                <h1> HAI VINTO! </h1> 
                <p>punteggio: <?php echo $_SESSION["punteggio"] ?></p>
                <p>tempo: <?php echo date("H:i:s", $_SESSION["time"]) ?></p>
            </div>
        <?php }?>
        <!-- script per l'apertura di window aler usati in riga 39, 40, 52, 53, 65, 66, 78, 79, 91 e 92 -->
        <script>
            function show() {
                alert("numeri giusti posizione giusta");
            }
            function show2() {
                alert("numeri giusti posizione sbagliata:");
            }
        </script>
    </body>
</html>
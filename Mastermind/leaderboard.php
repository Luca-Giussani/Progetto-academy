<?php
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "mastermind";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT nickname, punteggio, tempo, convert(tempo, time) as ts FROM leaderboard ORDER BY punteggio DESC limit 10 ";
    $result = $conn->query($sql);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mastermind leaderboard</title>
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
        <table>
            <tr>
                <th style="text-align: left"> Posizione </th>
                <th style="text-align: center"> Nickname </th>
                <th style="text-align: center"> Punteggio </th>
                <th style="text-align: right"> Tempo </th>
            </tr>
            <?php $x=1; while($row = $result->fetch_assoc()) { ?>
            <tr> 
                <td style="text-align: left"> <?php echo $x . "°" ?> </td>
                <td style="text-align: center"> <?php echo $row["nickname"] ?> </td>
                <td style="text-align: center"> <?php echo $row["punteggio"] ?> </td>
                <td style="text-align: right"> <?php echo $row["ts"] ?> </td>
            </tr>
            <?php
                $x++;
                }
                $conn->close();
            ?>
       </table>     
    </body>
</html>
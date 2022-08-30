<?php
    session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mastermind login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body onbeforeunload="document.getElementById('select').options.length = 0;">
        <?php if(!isset($_SESSION["user"])){ ?>
        <div class="login">
            <!-- form per la scelta del nickname -->
            <form action="action.php" onsubmit="return validateForm()" method="get">
                <label style="font-size: 175%" for="nickname">Nickname:</label><div class="dbr"><br></div>
                <input class="input" type="text" name="nick" autofocus required><div class="dbr"><br></div>
                <input class="button" type="submit" value="Invio">
            </form>
        </div>
        <?php } else { header("Location:game.php"); } ?>
    </body>
</html>
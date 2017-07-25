<?php

    /***********************************
     * php.ini
     * - display_errors
     * - error_reporting=E_ALL
     ***********************************/
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include "consts.php";
    include "sentenceDAOpdo.php";

    $sentenceDAO = new SentenceDAOpdo();

    $sentence = $sentenceDAO->get(null);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/style.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/script.js"></script>

        <title>quizukei</title>
    </head>
    <body>
        <div id="container">
            <form id="filterForm">
                <input type="text" id="filterInput" placeholder="(Optional) Enter filter text">
                <input type="submit" id="submit" value="Submit">
            </form>
            <div id="result">
                <?php
                    if (isset($sentence))
                    {
                        echo "<h4>". $sentence->romaji . "</h4>";
                        echo "<p>". $sentence->en . "</p>";
                        echo "<p>(ID: " . $sentence->id . ")</p>";
                        unset($sentence);
                    }
                    else
                    {
                        echo "No sentences found!<br>";
                    }
                ?>
            </div>
        </div>

        <br><br>
        <footer>
            <hr>
            <p>Copyright &copy; 2017 gxgbits.com. All rights reserved.</p>
        </footer>
    </body>
</html>

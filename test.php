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

        <script src="https://use.fontawesome.com/73fcc4c251.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="js/script.js"></script>

        <title>quizukei</title>
    </head>
    <body>
        <div id="container">
            <div id="result">
                <?php
                    if (isset($sentence))
                    {
                        echo '<p id="sentenceId"># ' . $sentence->id . ': ';
                        echo '<span id="lessonInfo">Level: '. $sentence->level .', Unit: '. $sentence->unit .', Lesson: '. $sentence->lesson .'</span>';
                        echo '</p>';
                        echo '<h4><i id="qkarrow" class="fa fa-chevron-circle-right" aria-hidden="true"></i> '. $sentence->romaji . '</h4>';
                        echo '<p id="sentenceEn">'. $sentence->en . '</p>';
                        unset($sentence);
                    }
                    else
                    {
                        echo 'No sentences found!';
                    }
                ?>
            </div>

            <form id="filterForm">
                <input type="text" id="filterInput" placeholder="(Optional) Enter filter text" autofocus="autofocus">
                <button type="reset" id="clear"><i class="fa fa-remove"></i></button>
                <button type="submit" class="btn btn-default" id="submit"><i class="fa fa-random"></i> &#x3064 &#x304e</button>
            </form>
        </div>

        <footer>
            <p>Copyright &copy; 2017 gxgbits.com. All rights reserved.</p>
        </footer>
    </body>
</html>

<?php

    /***********************************
     * php.ini
     * - display_errors
     * - error_reporting=E_ALL
     ***********************************/
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    const GXG_DEBUG = true;

    include "sentenceDAOpdo.php";

echo '*** test start';
    $sentenceDAO = new SentenceDAOpdo();

    $sentenceDAO->getTest();
echo '*** test finish';
?>

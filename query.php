<?php
    include "consts.php";
    include "sentenceDAOpdo.php";

    $filter = NULL;

    if (isset($_POST['filter']) && (!empty($_POST['filter'])))
    {
        $filter = $_POST['filter'];
    }

    $sentenceDAO = new SentenceDAOpdo();

    $sentence = $sentenceDAO->get($filter);
    if (isset($sentence) && (NULL != $sentence->id))
    {
        echo "<p># " . $sentence->id . ":</p>";
        echo "<h4>". $sentence->romaji . "</h4>";
        echo "<p>". $sentence->en . "</p>";
        // if (isset($filter))
        // {
        //     echo "<p>Filter:". $filter . ", len:" . strlen($filter) . "</p>";
        // }

        unset($sentence);
    }
    else
    {
        $msg = 'No sentences found';
        if (isset($filter))
        {
            $msg .= ' with filter "' . $filter . '"';
        }
        echo '<p>' . $msg . '!</p>';
    }
?>

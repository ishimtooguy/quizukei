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
        echo '<p id="sentenceId"># ' . $sentence->id . ': ';
        echo '<span id="lessonInfo">Level: '. $sentence->level .', Unit: '. $sentence->unit .', Lesson: '. $sentence->lesson .'</span>';
        echo '</p>';
        echo '<h4><i id="qkarrow" class="fa fa-chevron-circle-right" aria-hidden="true"></i> '. $sentence->romaji . '</h4>';
        echo '<p id="sentenceEn">'. $sentence->en . '</p>';
        // if (isset($filter))
        // {
        //     echo '<p>Filter:'. $filter . ', len:' . strlen($filter) . '</p>';
        // }

        unset($sentence);
    }
    else
    {
        $msg = 'No sentences found';
        if (isset($filter))
        {
            $msg .= ' containing "' . $filter . '"';
        }
        echo '<p>' . $msg . '!</p>';
    }
?>

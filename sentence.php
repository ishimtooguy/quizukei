<?php

    /************************************************************************
     * TODO:
     *  + 2017-07-20 Add romaji column
     *    - jpn column to be filled in later.
     ***********************************************************************/

    class Sentence
    {
        public $id;
        public $jpn;
        public $romaji;
        public $en;
        public $level;
        public $unit;
        public $lesson;
        public $dateInserted;
        public $dateLastHit;
        public $hitCount;
    }

?>

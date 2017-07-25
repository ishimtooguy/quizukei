<?php
    /******************************************************************
     * TODO:
     * - Define a stored procedure for querying with a filter string.
     ******************************************************************/

    const QUERY_TEST = "SELECT * FROM sentence ORDER BY id";
    const QUERY_RAND_NO_FILTER =
        "SELECT * FROM sentence AS S JOIN ".
          "(SELECT CEIL(RAND() * (SELECT MAX(id) FROM sentence)) AS id) ".
          "AS R ".
         "WHERE S.id >= R.id ".
         "ORDER BY S.id ASC ".
         "LIMIT 1";

     const QUERY_RAND_WITH_FILTER =
         "CALL getFilteredSentence(:filter)";

    include "../../db/conn.php";
    include "sentence.php";

    class SentenceDAOpdo
    {
        public function get($filter)
        {
            if (GXG_DEBUG)
            {
                echo '*** SentencePDO.get start<br>';
            }

            $dbconn = getDBConnection();

            try
            {
                if (isset($filter))
                {
                    $query = $dbconn->prepare(QUERY_RAND_WITH_FILTER);
                    $query->bindValue(':filter', $filter);
                    $query->execute();
                }
                else
                {
                    $query = $dbconn->query(QUERY_RAND_NO_FILTER);
                }

                $query->setFetchMode(PDO::FETCH_CLASS, 'Sentence');
                $row = $query->fetch();

                // $row->romaji = htmlentities($row->romaji);
                //echo '<pre>', print_r($row), '</pre>';
            }
            catch (PDOException $ex)
            {
                echo $ex->getMessage();
                die('Failed to retrieve sentence data.');
            }

            if (GXG_DEBUG)
            {
                echo '*** SentencePDO.get finish<br>';
            }
            return $row;
        }

        public function getTest()
        {
            if (GXG_DEBUG)
            {
                echo '*** SentencePDO.getTest start<br>';
            }

            $dbconn = getDBConnection();

            try
            {
                $query = $dbconn->query(QUERY_RAND_NO_FILTER);
                $query->setFetchMode(PDO::FETCH_CLASS, 'Sentence');

                while ($row = $query->fetch())
                {
                    echo '<pre>', print_r($row), '</pre>';
                }
            }
            catch (PDOException $ex)
            {
                echo $ex->getMessage();
                die('Failed to retrieve sentence data.');
            }

            if (GXG_DEBUG)
            {
                echo '*** SentencePDO.getTest finish<br>';
            }
        }
    }

?>

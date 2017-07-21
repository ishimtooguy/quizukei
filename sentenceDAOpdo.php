<?php
    const QUERY_TEST = "SELECT * FROM sentence ORDER BY id";
    const QUERY_RAND =
        "SELECT * FROM sentence AS S JOIN ".
          "(SELECT CEIL(RAND() * (SELECT MAX(id) FROM sentence)) AS id) ".
          "AS R ".
         "WHERE S.id >= R.id ".
         "ORDER BY S.id ASC ".
         "LIMIT 1";

    include "../../db/conn.php";
    include "sentence.php";

    class SentenceDAOpdo
    {
        public function getTest()
        {
            if (GXG_DEBUG)
            {
                echo '*** SentencePDO.getTest start';
            }

            $dbconn = getDBConnection();

            try
            {
                $query = $dbconn->query(QUERY_RAND);
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
                echo '*** SentencePDO.getTest finish';
            }
        }
    }

?>

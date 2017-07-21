<?php
    const HOSTNAME="127.0.0.1";
    const USERNAME="username";
    const DBNAME="quizukei";
    const PW="password";

    function getDBConnection()
    {
        try
        {
            $db = new PDO('mysql:host='.HOSTNAME.';dbname='.DBNAME, USERNAME, PW);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
            die('Failed to connect to database.');
        }

        return $db;
    }
?>

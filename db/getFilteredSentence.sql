DELIMITER $$

DROP PROCEDURE IF EXISTS getFilteredSentence;

CREATE PROCEDURE getFilteredSentence(IN filter TEXT)
BEGIN

  DECLARE rowCount INT DEFAULT 0;
  DECLARE rowRand INT DEFAULT 0;
  DECLARE filterPattern TEXT;

  SET filterPattern = CONCAT('%', filter, '%');

  SELECT COUNT(*) INTO rowCount
   FROM sentence WHERE romaji LIKE filterPattern;

  SELECT CEIL(RAND() * rowCount) INTO rowRand;

  SET @rank = 0;
  SELECT * FROM
  (SELECT @rank:=@rank+1 AS rank, sentence.* FROM sentence
   WHERE romaji LIKE filterPattern) AS TT
  WHERE rank = rowRand;

END$$

DELIMITER ;

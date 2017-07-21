
CREATE TABLE IF NOT EXISTS sentence
(
    id              BIGINT AUTO_INCREMENT PRIMARY KEY,
    jpn             TEXT CHARACTER SET UTF8 NOT NULL,
    en              TEXT CHARACTER SET UTF8 NOT NULL,
    level           INTEGER,
    unit            INTEGER,
    lesson          INTEGER,
    dateInserted    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    dateLastHit     TIMESTAMP NULL,
    hitCount        INTEGER DEFAULT 0
);

CREATE TABLE IF NOT EXISTS idiom
(
    id              BIGINT AUTO_INCREMENT PRIMARY KEY,
    name            TEXT CHARACTER SET UTF8 NOT NULL,
    nickname        TEXT CHARACTER SET UTF8 NOT NULL,
    description     TEXT CHARACTER SET UTF8 NOT NULL
);

CREATE TABLE IF NOT EXISTS sentence_idiom
(
    sentenceId      BIGINT NOT NULL,
    idiomId         BIGINT NOT NULL,
    FOREIGN KEY sentenceId_fk (sentenceId)
        REFERENCES sentence(id) ON DELETE CASCADE,
    FOREIGN KEY idiomId_fk (idiomId)
        REFERENCES idiom(id) ON DELETE CASCADE
);

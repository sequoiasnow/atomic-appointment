DROP TABLE IF EXISTS <?php print DB_TABLE_PREFIX . Users::TableName; ?>;
CREATE TABLE <?php print DB_TABLE_PREFIX . Users::TableName; ?> VALUES(
    id INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    pass VARCHAR(65) NOT NULL,
    PRIMARY KEY(id)
);

DROP TABLE IF EXISTS <?php print DB_TABLE_PREFIX . Client::TableName; ?>;
CREATE TABLE <?php print DB_TABLE_PREFIX . Client::TableName; ?> VALUES(
    id INT(11) NOT NULL AUTO_INCREMENT,
    userid INT(11) NOT NULL,
    email VARCHAR(255) NOT NULL,
    key VARCHAR(65) NOT NULL,
    PRIMARY KEY(id),
    FOREIGN KEY(userid) REFERENCES <?php print DB_TABLE_PREFIX . Users::TableName; ?>(id)
);

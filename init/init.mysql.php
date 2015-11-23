DROP TABLE IF EXISTS <?php print DB_TABLE_PREFIX . User::TableName; ?>;
CREATE TABLE <?php print DB_TABLE_PREFIX . User::TableName; ?> (
    id INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    pass VARCHAR(65) NOT NULL,
    PRIMARY KEY(id)
);

DROP TABLE IF EXISTS <?php print DB_TABLE_PREFIX . AppointmentGroup::TableName; ?>;
CREATE TABLE <?php print DB_TABLE_PREFIX . AppointmentGroup::TableName; ?> (
    id INT(11) NOT NULL AUTO_INCREMENT,
    userid INT(11) NOT NULL,
    PRIMARY KEY(id)
);

DROP TABLE IF EXISTS <?php print DB_TABLE_PREFIX . Appointment::TableName; ?>;
CREATE TABLE <?php print DB_TABLE_PREFIX . Appointment::TableName; ?> (
    id INT(11) NOT NULL AUTO_INCREMENT,
    appgroupid INT(11) NOT NULL,
    PRIMARY KEY(id)
);

DROP TABLE IF EXISTS <?php print DB_TABLE_PREFIX . Client::TableName; ?>;
CREATE TABLE <?php print DB_TABLE_PREFIX . Client::TableName; ?> (
    id INT(11) NOT NULL AUTO_INCREMENT,
    appid INT(11),
    email VARCHAR(255) NOT NULL,
    hash VARCHAR(65) NOT NULL,
    PRIMARY KEY(id)
);

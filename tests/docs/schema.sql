CREATE USER IF NOT EXISTS dbuser@localhost IDENTIFIED BY 'dbpass';
CREATE DATABASE IF NOT EXISTS doctrine_dbal_study01 DEFAULT CHARACTER SET utf8mb4;

GRANT ALL PRIVILEGES ON doctrine_dbal_study01.* TO dbuser@localhost;
FLUSH PRIVILEGES;

CREATE TABLE posts
(
    id    int unsigned auto_increment,
    title varchar(100),
    body  text,
    primary key (id)
) engine=InnoDB default charset = utf8mb4;

INSERT INTO posts(title, body) VALUES
    ('タイトル1', '本文1'),
    ('タイトル2', '本文2'),
    ('タイトル3', '本文3'),
    ('タイトル4', '本文4'),
    ('タイトル5', '本文5')
;

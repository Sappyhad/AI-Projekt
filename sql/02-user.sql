CREATE TABLE `user`
(
    `id`      INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) COLLATE='utf8_polish_ci'
;

INSERT INTO user (email, password)
VALUES ('test','test');

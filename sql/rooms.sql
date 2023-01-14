CREATE TABLE `rooms`
(
    `id`      INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `teachername` VARCHAR(255) NOT NULL,
    `teacherlastname` VARCHAR(255) NOT NULL,
    `linktosubjects` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) COLLATE='utf8_polish_ci'
;

INSERT INTO rooms (name, teachername, teacherlastname, linktosubjects)
VALUES ('17','Jan','Kowalski', 'link');
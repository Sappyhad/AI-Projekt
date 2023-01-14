CREATE TABLE `employee`
(
    `id`      INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `lastname` VARCHAR(255) NOT NULL,
    `position` VARCHAR(255) NOT NULL,
    `schedule` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) COLLATE='utf8_polish_ci'
;

INSERT INTO employee (name, lastname, position, schedule)
VALUES ('Jan','kowalski', 'profesor', 'zajecia');

CREATE TABLE `users` (
`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
`username` VARCHAR(50) NOT NULL,
`email` VARCHAR(100) NOT NULL,
`password_hash` VARCHAR(255) NOT NULL,
PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

ALTER TABLE `users`
  ADD UNIQUE INDEX `username unique` (`username`);

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `due_time` date NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

DELIMITER //
CREATE PROCEDURE `getUserTasksOfToday`(IN `name` VARCHAR(255))
NO SQL
  BEGIN
    SELECT tasks.id, due_time, completed, user_id, content FROM tasks
      INNER JOIN users
        ON tasks.user_id = users.id
    WHERE users.username = name and due_time=CURDATE() and completed = 0;
  END //

DELIMITER //
CREATE PROCEDURE `insertTask`(IN `content` VARCHAR(255), IN `due_time` DATE, IN `user_id` INT(10))
NO SQL
BEGIN
INSERT INTO tasks (content, due_time, user_id, completed) VALUES (content, due_time, user_id, 0);
END //


ALTER TABLE `users`
  ADD COLUMN `fb_id` VARCHAR(255) NOT NULL AFTER `password_hash`;

ALTER TABLE `users`
  ALTER `username` DROP DEFAULT,
  ALTER `email` DROP DEFAULT,
  ALTER `password_hash` DROP DEFAULT;

ALTER TABLE `users`
  CHANGE COLUMN `username` `username` VARCHAR(50) NULL AFTER `id`,
  CHANGE COLUMN `email` `email` VARCHAR(100) NULL AFTER `username`,


DELIMITER //
CREATE PROCEDURE `insertUser`(IN `fb_id` VARCHAR(255), IN `email` VARCHAR(100))
NO SQL
  BEGIN
    INSERT INTO users (fb_id, email) VALUES (fb_id, email);
  END //
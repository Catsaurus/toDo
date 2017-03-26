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
  CHANGE COLUMN `email` `email` VARCHAR(100) NULL AFTER `username`;


DELIMITER //
CREATE PROCEDURE `insertUser`(IN `fb_id` VARCHAR(255), IN `email` VARCHAR(100))
NO SQL
  BEGIN
    INSERT INTO users (fb_id, email) VALUES (fb_id, email);
  END //

DELIMITER //
CREATE PROCEDURE `getUsersTasksThisWeek`(IN `userId` INT)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = userId and completed=0 and due_time!=CURDATE() and WEEK(due_time) = WEEK(CURDATE());
  END //

DELIMITER //
CREATE PROCEDURE `getUsersTasksFuture`(IN `userId` INT)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = userId and completed=0 and
          YEAR(due_time) >= YEAR(CURDATE()) and WEEK(due_time) > WEEK(CURDATE());
  END //


DROP PROCEDURE  `getUserTasksOfToday` ;

DELIMITER //
CREATE PROCEDURE  `getUserTasksOfToday` ( IN  `iD` INT( 255 ) UNSIGNED ) NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER
  BEGIN
    SELECT tasks.id, due_time, completed, user_id, content FROM tasks
      INNER JOIN users
        ON tasks.user_id = users.id
    WHERE users.id=iD and due_time=CURDATE() and completed = 0;
  END

END //


DROP PROCEDURE IF EXISTS `insertUser`;


CREATE PROCEDURE `insertFbUser`(
  IN `fb_id` VARCHAR(255),
  IN `email` VARCHAR(100)
)
LANGUAGE SQL
NOT DETERMINISTIC
NO SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    INSERT INTO users (fb_id, email) VALUES (fb_id, email);
  END;

DELIMITER //
CREATE PROCEDURE `insertUser`(IN `username` VARCHAR(50), IN `email` VARCHAR(100), IN `password_hash` VARCHAR(255))
NO SQL
  BEGIN
    INSERT INTO users (username, email, password_hash) VALUES (username, email, password_hash);
  END //

CREATE PROCEDURE `markTaskDone`(
  IN `idIN` INT)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    UPDATE tasks
    SET completed = 1
    where id = idIN;
  END;

CREATE PROCEDURE  `changePassword`
    ( IN  `idIn` INT, IN  `pass` INT( 255 ) )
    NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER
BEGIN
  UPDATE users
  SET password_hash = pass
  WHERE id = idIn;
END;

  CREATE PROCEDURE `changeEmail`(IN `idIn` INT, IN `emailIn` VARCHAR(255))
  NO SQL
BEGIN
update users
set email = emailIn
where id = idIn;
END;


DELIMITER //
CREATE PROCEDURE `tasksOfUser` (IN `userId` INT)
  BEGIN
    SELECT COUNT(id) as `tasks` FROM tasks WHERE tasks.user_id = userId;
  END //


CREATE VIEW usersCount
AS SELECT COUNT(*) FROM users;


CREATE PROCEDURE `allTasksAmount`()
BEGIN
SELECT COUNT(id) as `tasks` FROM tasks;
END;

CREATE PROCEDURE `getUndonePastTasks`(IN `userId` INT)
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = userId and completed=0 and WEEK(due_time) < WEEK(CURDATE())
    LIMIT 7;
  END;

CREATE PROCEDURE `getDoneTasks`(IN `userId` INT)
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = userId and completed=1
    LIMIT 7;
  END;

CREATE PROCEDURE `markTaskUndone`(IN `idIN` INT)
BEGIN
UPDATE tasks
SET completed = 0
where id = idIN;
END;


DELIMITER //
CREATE TABLE `pets`(
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `score` INT NOT NULL DEFAULT 0,
  `description` TEXT,
  `imgpath` CHAR,
  PRIMARY KEY (`id`)
);
//
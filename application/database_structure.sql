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
  ADD COLUMN `fb_id` VARCHAR(255) NULL AFTER `password_hash`;

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
  END//


DROP PROCEDURE IF EXISTS `insertUser`;

DELIMITER //
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
  END //

DELIMITER //
CREATE PROCEDURE `insertUser`(IN `username` VARCHAR(50), IN `email` VARCHAR(100), IN `password_hash` VARCHAR(255))
NO SQL
  BEGIN
    INSERT INTO users (username, email, password_hash) VALUES (username, email, password_hash);
  END //

DELIMITER //
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
  END //

DELIMITER /
CREATE PROCEDURE  `changePassword`
    ( IN  `idIn` INT, IN  `pass` INT( 255 ) )
    NOT DETERMINISTIC NO SQL SQL SECURITY DEFINER
BEGIN
  UPDATE users
  SET password_hash = pass
  WHERE id = idIn;
END//

DELIMITER /
  CREATE PROCEDURE `changeEmail`(IN `idIn` INT, IN `emailIn` VARCHAR(255))
  NO SQL
BEGIN
update users
set email = emailIn
where id = idIn;
END //


DELIMITER //
CREATE PROCEDURE `tasksOfUser` (IN `userId` INT)
  BEGIN
    SELECT COUNT(id) as `tasks` FROM tasks WHERE tasks.user_id = userId;
  END //


CREATE VIEW usersCount
AS SELECT COUNT(*) FROM users;

DELIMITER //
CREATE PROCEDURE `allTasksAmount`()
BEGIN
SELECT COUNT(id) as `tasks` FROM tasks;
END //

DELIMITER //
CREATE PROCEDURE `getUndonePastTasks`(IN `userId` INT)
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = userId and completed=0 and WEEK(due_time) < WEEK(CURDATE())
    LIMIT 7;
  END//

DELIMITER //
CREATE PROCEDURE `getDoneTasks`(IN `userId` INT)
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = userId and completed=1
    LIMIT 7;
  END//

DELIMITER //
CREATE PROCEDURE `markTaskUndone`(IN `idIN` INT)
BEGIN
UPDATE tasks
SET completed = 0
where id = idIN;
END //

/*teeb tabeli pets*/
CREATE TABLE `pets` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL COLLATE 'utf8_estonian_ci',
  `score` INT(11) NOT NULL DEFAULT '0',
  `description` TEXT NULL COLLATE 'utf8_estonian_ci',
  `imgname` CHAR(60) NULL DEFAULT NULL COLLATE 'utf8_estonian_ci',
  PRIMARY KEY (`id`)
)
  COLLATE='utf8_estonian_ci'
  ENGINE=InnoDB
  AUTO_INCREMENT=3
;
/*lisab pets tabelisse 2 looma*/
INSERT INTO `pets` (`id`, `name`, `score`, `description`, `imgname`) VALUES (NULL, 'sheepy-sheepy', '0', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in nibh ut lacus bibendum iaculis. Integer vel arcu id nunc pulvinar elementum. Vestibulum in neque viverra, ultrices velit in, iaculis erat. Curabitur ultricies lectus quis pulvinar lacinia. Cras mattis sapien justo, in porta lacus tincidunt eu. Donec non odio pharetra, mattis eros in, ultrices justo. Cras non tortor vitae neque consequat porta sit amet a libero. Aenean dignissim, massa a pellentesque ', 'pet1.png');

INSERT INTO `pets` (`id`, `name`, `score`, `description`, `imgname`) VALUES (NULL, 'Dollar', '2', 'Sed nec feugiat metus. Proin mattis pellentesque ante sed rutrum. Suspendisse id velit malesuada, rutrum lorem eget, scelerisque odio. Fusce tincidunt eget sapien ornare blandit. Curabitur facilisis erat nec purus tincidunt, quis lacinia odio mollis. Proin faucibus odio eget arcu tincidunt convallis. Nulla nisl ante, tincidunt elementum nisl quis, consequat placerat metus.', 'pet2.png');

DROP PROCEDURE getUsersTasksThisWeek

DELIMITER //
CREATE PROCEDURE `getUsersTasksThisWeek`(IN `userId` INT) # I changed this procedure and the whole code is new
NO SQL
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = userId and completed=0 and due_time > CURDATE() and due_time < CURDATE() + INTERVAL 7 DAY;
  END//

DROP PROCEDURE getUsersTasksFuture
/*muutsin protseduuri getUsersTasksFuture, siin on uus kood
*/
DELIMITER //
CREATE PROCEDURE `getUsersTasksFuture`(IN `userId` INT)
BEGIN
SELECT id, due_time, completed, user_id, content FROM tasks
WHERE user_id = userId and completed=0 and due_time > CURDATE() + INTERVAL 7 DAY;
END //

DELIMITER //
CREATE PROCEDURE `superUserTasks`()
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = 37 and completed=0;
  END //


DROP PROCEDURE getDoneTasks
/*modified getDoneTaks
*/
DELIMITER //
CREATE PROCEDURE `getDoneTasks`(IN `userId` INT)
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE (user_id = userId  OR user_id = 37) and completed=1
    LIMIT 7;
  END //

DROP PROCEDURE tasksOfUser


DELIMITER //
CREATE PROCEDURE `tasksOfUser` (IN `userId` INT)
  BEGIN
    SELECT COUNT(id) as `tasks` FROM tasks WHERE tasks.user_id = userId;
  END //

DELIMITER //
CREATE PROCEDURE `showPets`(
  IN `start` INT,
  IN `presented` INT)
  BEGIN
    SELECT * FROM pets  ORDER BY id ASC LIMIT start, presented;
  END//

DELIMITER //
CREATE PROCEDURE `deleteUser`(
  IN `userId` INT)
  BEGIN
    DELETE FROM users where id = userId;
    DELETE FROM tasks where user_id = userId;
  END //

DELIMITER //
CREATE PROCEDURE `insertIdUser` (IN `email` VARCHAR (100), IN `idCode` VARCHAR (11))
  BEGIN
    INSERT INTO users (email, idCode) VALUES (email, idCode);
  END //


/* Kõik users table read peale id peavad lubama null ja olema default väärtusena null  !!!! */

DELIMITER //
CREATE TABLE `user_pets` (
  `user_id` INT(10) UNSIGNED NOT NULL,
  `pet_id` INT(10) UNSIGNED NULL DEFAULT NULL
)
  COLLATE='utf8_estonian_ci'
  ENGINE=InnoDB;
//

DELIMITER //
CREATE PROCEDURE `insertPet`(IN `user_id` INT(10), IN `pet_id` INT(10))
NO SQL
  BEGIN
    INSERT INTO user_pets (user_id, pet_id) VALUES (user_id, pet_id);
  END //

DROP PROCEDURE IF EXISTS `changePassword`;


CREATE PROCEDURE `getUserPets`(
  IN `userId` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    SELECT pet_id FROM user_pets
    WHERE userId = user_id;
  END
//

DELIMITER //
CREATE  PROCEDURE `showUserPets`(
  IN `petId` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    SELECT name, score, description, imgname FROM pets
    WHERE petId = id;
  END
//


DELIMITER //
CREATE PROCEDURE `showUsersPets`(
  IN `userId` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    SELECT id, name, score, description, imgname, user_id, pet_id FROM pets, user_pets
    WHERE id=pet_id AND user_id = userId;
  END
//


DELIMITER //
CREATE PROCEDURE `changePassword`(
  IN `idIn` INT,
  IN `pass` VARCHAR(255)
)
LANGUAGE SQL
NOT DETERMINISTIC
NO SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    UPDATE users
    SET password_hash = pass
    WHERE id = idIn;
  END//

# 5. etapp --------------------------------------------------------------------
ALTER TABLE `users` ADD COLUMN `points` INT NULL AFTER `fb_id`;


CREATE PROCEDURE `getUserPoints`(IN `userId` INT)
  BEGIN
    SELECT points from users WHERE id = userId;
  END;


CREATE PROCEDURE `setUserPoints`(IN `userId` INT, IN `amount` INT)
BEGIN
  UPDATE users
  SET points = amount
  WHERE id = userId;
END;


ALTER TABLE `tasks` ADD COLUMN `repeat_interval` INT NULL AFTER `content`;


CREATE PROCEDURE `updateRepeatTasks`(IN `idIn` INT)
  BEGIN
    UPDATE tasks
    SET completed = 0, due_time = CURDATE()
    WHERE user_id = idIn AND CURDATE() != due_time AND (DATEDIFF(CURDATE(), due_time) % repeat_interval = 0);
  END;

#altered
CREATE PROCEDURE `getDoneTasks`(IN `userId` INT)
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE (user_id = userId  OR user_id = 37) and completed=1
    ORDER BY due_time DESC
    LIMIT 7;
  END;

#altered
CREATE PROCEDURE `getUndonePastTasks`(IN `userId` INT)
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM tasks
    WHERE user_id = userId and completed=0 and WEEK(due_time) < WEEK(CURDATE())
    ORDER BY due_time DESC
    LIMIT 7;
  END

#altered
    DELIMITER //
CREATE PROCEDURE `markTaskDone`(
  IN `idIN` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    UPDATE tasks
    SET completed = 1
    WHERE tasks.id = idIN;
  END //


DELIMITER //
CREATE PROCEDURE `deleteTask`(
  IN `idIN` INT,
  IN `userID` INT
)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    DELETE FROM tasks
    WHERE tasks.id = idIN AND tasks.user_id = userID;
  END //

#Altered code
DELIMITER //
CREATE PROCEDURE `insertTask`(
  IN `content` VARCHAR(255),
  IN `due_time` DATE,
  IN `user_id` INT(10),
  IN `repeat_interval` INT(11)

)
LANGUAGE SQL
NOT DETERMINISTIC
NO SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    INSERT INTO tasks (content, due_time, user_id, repeat_interval, completed) VALUES (content, due_time, user_id, repeat_interval, 0);
  END //

CREATE VIEW `taskdatetype` as
  SELECT id, if(
                 due_time=CURDATE(),'TODAY', if(
                     due_time > CURDATE() and due_time < CURDATE() + INTERVAL 7 DAY, 'WEEK', if(
                         due_time > CURDATE() + INTERVAL 7 DAY, 'LATER', 'OTHER'
                     )
                 )
             )
    as `time` from tasks;


CREATE VIEW `allUndonePastTasks` as
  SELECT id, due_time, completed, user_id, content FROM tasks
  WHERE completed=0 and due_time < CURDATE()
  ORDER BY due_time DESC;


#altered code
CREATE PROCEDURE `getUndonePastTasks`(
  IN `userId` INT

)
LANGUAGE SQL
NOT DETERMINISTIC
CONTAINS SQL
  SQL SECURITY DEFINER
  COMMENT ''
  BEGIN
    SELECT id, due_time, completed, user_id, content FROM allUndonePastTasks
    WHERE user_id = userId
    LIMIT 7;
END;

CREATE PROCEDURE `getTask`(IN `idIN` INT)
  BEGIN
    SELECT id, due_time, completed, user_id, content, repeat_interval FROM tasks WHERE id = idIN;
  END;

#6.etapp --------------------------------------------------------------------------------------------------

ALTER TABLE `users` ADD `main_pet` INT(10) NULL DEFAULT NULL AFTER `points`;

#--

CREATE PROCEDURE `setMainPet`(
  IN `pet_id` INT(10),
  IN `userId` INT(10)
)
LANGUAGE SQL
NOT DETERMINISTIC
NO SQL
  SQL SECURITY DEFINER
  BEGIN
    UPDATE users
    SET main_pet = pet_id
    WHERE id = userId;
  END

#--
    CREATE PROCEDURE `getMainPet2`(
    IN `user_id` INT(10)
    )
    LANGUAGE SQL
    NOT DETERMINISTIC
    NO SQL
    SQL SECURITY DEFINER
BEGIN
SELECT pets.id, pets.name, pets.description, pets.imgname, users.id, users.main_pet FROM pets, users
WHERE user_id = users.id AND pets.id = users.main_pet;
END


#7. etapp-----------------------------------------------------------------------------------------------------

#Altered code
CREATE PROCEDURE `deleteUser` (IN `userId` INT)
BEGIN
DELETE FROM users where id = userId;
DELETE FROM tasks where user_id = userId;
DELETE FROM user_pets WHERE user_id = userId;
END


# SEDA EI PEA ENDAL JOOKSUTAMA --------------------------------------------------------------------

INSERT INTO user_pets (user_id, pet_id)
SELECT users.id, users.main_pet
FROM `users` LEFT JOIN user_pets ON users.id = user_pets.user_id and users.main_pet = user_pets.pet_id
WHERE user_pets.user_id IS NULL


SELECT user_pets.user_id
FROM user_pets
  LEFT JOIN users
    ON user_pets.user_id = users.id
WHERE users.id IS NULL

DELETE FROM user_pets WHERE user_id IN (64, 67, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92, 93, 94, 95, 96, 97, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, )


# LÕppes see mis jooksutama ei pea -------------------------------------------------------
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


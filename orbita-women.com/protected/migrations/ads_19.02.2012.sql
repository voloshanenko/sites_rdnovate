ALTER TABLE `ads`
	ADD COLUMN `contact_person` VARCHAR(120) NULL AFTER `city`;

ALTER TABLE `users`
	ADD COLUMN `contacts` TEXT NULL DEFAULT NULL AFTER `occupation`;
	
ALTER TABLE `ads`
	ADD COLUMN `suburb` VARCHAR(120) NULL AFTER `city`,
	ADD COLUMN `street` VARCHAR(200) NULL AFTER `suburb`;

ALTER TABLE `ads`
	CHANGE COLUMN `address` `city` VARCHAR(150) NULL AFTER `contact_person`;
	
ALTER TABLE `ads`
	CHANGE COLUMN `ad_text` `ad_text` TEXT NULL DEFAULT NULL AFTER `title`;
	
ALTER TABLE `ads`
	ADD COLUMN `gender` ENUM('he','she','both') NULL AFTER `street`,
	ADD COLUMN `breed` VARCHAR(60) NULL AFTER `gender`;
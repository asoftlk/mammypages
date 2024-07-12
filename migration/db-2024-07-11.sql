ALTER TABLE `hospital` 
ADD COLUMN `youtube` TEXT NULL AFTER `linkedin`,
ADD COLUMN `services` TEXT NULL AFTER `about`,
CHANGE COLUMN `facebook` `facebook` TEXT NULL ,
CHANGE COLUMN `instagram` `instagram` TEXT NULL ,
CHANGE COLUMN `linkedin` `linkedin` TEXT NULL ;

ALTER TABLE `studio` 
ADD COLUMN `registraion_no` VARCHAR(45) NOT NULL AFTER `studio_id`,
ADD COLUMN `establishment` INT(4) NULL AFTER `address`,
ADD COLUMN `contact_person` VARCHAR(45) NOT NULL AFTER `establishment`,
ADD COLUMN `youtube` TEXT NULL AFTER `linkedin`,
ADD COLUMN `services` TEXT NULL AFTER `about`;

-- akila is here

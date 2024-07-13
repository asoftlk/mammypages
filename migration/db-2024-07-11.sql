ALTER TABLE `hospital` 
ADD COLUMN `youtube` TEXT NULL AFTER `linkedin`,
ADD COLUMN `services` TEXT NULL AFTER `about`,
CHANGE COLUMN `facebook` `facebook` TEXT NULL ,
CHANGE COLUMN `instagram` `instagram` TEXT NULL ,
CHANGE COLUMN `linkedin` `linkedin` TEXT NULL ;

ALTER TABLE `doctor` 
CHANGE COLUMN `type` `visit_hospital` VARCHAR(300) CHARACTER SET 'utf8' NOT NULL ;

ALTER TABLE `doctor_working_times` 
DROP COLUMN `doctor_type`,
ADD COLUMN `doctor_working_timescol` VARCHAR(45) NULL AFTER `sunday_close`;

ALTER TABLE `studio` 
ADD COLUMN `registraion_no` VARCHAR(45) NOT NULL AFTER `studio_id`,
ADD COLUMN `establishment` INT(4) NULL AFTER `address`,
ADD COLUMN `contact_person` VARCHAR(45) NOT NULL AFTER `establishment`,
ADD COLUMN `youtube` TEXT NULL AFTER `linkedin`,
ADD COLUMN `services` TEXT NULL AFTER `about`,
ADD COLUMN `profile_pic` TEXT NOT NULL AFTER `contact_person`,
ADD COLUMN `cover_pic` TEXT NULL AFTER `profile_pic`;


ALTER TABLE `studio` 
DROP COLUMN `type`;

-- akila is here

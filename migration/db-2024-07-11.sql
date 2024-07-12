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

ALTER TABLE `doctor` 
CHANGE COLUMN `type` `visit_hospital` VARCHAR(300) CHARACTER SET 'utf8' NOT NULL ;

ALTER TABLE `doctor_working_times` 
DROP COLUMN `doctor_type`,
ADD COLUMN `doctor_working_timescol` VARCHAR(45) NULL AFTER `sunday_close`;



-- akila is here

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

ALTER TABLE `saloon` 
DROP COLUMN `working_hours`,
DROP COLUMN `subtype`,
DROP COLUMN `type`,
DROP COLUMN `status`,
ADD COLUMN `registraion_no` TEXT NOT NULL AFTER `saloon_id`,
ADD COLUMN `establishment` INT(4) NOT NULL AFTER `address`,
ADD COLUMN `contact_person` TEXT NOT NULL AFTER `establishment`,
ADD COLUMN `profile_pic` TEXT NOT NULL AFTER `contact_person`,
ADD COLUMN `cover_pic` TEXT NULL AFTER `profile_pic`,
ADD COLUMN `qualification` TEXT NULL AFTER `cover_pic`,
ADD COLUMN `youtube` TEXT NULL AFTER `linkedin`,
ADD COLUMN `services` TEXT NULL AFTER `about`,
ADD COLUMN `certificate` TEXT NULL AFTER `speciality`;

ALTER TABLE `saloon` 
CHANGE COLUMN `id` `id` INT(11) NOT NULL AUTO_INCREMENT ;


DROP TABLE `medical_branch`;
ALTER TABLE `medical` 
CHANGE COLUMN `type` `established` VARCHAR(300) NOT NULL ,
CHANGE COLUMN `subtype` `service` TEXT NULL DEFAULT NULL ;

ALTER TABLE `medical_working_times` 
DROP COLUMN `medical_type`;

ALTER TABLE `medical` 
ADD COLUMN `doctor_id` INT NULL AFTER `name`;

ALTER TABLE `pharmacy` 
DROP COLUMN `type`,
ADD COLUMN `established` VARCHAR(45) NULL AFTER `email`,
ADD COLUMN `youtube` TEXT NULL AFTER `linkedin`,
CHANGE COLUMN `speciality` `service` TEXT NULL DEFAULT NULL AFTER `priority`,
CHANGE COLUMN `subtype` `certificate` VARCHAR(300) NULL DEFAULT NULL ;

DROP TABLE `pharmacy_speciality`;
DROP TABLE `pharmacy_branch`;

ALTER TABLE `pharmacy_working_times` 
DROP COLUMN `pharmacy_type`;

ALTER TABLE `doctor` 
ADD COLUMN `whatsapp` TEXT NULL AFTER `linkedin`;
-- akila is here
-- thushitha

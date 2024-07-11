ALTER TABLE `mammypages`.`hospital` 
ADD COLUMN `youtube` TEXT NULL AFTER `linkedin`,
ADD COLUMN `services` TEXT NULL AFTER `about`,
CHANGE COLUMN `facebook` `facebook` TEXT NULL ,
CHANGE COLUMN `instagram` `instagram` TEXT NULL ,
CHANGE COLUMN `linkedin` `linkedin` TEXT NULL ;


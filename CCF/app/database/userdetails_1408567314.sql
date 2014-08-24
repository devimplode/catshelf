# ---> up

ALTER TABLE `auth_users`
ADD COLUMN `name`  varchar(255) NOT NULL AFTER `group_id`,
ADD COLUMN `displayname`  varchar(255) NOT NULL AFTER `name`,
ADD COLUMN `gender`  varchar(255) NOT NULL DEFAULT '' AFTER `modified_at`,
ADD COLUMN `gender_base`  tinyint(1) NULL AFTER `gender`,
ADD COLUMN `salutation`  varchar(255) NOT NULL DEFAULT '' AFTER `gender_base`,
ADD COLUMN `firstname`  varchar(255) NOT NULL DEFAULT '' AFTER `salutation`,
ADD COLUMN `middlename`  varchar(255) NOT NULL DEFAULT '' AFTER `firstname`,
ADD COLUMN `lastname`  varchar(255) NOT NULL DEFAULT '' AFTER `middlename`,
ADD INDEX (`name`) ;

# ---> down

ALTER TABLE `auth_users`
DROP COLUMN `name`,
DROP COLUMN `displayname`,
DROP COLUMN `gender`,
DROP COLUMN `gender_base`,
DROP COLUMN `salutation`,
DROP COLUMN `firstname`,
DROP COLUMN `middlename`,
DROP COLUMN `lastname`,
DROP INDEX `name` ;
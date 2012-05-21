
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(255) NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`user_id` INTEGER NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `category_FI_1` (`user_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- post
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `post`;

CREATE TABLE `post`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL,
	`user_id` INTEGER NOT NULL,
	`category_id` INTEGER NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `post_FI_1` (`user_id`),
	INDEX `post_FI_2` (`category_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- action
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `action`;

CREATE TABLE `action`
(
	`id` INTEGER NOT NULL AUTO_INCREMENT,
	`actor_id` INTEGER NOT NULL,
	`actor_type` VARCHAR(255) NOT NULL,
	`actor_name` VARCHAR(255) NOT NULL,
	`actor_url` VARCHAR(255) NOT NULL,
	`actor_image` VARCHAR(255) NOT NULL,
	`verb` VARCHAR(255) NOT NULL,
	`object_id` INTEGER,
	`object_type` VARCHAR(255),
	`object_name` VARCHAR(255),
	`object_url` VARCHAR(255),
	`object_image` VARCHAR(255),
	`target_id` INTEGER,
	`target_type` VARCHAR(255),
	`target_name` VARCHAR(255),
	`target_url` VARCHAR(255),
	`target_image` VARCHAR(255),
	`published_at` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;

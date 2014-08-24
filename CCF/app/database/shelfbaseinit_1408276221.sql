# ---> up

CREATE TABLE IF NOT EXISTS `shelf_base` (
	`id`			int(11) NOT NULL AUTO_INCREMENT,
	`type`			enum('conversation','chat','poll','file','file_music','file_image','file_video') NULL,
	`title`			varchar(255) NOT NULL,
	`description`	text NOT NULL,
	`created_by`	int(11) NOT NULL,
	`created_at`	int(11) NOT NULL,
	`modified_by`	int(11) NOT NULL,
	`modified_at`	int(11) NOT NULL,
	`contributors`	text NOT NULL,
	`locked`		tinyint(1) NOT NULL DEFAULT 0,
	`deleted`		tinyint(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

# ---> down

DROP table `shelf_base`;

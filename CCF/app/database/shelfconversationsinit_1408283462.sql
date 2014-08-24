# ---> up

CREATE TABLE IF NOT EXISTS `shelf_conversations` (
	`id`			int(11) NOT NULL AUTO_INCREMENT,
	`shelf_id`		int(11) NOT NULL,
	`text`			text NOT NULL,
	`created_by`	int(11) NOT NULL,
	`created_at`	int(11) NOT NULL,
	`modified_by`	int(11) NOT NULL,
	`modified_at`	int(11) NOT NULL,
	`locked`		tinyint(1) NOT NULL DEFAULT 0,
	`deleted`		tinyint(1) NOT NULL DEFAULT 0,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

# ---> down

DROP table `shelf_conversations`;

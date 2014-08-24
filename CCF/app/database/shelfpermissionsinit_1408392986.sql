# ---> up

CREATE TABLE IF NOT EXISTS `shelf_permissions` (
	`shelf_id`		int(11) NOT NULL,
	`user_id`		int(11) NOT NULL,
	PRIMARY KEY (`shelf_id`, `user_id`)
) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

# ---> down

DROP table `shelf_permissions`;

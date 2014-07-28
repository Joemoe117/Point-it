CREATE TABLE `profils` (
	`profil_id` INT AUTO_INCREMENT PRIMARY KEY,
	`profil_nom` VARCHAR(30) NOT NULL UNIQUE,
	`profil_pass` VARCHAR(20) NOT NULL,
	`profil_image` VARCHAR(255)
) ENGINE = InnoDB;

CREATE TABLE `types_point` (
	`typept_id` INT PRIMARY KEY,
	`typept_nom` VARCHAR(30) NOT NULL,
	`typept_description` TEXT NOT NULL,
	`typept_image` VARCHAR(255),
	`typept_success` VARCHAR(255)
) ENGINE = InnoDB;

CREATE TABLE `points`(
	`point_id` INT AUTO_INCREMENT PRIMARY KEY,
	`typept_id` INT NOT NULL,
	`profil_id_donne` INT NOT NULL,
	`point_description` TEXT NOT NULL,
	`point_epique` BOOLEAN NOT NULL,
	`point_date_crea` TIMESTAMP NOT NULL,
	`point_date_evenement` TIMESTAMP,
	FOREIGN KEY (`typept_id`) REFERENCES `types_point`(`typept_id`),
	FOREIGN KEY (`profil_id_donne`) REFERENCES `profils`(`profil_id`)
) ENGINE = InnoDB;

CREATE TABLE `recoit`(
	`point_id` INT,
	`profil_id` INT,
	PRIMARY KEY (`point_id`, `profil_id`),
	FOREIGN KEY (`point_id`) REFERENCES `points`(`point_id`),
	FOREIGN KEY (`profil_id`) REFERENCES `profils`(`profil_id`)
) ENGINE = InnoDB;

CREATE TABLE `commentaires` (
	`com_id` INT AUTO_INCREMENT PRIMARY KEY,
	`point_id` INT NOT NULL,
	`profil_id` INT NOT NULL,
	`com_texte` TEXT NOT NULL,
	`com_date` TIMESTAMP NOT NULL,
	FOREIGN KEY (`point_id`) REFERENCES `points`(`point_id`),
	FOREIGN KEY (`profil_id`) REFERENCES `profils`(`profil_id`)
) ENGINE = InnoDB;

CREATE VIEW `liste_points` AS
	SELECT `profil_id`, `point_id`, `typept_id`
	FROM `recoit`
	NATURAL JOIN `profils`
	NATURAL JOIN `points`
	NATURAL JOIN `types_point`
	ORDER BY `profil_id`;
	
CREATE TABLE `Profils` (
	`profil_id` INT AUTO_INCREMENT PRIMARY KEY,
	`profil_nom` VARCHAR(30) NOT NULL,
	`profil_pass` VARCHAR(20) NOT NULL,
	`profil_image` VARCHAR(255)
) ENGINE = InnoDB;

CREATE TABLE `Types_Point` (
	`typept_nom` VARCHAR(30) NOT NULL PRIMARY KEY,
	`typept_description` TEXT NOT NULL,
	`typept_image` VARCHAR(255)
) ENGINE = InnoDB;

CREATE TABLE `Points`(
	`point_id` INT AUTO_INCREMENT PRIMARY KEY,
	`typept_nom` VARCHAR(30) NOT NULL,
	`profil_id_donne` INT NOT NULL,
	`point_description` TEXT NOT NULL,
	`point_date_crea` TIMESTAMP NOT NULL,
	`point_date_evenement` TIMESTAMP,
	FOREIGN KEY (`typept_nom`) REFERENCES `Types_Point`(`typept_nom`),
	FOREIGN KEY (`profil_id_donne`) REFERENCES `Profils`(`profil_id`)
) ENGINE = InnoDB;

CREATE TABLE `Recoit`(
	`point_id` INT,
	`profil_id` INT,
	PRIMARY KEY (`point_id`, `profil_id`),
	FOREIGN KEY (`point_id`) REFERENCES `Points`(`point_id`),
	FOREIGN KEY (`profil_id`) REFERENCES `Profils`(`profil_id`)
) ENGINE = InnoDB;

CREATE TABLE `Commentaires` (
	`com_id` INT AUTO_INCREMENT PRIMARY KEY,
	`point_id` INT NOT NULL,
	`profil_id` INT NOT NULL,
	`com_texte` TEXT NOT NULL,
	`com_date` TIMESTAMP NOT NULL,
	FOREIGN KEY (`point_id`) REFERENCES `Points`(`point_id`),
	FOREIGN KEY (`profil_id`) REFERENCES `Profils`(`profil_id`)
) ENGINE = InnoDB;
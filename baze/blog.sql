-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `pass` VARCHAR(60) NOT NULL,
  `admin` VARCHAR(45) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_users`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `posts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `posts` (
  `id_posts` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `content` TEXT NOT NULL,
  `date_added` DATETIME NOT NULL,
  `id_users` INT NOT NULL,
  PRIMARY KEY (`id_posts`),
  FOREIGN KEY (`id_users`) REFERENCES `users`(`id_users`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comments` INT NOT NULL AUTO_INCREMENT,
  `comment` VARCHAR(120) NOT NULL,
  `date_added` DATETIME NOT NULL,
  `id_posts` INT NOT NULL,
  `id_users` INT NOT NULL,
  PRIMARY KEY (`id_comments`),
  FOREIGN KEY (`id_posts`) REFERENCES `posts`(`id_posts`),
  FOREIGN KEY (`id_users`) REFERENCES `users`(`id_users`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

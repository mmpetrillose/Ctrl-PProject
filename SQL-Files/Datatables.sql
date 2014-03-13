SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

USE `ctrlp` ;

-- -----------------------------------------------------
-- Table `ctrlp`.`UserColors`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`UserColors` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`UserColors` (
  `idUserColors` INT NOT NULL,
  `Color` VARCHAR(6) NOT NULL,
  PRIMARY KEY (`idUserColors`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ctrlp`.`Users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`Users` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`Users` (
  `idUsers` INT NOT NULL AUTO_INCREMENT,
  `UserColors_idUserColors` INT NOT NULL,
  `user_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `pass_hash` VARCHAR(128) NOT NULL,
  `pass_salt` VARCHAR(64) NOT NULL,
  `last_login` DATETIME NULL DEFAULT NULL,
  `user_online` TINYINT(1) NOT NULL DEFAULT False,
  `public_summary` TEXT NULL,
  `collab_summary` TEXT NULL,
  `avatar_location` VARCHAR(255) NULL,
  PRIMARY KEY (`idUsers`),
  CONSTRAINT `fk_Users_UserColors1`
    FOREIGN KEY (`UserColors_idUserColors`)
    REFERENCES `ctrlp`.`UserColors` (`idUserColors`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `user_name_UNIQUE` ON `ctrlp`.`Users` (`user_name` ASC);

CREATE UNIQUE INDEX `email_UNIQUE` ON `ctrlp`.`Users` (`email` ASC);

CREATE INDEX `fk_Users_UserColors1_idx` ON `ctrlp`.`Users` (`UserColors_idUserColors` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`ModelCategories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`ModelCategories` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`ModelCategories` (
  `idModelCategories` INT NOT NULL,
  `category_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idModelCategories`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ctrlp`.`Models`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`Models` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`Models` (
  `idModels` INT NOT NULL AUTO_INCREMENT,
  `Users_idUsers` INT NOT NULL,
  `ModelCategories_idModelCategories` INT NOT NULL,
  `model_title` VARCHAR(255) NOT NULL,
  `rep_pos` INT NOT NULL DEFAULT 0,
  `rep_neg` INT NOT NULL DEFAULT 0,
  `private_restrict` TINYINT(1) NOT NULL DEFAULT '0',
  `follower_restrict` TINYINT(1) NOT NULL DEFAULT '0',
  `upload_date` DATETIME NOT NULL,
  `model_description` TEXT NOT NULL,
  `download_count` INT NOT NULL DEFAULT 0,
  `model_views` INT NOT NULL,
  PRIMARY KEY (`idModels`),
  CONSTRAINT `fk_Models_Users`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Models_ModelCategories1`
    FOREIGN KEY (`ModelCategories_idModelCategories`)
    REFERENCES `ctrlp`.`ModelCategories` (`idModelCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Models_Users_idx` ON `ctrlp`.`Models` (`Users_idUsers` ASC);

CREATE INDEX `fk_Models_ModelCategories1_idx` ON `ctrlp`.`Models` (`ModelCategories_idModelCategories` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`CollaboratorChat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`CollaboratorChat` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`CollaboratorChat` (
  `idCollaboratorChat` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `message` VARCHAR(256) NOT NULL,
  `post_time` DATETIME NOT NULL,
  PRIMARY KEY (`idCollaboratorChat`),
  CONSTRAINT `fk_CollaberatorChat_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_CollaberatorChat_Users1_idx` ON `ctrlp`.`CollaboratorChat` (`Users_idUsers` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`Collaborators`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`Collaborators` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`Collaborators` (
  `idCollaborators` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `collab_id` INT NOT NULL,
  PRIMARY KEY (`idCollaborators`),
  CONSTRAINT `fk_Collaberators_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Collaberators_Users1_idx` ON `ctrlp`.`Collaborators` (`Users_idUsers` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`Downloads`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`Downloads` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`Downloads` (
  `idDownloads` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `Models_idModels` INT NOT NULL,
  `download_date` DATETIME NOT NULL,
  PRIMARY KEY (`idDownloads`),
  CONSTRAINT `fk_Downloads_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Downloads_Models1`
    FOREIGN KEY (`Models_idModels`)
    REFERENCES `ctrlp`.`Models` (`idModels`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Downloads_Users1_idx` ON `ctrlp`.`Downloads` (`Users_idUsers` ASC);

CREATE INDEX `fk_Downloads_Models1_idx` ON `ctrlp`.`Downloads` (`Models_idModels` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`TutorialCategories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`TutorialCategories` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`TutorialCategories` (
  `idTutorialCategories` INT NOT NULL,
  `category_title` VARCHAR(45) NOT NULL DEFAULT '3D Printing',
  PRIMARY KEY (`idTutorialCategories`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ctrlp`.`Tutorials`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`Tutorials` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`Tutorials` (
  `idTutorials` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `TutorialCategories_idTutorialCategories` INT NOT NULL,
  `title` VARCHAR(80) NOT NULL,
  `num_steps` INT NOT NULL,
  `post_time` DATETIME NOT NULL,
  `rep_pos` INT NOT NULL DEFAULT 0,
  `rep_neg` INT NOT NULL DEFAULT 0,
  `tutorial_views` INT NOT NULL,
  PRIMARY KEY (`idTutorials`),
  CONSTRAINT `fk_Tutorial_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Tutorials_TutorialCategories1`
    FOREIGN KEY (`TutorialCategories_idTutorialCategories`)
    REFERENCES `ctrlp`.`TutorialCategories` (`idTutorialCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Tutorial_Users1_idx` ON `ctrlp`.`Tutorials` (`Users_idUsers` ASC);

CREATE INDEX `fk_Tutorials_TutorialCategories1_idx` ON `ctrlp`.`Tutorials` (`TutorialCategories_idTutorialCategories` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`TutorialEdits`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`TutorialEdits` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`TutorialEdits` (
  `idEdits` INT NOT NULL,
  `Tutorial_idTutorial` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `edit_time` DATETIME NOT NULL,
  PRIMARY KEY (`idEdits`),
  CONSTRAINT `fk_Edits_Tutorial1`
    FOREIGN KEY (`Tutorial_idTutorial`)
    REFERENCES `ctrlp`.`Tutorials` (`idTutorials`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Edits_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Edits_Tutorial1_idx` ON `ctrlp`.`TutorialEdits` (`Tutorial_idTutorial` ASC);

CREATE INDEX `fk_Edits_Users1_idx` ON `ctrlp`.`TutorialEdits` (`Users_idUsers` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`Step`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`Step` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`Step` (
  `idSteps` INT NOT NULL,
  `Tutorials_idTutorials` INT NOT NULL,
  `step_num` INT NOT NULL DEFAULT '1',
  `step_title` VARCHAR(80) NOT NULL,
  `step_text` TEXT NOT NULL,
  PRIMARY KEY (`idSteps`),
  CONSTRAINT `fk_Steps_Tutorials1`
    FOREIGN KEY (`Tutorials_idTutorials`)
    REFERENCES `ctrlp`.`Tutorials` (`idTutorials`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Steps_Tutorials1_idx` ON `ctrlp`.`Step` (`Tutorials_idTutorials` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`StepPhotos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`StepPhotos` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`StepPhotos` (
  `idStepPhotos` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `Step_idSteps` INT NOT NULL,
  `photo_location` VARCHAR(255) NOT NULL,
  `photo_title` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idStepPhotos`),
  CONSTRAINT `fk_StepPhotos_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_StepPhotos_Step1`
    FOREIGN KEY (`Step_idSteps`)
    REFERENCES `ctrlp`.`Step` (`idSteps`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_StepPhotos_Users1_idx` ON `ctrlp`.`StepPhotos` (`Users_idUsers` ASC);

CREATE INDEX `fk_StepPhotos_Step1_idx` ON `ctrlp`.`StepPhotos` (`Step_idSteps` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`TutorialMedia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`TutorialMedia` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`TutorialMedia` (
  `idTutorialMedia` INT NOT NULL,
  `Tutorials_idTutorials` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `media_title` VARCHAR(100) NOT NULL,
  `media_location` VARCHAR(256) NOT NULL,
  `photo` TINYINT(1) NOT NULL,
  PRIMARY KEY (`idTutorialMedia`),
  CONSTRAINT `fk_TutorialMedia_Tutorials1`
    FOREIGN KEY (`Tutorials_idTutorials`)
    REFERENCES `ctrlp`.`Tutorials` (`idTutorials`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_TutorialMedia_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_TutorialMedia_Tutorials1_idx` ON `ctrlp`.`TutorialMedia` (`Tutorials_idTutorials` ASC);

CREATE INDEX `fk_TutorialMedia_Users1_idx` ON `ctrlp`.`TutorialMedia` (`Users_idUsers` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`ModelSTLs`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`ModelSTLs` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`ModelSTLs` (
  `idModelSTLs` INT NOT NULL,
  `Models_idModels` INT NOT NULL,
  `file_location` VARCHAR(255) NOT NULL,
  `file_title` VARCHAR(255) NOT NULL,
  `file_size` VARCHAR(45) NOT NULL,
  `upload_date` DATETIME NOT NULL,
  `upload_size` VARCHAR(45) NOT NULL,
  `estimated_print_time` VARCHAR(45) NOT NULL DEFAULT 0,
  `model_comments` VARCHAR(511) NOT NULL,
  PRIMARY KEY (`idModelSTLs`),
  CONSTRAINT `fk_ModelSTLs_Models1`
    FOREIGN KEY (`Models_idModels`)
    REFERENCES `ctrlp`.`Models` (`idModels`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ModelSTLs_Models1_idx` ON `ctrlp`.`ModelSTLs` (`Models_idModels` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`ModelPictures`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`ModelPictures` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`ModelPictures` (
  `idModelPictures` INT NOT NULL,
  `Models_idModels` INT NOT NULL,
  `picture_location` VARCHAR(255) NOT NULL,
  `picture_title` VARCHAR(255) NOT NULL,
  `picture_comment` VARCHAR(511) NOT NULL,
  `upload_date` DATETIME NOT NULL,
  PRIMARY KEY (`idModelPictures`),
  CONSTRAINT `fk_ModelPictures_Models1`
    FOREIGN KEY (`Models_idModels`)
    REFERENCES `ctrlp`.`Models` (`idModels`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ModelPictures_Models1_idx` ON `ctrlp`.`ModelPictures` (`Models_idModels` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`ServiceCategories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`ServiceCategories` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`ServiceCategories` (
  `idServiceCategories` INT NOT NULL,
  `category_title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idServiceCategories`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ctrlp`.`Services`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`Services` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`Services` (
  `idServices` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `ServiceCategories_idServiceCategories` INT NOT NULL,
  `service_title` VARCHAR(255) NOT NULL,
  `service_comment` VARCHAR(511) NOT NULL,
  `post_date` DATETIME NOT NULL,
  PRIMARY KEY (`idServices`),
  CONSTRAINT `fk_Services_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Services_ServiceCategories1`
    FOREIGN KEY (`ServiceCategories_idServiceCategories`)
    REFERENCES `ctrlp`.`ServiceCategories` (`idServiceCategories`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_Services_Users1_idx` ON `ctrlp`.`Services` (`Users_idUsers` ASC);

CREATE INDEX `fk_Services_ServiceCategories1_idx` ON `ctrlp`.`Services` (`ServiceCategories_idServiceCategories` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`ContactInfo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`ContactInfo` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`ContactInfo` (
  `idContactInfo` INT NOT NULL,
  `Services_idServices` INT NOT NULL,
  `alternate_email` VARCHAR(255) NULL,
  `address` VARCHAR(511) NULL,
  `phone` VARCHAR(45) NULL,
  PRIMARY KEY (`idContactInfo`),
  CONSTRAINT `fk_ContactInfo_Services1`
    FOREIGN KEY (`Services_idServices`)
    REFERENCES `ctrlp`.`Services` (`idServices`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `alternate_email_UNIQUE` ON `ctrlp`.`ContactInfo` (`alternate_email` ASC);

CREATE UNIQUE INDEX `phone_UNIQUE` ON `ctrlp`.`ContactInfo` (`phone` ASC);

CREATE INDEX `fk_ContactInfo_Services1_idx` ON `ctrlp`.`ContactInfo` (`Services_idServices` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`ServicePhotos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`ServicePhotos` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`ServicePhotos` (
  `idServicePhotos` INT NOT NULL,
  `Services_idServices` INT NOT NULL,
  `picture_title` VARCHAR(255) NOT NULL,
  `picture_location` VARCHAR(255) NOT NULL,
  `picture_comment` VARCHAR(255) NOT NULL,
  `upload_date` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idServicePhotos`),
  CONSTRAINT `fk_ServicePhotos_Services1`
    FOREIGN KEY (`Services_idServices`)
    REFERENCES `ctrlp`.`Services` (`idServices`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_ServicePhotos_Services1_idx` ON `ctrlp`.`ServicePhotos` (`Services_idServices` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`StepEdits`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`StepEdits` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`StepEdits` (
  `idStepEdits` INT NOT NULL,
  `Step_idSteps` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `edit_time` DATETIME NOT NULL,
  PRIMARY KEY (`idStepEdits`),
  CONSTRAINT `fk_StepEdits_Step1`
    FOREIGN KEY (`Step_idSteps`)
    REFERENCES `ctrlp`.`Step` (`idSteps`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_StepEdits_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_StepEdits_Step1_idx` ON `ctrlp`.`StepEdits` (`Step_idSteps` ASC);

CREATE INDEX `fk_StepEdits_Users1_idx` ON `ctrlp`.`StepEdits` (`Users_idUsers` ASC);


-- -----------------------------------------------------
-- Table `ctrlp`.`TutorialLink`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ctrlp`.`TutorialLink` ;

CREATE TABLE IF NOT EXISTS `ctrlp`.`TutorialLink` (
  `idTutorialLink` INT NOT NULL,
  `Users_idUsers` INT NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `summary` VARCHAR(511) NOT NULL,
  `post_date` DATETIME NOT NULL,
  `link` VARCHAR(511) NOT NULL,
  PRIMARY KEY (`idTutorialLink`),
  CONSTRAINT `fk_TutorialLink_Users1`
    FOREIGN KEY (`Users_idUsers`)
    REFERENCES `ctrlp`.`Users` (`idUsers`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_TutorialLink_Users1_idx` ON `ctrlp`.`TutorialLink` (`Users_idUsers` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

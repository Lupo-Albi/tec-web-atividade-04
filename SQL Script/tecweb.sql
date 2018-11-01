-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tecweb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tecweb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `tecweb` DEFAULT CHARACTER SET utf8 ;
USE `tecweb` ;

-- -----------------------------------------------------
-- Table `tecweb`.`contato`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecweb`.`contato` ;

CREATE TABLE IF NOT EXISTS `tecweb`.`contato` (
  `idContato` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(20) NOT NULL,
  `Sobrenome` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`idContato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tecweb`.`membro`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecweb`.`membro` ;

CREATE TABLE IF NOT EXISTS `tecweb`.`membro` (
  `idMembro` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(20) NOT NULL,
  `Sobrenome` VARCHAR(50) NOT NULL,
  `Email` VARCHAR(50) NOT NULL,
  `Telefone` VARCHAR(15) NULL DEFAULT NULL,
  `DataNascimento` DATE NULL DEFAULT NULL,
  `Bio` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`idMembro`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tecweb`.`mensagem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecweb`.`mensagem` ;

CREATE TABLE IF NOT EXISTS `tecweb`.`mensagem` (
  `idMensagem` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Conteudo` VARCHAR(500) NOT NULL,
  `Data` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `Contato_idContato` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idMensagem`),
  INDEX `fk_Mensagem_Contato1_idx` (`Contato_idContato` ASC) VISIBLE,
  CONSTRAINT `fk_Mensagem_Contato1`
    FOREIGN KEY (`Contato_idContato`)
    REFERENCES `tecweb`.`contato` (`idContato`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `tecweb`.`membro_has_mensagem`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tecweb`.`membro_has_mensagem` ;

CREATE TABLE IF NOT EXISTS `tecweb`.`membro_has_mensagem` (
  `Membro_idMembro` INT(10) UNSIGNED NOT NULL,
  `Mensagem_idMensagem` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`Membro_idMembro`, `Mensagem_idMensagem`),
  INDEX `fk_Membro_has_Mensagem_Mensagem1_idx` (`Mensagem_idMensagem` ASC) VISIBLE,
  INDEX `fk_Membro_has_Mensagem_Membro1_idx` (`Membro_idMembro` ASC) VISIBLE,
  CONSTRAINT `fk_Membro_has_Mensagem_Membro1`
    FOREIGN KEY (`Membro_idMembro`)
    REFERENCES `tecweb`.`membro` (`idMembro`),
  CONSTRAINT `fk_Membro_has_Mensagem_Mensagem1`
    FOREIGN KEY (`Mensagem_idMensagem`)
    REFERENCES `tecweb`.`mensagem` (`idMensagem`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

-- -----------------------------------------------------
-- Data for table `tecweb`.`Membro`
-- -----------------------------------------------------
USE `tecweb`;

INSERT INTO `tecweb`.`Membro` (Nome, Sobrenome, Email, Telefone, DataNascimento, Bio)
VALUES ('Luanderson', 'Martins de Albuquerque', 'luanderson-albuquerque@hotmail.com', '88996354532', '1997-05-07',
' '
);
INSERT INTO `tecweb`.`Membro` (Nome, Sobrenome, Email, Telefone, DataNascimento, Bio)
VALUES ('Amanda', 'Lima Sousa', 'just.amaanda@gmail.com', '8894602740', '1994-01-01',
' '
);
INSERT INTO `tecweb`.`Membro` (Nome, Sobrenome, Email, Telefone, DataNascimento, Bio)
VALUES ('Igor', 'Felicio Linhares', 'frigfeli@gmail.com', '8899936384', '1994-01-01',
' '
);
INSERT INTO `tecweb`.`Membro` (Nome, Sobrenome, Email, Telefone, DataNascimento, Bio)
VALUES ('Julio', 'Cesar Rodrigues de Oliveira', 'jc_r96@hotmail.com', '8897664863', '1994-01-01',
' '
);
INSERT INTO `tecweb`.`Membro` (Nome, Sobrenome, Email, Telefone, DataNascimento, Bio)
VALUES ('Rayon', 'Lindraz Nunes', 'rayonnunes@hotmail.com', '8597488646', '1994-01-01',
' '
);
INSERT INTO `tecweb`.`Membro` (Nome, Sobrenome, Email, Telefone, DataNascimento, Bio)
VALUES ('Ricardo', 'de Souza Silva', 'ricardosouza@alu.ufc.br', '8897354640', '1994-01-01',
' '
);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
CREATE SCHEMA `taskmng` DEFAULT CHARACTER SET utf8 ;
USE `taskmng` ;

CREATE TABLE `taskmng`.`tbl_projetos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `taskmng`.`tbl_atividades` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `finalizada` TINYINT NOT NULL,
  `tbl_projetos_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tbl_atividades_tbl_projetos_idx` (`tbl_projetos_id` ASC),
  CONSTRAINT `fk_tbl_atividades_tbl_projetos`
  FOREIGN KEY (`tbl_projetos_id`)
  REFERENCES `taskmng`.`tbl_projetos` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION);

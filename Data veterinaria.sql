CREATE DATABASE Stock;
/*Tablas con datos de referencia de dependecia foranea*/
CREATE TABLE `Stock`.`Categorias` (`id` TINYINT UNSIGNED NOT NULL AUTO_INCREMENT , `nombre` TINYTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci; 
ALTER TABLE `Stock`.`Categorias` ADD INDEX `IndexCategorias_nombre` (`nombre`); 

CREATE TABLE `Stock`.`Marcas` (`id` TINYINT UNSIGNED NOT NULL  AUTO_INCREMENT, `nombre` TINYTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci; 
ALTER TABLE `Stock`.`Marcas` ADD INDEX `IndexMarcas_nombre` (`nombre`); 


/* Tablas con dependencias foraneas*/

CREATE TABLE `Stock`.`Productos` (`nombre` TINYTEXT NOT NULL , `marca` TINYINT UNSIGNED NOT NULL , `categoria` TINYINT UNSIGNED NOT NULL , `disponible` SMALLINT UNSIGNED NOT NULL , `valor_unitario` MEDIUMINT UNSIGNED NOT NULL , `codigo_barras` BIGINT UNSIGNED NULL DEFAULT NULL , `id` INT UNSIGNED NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_unicode_ci; 
/* FK's de Productos*/
ALTER TABLE `Stock`.`Productos` ADD CONSTRAINT `FK_Productos_Marcas` FOREIGN KEY (`marca`) REFERENCES `Marcas`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 
ALTER TABLE `Stock`.`Productos` ADD CONSTRAINT `FK_Productos_Categorias` FOREIGN KEY (`categoria`) REFERENCES `Categorias`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 

ALTER TABLE `Stock`.`Productos` ADD INDEX `IndexProductos_nombre` (`nombre`);
ALTER TABLE `Stock`.`Productos` ADD INDEX `IndexProductos_marca` (`marca`);
ALTER TABLE `Stock`.`Productos` ADD INDEX `IndexProductos_categoria` (`categoria`); 

/*Vistas reemplazando las FK*/
CREATE OR REPLACE VIEW `Stock`.`View_Productos` AS SELECT `Stock`.`Productos`.`nombre` AS `nombre`, `Stock`.`Marcas`.`nombre` AS `marca`, `Stock`.`Categorias`.`nombre` AS `categoria`, `Stock`.`Productos`.`disponible` AS `disponible`, `Stock`.`Productos`.`valor_unitario` AS `valor_unitario`, `Stock`.`Productos`.`codigo_barras` AS `codigo_barras`, `Stock`.`Productos`.`id` AS `id` FROM `Stock`.`Productos` INNER JOIN `Stock`.`Categorias` ON `Stock`.`Productos`.`categoria` = `Stock`.`Categorias`.`id` INNER JOIN `Stock`.`Marcas` ON `Stock`.`Productos`.`marca` = `Stock`.`Marcas`.`id`; 

INSERT INTO `Stock`.`Marcas` (`nombre`) VALUES ('BAYER') ;
INSERT INTO `Stock`.`Marcas` (`nombre`) VALUES ('SOFTEL') ;
INSERT INTO `Stock`.`Marcas` (`nombre`) VALUES ('VERBA') ;

INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Purgantes') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('medicamentos') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Herramientas') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Higiene Generas') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Higiene Bobinos') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Enfermeria') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Proteinas') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Vitaminas') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Purinas') ;
INSERT INTO `Stock`.`Categorias` (`nombre`) VALUES ('Energizantes') ;

INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Aminoacido 1 litro39.00 ','2','69','70000','7344097164','4');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Energizante 25ml','2','62','70000','48807141538','8');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('ATP Energia 35g','2','60','60000','57415322568','8');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Olifamisol 500ml141.00','2','101','80000','57555657114','4');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Aminoacidos oral Perro 50ml','2','74','10000','79926636738','8');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Olivitasan Plus 250ml558.00','2','87','60000','46202422870','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Iversan 500 ml39.00','2','123','80000','76368793888','8');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Olivitasan 500ml1,543.00','3','5','60000','25230760030','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Amantina Premium 100ml5.00','3','116','80000','28294537576','6');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Olivitasan Plus 500ml1,937.00','3','38','70000','75820401677','7');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Energizante 250ml18.00','3','102','80000','99603293678','8');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Cetriamon 1 litro','3','37','90000','52866138588','8');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Iversan 3.15% de 500ml','3','23','70000','59369204576','6');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Aminoácido 5 Litros98.00','3','95','20000','58598705272','2');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Amantina Premium 500ml1.00','3','35','40000','37281495104','4');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Cetriamon 5 litros','3','63','20000','63691463407','7');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Super Complejo B 1 litro324.00','3','5','90000','69313687921','1');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Olivitasan 300ml','1','115','20000','50196135807','7');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Olivitasan 25ml437.00','1','76','60000','29762125520','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Aminoacidos oral aves 50ml','1','22','10000','20353890403','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Olivitasan Plus de 50ml1,086.00','1','38','30000','25832997506','6');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Energizante 500ml','1','3','40000','80703777728','8');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Cetriamon 50ml','1','86','60000','61376082635','5');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Olivitasan 100ml262.00','1','60','80000','48637852532','2');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Amantina Premium 250ml63.00','1','78','70000','69657260141','1');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Energizante 100ml102.00','1','37','30000','75089818189','9');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Complejo B-B12 B15 20ml504.00','1','15','90000','25650003813','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Amino Impulsor de 100ml75.00 ','1','65','30000','7414553830','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Amino Impulsor de 20ml ','1','115','10000','15532123173','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Amino Impulsor de 50ml108.00 ','1','120','50000','99421204873','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Dectoplus 10ml62.00 ','1','123','90000','6942867600','3');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Dectoplus 100ml56.00 ','1','56','20000','37741474236','6');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Dectoplus 250ml8.00 ','1','115','90000','7085636559','9');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Dectoplus 250ml PROMO101.00 ','1','92','10000','3308359677','7');
INSERT INTO `Stock`.`Productos`(`nombre`, `marca`, `disponible`, `valor_unitario`, `codigo_barras`, `categoria`)VALUES ('Dectoplus 50ml60.00 ','1','109','40000','23690858316','6');


/*  Eliminacion de creacion
DROP DATABASE `Stock`
*/ 

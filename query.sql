DROP DATABASE IF EXISTS `glamify_test`;
CREATE DATABASE `glamify_test`;
USE `glamify_test`;


DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `categoria` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` int(255) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



DROP TABLE IF EXISTS `bitacora`;

CREATE TABLE `bitacora` (
	`id` int(10) NOT NULL AUTO_INCREMENT,
	`fecha` datetime NOT NULL,
	`executedSQL` TEXT NOT NULL,
	`reverseSQL` TEXT NOT NULL,
	`usuario` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



-- inicio de los triggers producto
DROP TRIGGER IF EXISTS `after_insert_productos`;
DELIMITER $$

CREATE TRIGGER `after_insert_productos`
	AFTER INSERT ON `productos`
	FOR EACH ROW
BEGIN
	INSERT INTO bitacora (fecha, executedSQL, reverseSQL, usuario)
	VALUES (
		-- la funcion NOW() regresa la fecha y hora actual
		NOW(),
		-- la funcion CONCAT() junta 2 valores como una cadena de caracteres
		CONCAT('INSERT INTO producto (nombre, categoria, descripcion, precio, imagen) VALUES (', NEW.nombre ,', ', NEW.categoria ,', ', NEW.descripcion ,', ', NEW.precio ,', ', NEW.imagen ,');'),
		CONCAT('DELETE FROM producto WHERE id = ', NEW.id, ';'),
		CURRENT_USER()
	);
END;

$$
DELIMITER ;


DROP TRIGGER IF EXISTS `after_delete_productos`;
DELIMITER $$

CREATE TRIGGER `after_delete_productos`
	AFTER DELETE ON `productos`
	FOR EACH ROW
BEGIN
	INSERT INTO bitacora (fecha, executedSQL, reverseSQL, usuario)
	VALUES (
		NOW(),
		CONCAT('DELETE FROM producto WHERE id = ', OLD.id, ';'),
		CONCAT('INSERT INTO producto (nombre, categoria, descripcion, precio, imagen) VALUES (', OLD.nombre ,', ', OLD.categoria ,', ', OLD.descripcion ,', ', OLD.precio ,', ', OLD.imagen ,');'),
		CURRENT_USER()
	);
END;

$$
DELIMITER ;


DROP TRIGGER IF EXISTS `after_update_productos`;
DELIMITER $$
CREATE TRIGGER `after_update_productos`
	AFTER UPDATE ON `productos`
	FOR EACH ROW
BEGIN
	INSERT INTO bitacora (fecha, executedSQL, reverseSQL, usuario)
	VALUES (
		NOW(),
		CONCAT('UPDATE producto SET nombre = ', NEW.nombre ,', categoria = ', NEW.categoria ,', descripcion = ', NEW.descripcion ,', precio = ', NEW.precio ,', imagen = ', NEW.imagen ,' WHERE id = ', OLD.id, ';'),
		CONCAT('UPDATE producto SET nombre = ', OLD.nombre ,', categoria = ', OLD.categoria ,', descripcion = ', OLD.descripcion ,', precio = ', OLD.precio ,', imagen = ', OLD.imagen ,' WHERE id = ', NEW.id, ';'),
		CURRENT_USER()
	);
END;

$$
DELIMITER ;
-- fin de los triggers producto



-- inicio de los triggers usuario
DROP TRIGGER IF EXISTS `after_insert_usuario`;
DELIMITER $$

CREATE TRIGGER `after_insert_usuario`
	AFTER INSERT ON `usuario`
	FOR EACH ROW
BEGIN
	INSERT INTO bitacora (fecha, executedSQL, reverseSQL, usuario)
	VALUES (
		NOW(),
		CONCAT('INSERT INTO usuario (nombre, username, correo, contrasena) VALUES (', NEW.nombre ,', ', NEW.username ,', ', NEW.correo ,', ', NEW.contrasena ,');'),
		CONCAT('DELETE FROM usuario WHERE id = ', NEW.id, ';'),
		CURRENT_USER()
	);
END;

$$
DELIMITER ;


DROP TRIGGER IF EXISTS `after_update_usuario`;
DELIMITER $$
CREATE TRIGGER `after_update_usuario`
	AFTER UPDATE ON `usuario`
	FOR EACH ROW
BEGIN
	INSERT INTO bitacora (fecha, executedSQL, reverseSQL, usuario)
	VALUES (
		NOW(),
		CONCAT('UPDATE usuario SET nombre = ', NEW.nombre ,', username = ', NEW.username ,', correo = ', NEW.correo ,', contrasena = ', NEW.contrasena ,' WHERE id = ', OLD.id, ';'),
		CONCAT('UPDATE usuario SET nombre = ', OLD.nombre ,', username = ', OLD.username ,', correo = ', OLD.correo ,', contrasena = ', OLD.contrasena ,' WHERE id = ', NEW.id, ';'),
		CURRENT_USER()
	);
END;

$$
DELIMITER ;


DROP TRIGGER IF EXISTS `after_delete_usuario`;
DELIMITER $$
CREATE TRIGGER `after_delete_usuario`
	AFTER DELETE ON `usuario`
	FOR EACH ROW
BEGIN
	INSERT INTO bitacora (fecha, executedSQL, reverseSQL, usuario)
	VALUES (
		NOW(),
		CONCAT('DELETE FROM usuario WHERE id = ', OLD.id, ';'),
		CONCAT('INSERT INTO usuario (nombre, username, correo, contrasena) VALUES (', OLD.nombre ,', ', OLD.username ,', ', OLD.correo ,', ', OLD.contrasena ,');'),
		CURRENT_USER()
	);
END;

$$
DELIMITER ;
-- fin de los triggers usuario

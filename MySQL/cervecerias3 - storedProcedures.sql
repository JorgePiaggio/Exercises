USE Cervecerias;

/* 1.	Crear un procedimiento que permita visualizar a las cervezas que tienen graduacion alcoholica 
mayor al que se indica por parámetro.*/

DROP PROCEDURE IF EXISTS ListarCervezasMayoresA;
DELIMITER $$

CREATE PROCEDURE ListarCervezasMayoresA(IN grado FLOAT)
BEGIN
	SELECT c.nombreCerveza, c.gradoAlcohol
    FROM Cervezas c
    WHERE c.gradoAlcohol > grado;
END $$

CALL ListarCervezasMayoresA(4.1);

/* 2.	Crear un procedimiento que inserte una cerveza y una graduación alcoholica pasadas por parametro*/

DROP PROCEDURE IF EXISTS InsertarCerveza;
DELIMITER $$

CREATE PROCEDURE InsertarCerveza(IN nombre VARCHAR(50), IN gradoAlc FLOAT)
BEGIN
	INSERT INTO Cervezas (nombreCerveza, gradoAlcohol) VALUES (nombre, gradoAlc);
END $$

CALL InsertarCerveza ('Patagonian Stout', 5.5);
SELECT * FROM Cervezas;

/*3.	Crear un procedimiento que inserte una cerveza y una graduación alcoholica pasadas 
por parametro y retorne el id del último insertado*/

DROP PROCEDURE IF EXISTS InsertarCerveza2;
DELIMITER $$

CREATE PROCEDURE InsertarCerveza2(IN nombre VARCHAR(50), IN gradoAlc FLOAT, OUT id INT)
BEGIN
	INSERT INTO Cervezas (nombreCerveza, gradoAlcohol) VALUES (nombre, gradoAlc);
    SET id = LAST_INSERT_ID();
END $$

CALL InsertarCerveza2 ('Patagonian Pale Ale', 5.5, @id);
SELECT @id AS 'UlitmoId';
SELECT * FROM Cervezas;

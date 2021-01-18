CREATE DATABASE Cervecerias;
USE Cervecerias;

CREATE TABLE Cervezas (
    idCerveza INT NOT NULL AUTO_INCREMENT,
    nombreCerveza VARCHAR(50) NOT NULL,
    gradoAlcohol SMALLINT NOT NULL,
    PRIMARY KEY (idCerveza)
);

ALTER TABLE Cervezas MODIFY gradoAlcohol FLOAT NOT NULL;

CREATE TABLE Recetas (
    idReceta INT NOT NULL AUTO_INCREMENT,
    idCerveza INT NOT NULL,
    nombreReceta VARCHAR(50),
    PRIMARY KEY (idReceta),
    CONSTRAINT fk_idCerveza FOREIGN KEY (idCerveza)
        REFERENCES Cervezas (idCerveza)
);

CREATE TABLE Ingredientes (
    idIngrediente INT NOT NULL AUTO_INCREMENT,
    nombreIngrediente VARCHAR(50) NOT NULL,
    PRIMARY KEY (idIngrediente)
);

CREATE TABLE IngredientesRecetas (
    idIngredienteReceta INT NOT NULL AUTO_INCREMENT,
    idIngrediente INT NOT NULL,
    idReceta INT NOT NULL,
    PRIMARY KEY (idIngredienteReceta),
    CONSTRAINT fk_idIng FOREIGN KEY (idIngrediente)
        REFERENCES Ingredientes (idIngrediente),
    CONSTRAINT fk_idRec FOREIGN KEY (idReceta)
        REFERENCES Recetas (idReceta)
);

INSERT INTO Cervezas (nombreCerveza, gradoAlcohol) VALUES
	('ALtbier', 4.7),
    ('American Pale Ale', 4.8),
    ('Barley Wine', 6.5),
    ('Bock', 5.1),
    ('English Pale Ale', 3.2),
    ('Irish Red', 6.5),
    ('Klosch', 4.0),
    ('Porter', 5.3),
    ('Scotch', 3.9),
    ('Stout', 6.9);

UPDATE Cervezas 
SET 
    nombreCerveza = 'Altbier'
WHERE
    nombreCerveza = 'ALtbier';

INSERT INTO Ingredientes(nombreIngrediente) VALUES
	('Agua'),
	('Levadura'),
	('Malta'), 
	('Lúpulo'), 
	('Vino'),
	('Irish Red'),
	('Whisky'),
	('Cereales'), 
	('Zumo de fruta'), 
	('Jarabe'), 
	('Frambuesa'), 
	('Cereza'), 
	('Lúpulos amargos'),
	('Lúpulos aromáticos'),
	('Lúpulos mixtos'); 

INSERT INTO Recetas (idCerveza, nombreReceta) VALUES
	(1,'Receta 1'),
	(1,'Receta 2'),
	(2,'Receta 3'),
	(3,'Receta 4'),
	(4,'Receta 5'),
	(5,'Receta 5'),
	(6,'Receta 5'),
	(6,'Receta 6'),
	(7,'Receta 8'),
	(8,'Receta 9'),
	(9,'Receta 10'),
	(10,'Receta 10'),
	(10,'Receta 10');

UPDATE Recetas 
SET 
    nombreReceta = 'Receta 11'
WHERE
    idReceta = 13;

INSERT INTO IngredientesRecetas(idReceta, idIngrediente) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(13, 1),
	(1, 2),
	(2, 2),
	(3, 3),
	(4, 2),
	(5, 2),
	(7, 4),
	(8, 5),
	(9, 2),
	(13, 2),
	(1, 4),
	(1, 3),
	(1, 5),
	(1, 6),
	(1, 7),
	(13, 1),
	(11, 1),
	(12, 1),
	(10, 1);


/* 1. Mostrar la información de todas las cervezas junto con el respectivo nombre de su receta segun corresponda.*/

SELECT 
    c.nombreCerveza, c.gradoAlcohol, r.nombreReceta
FROM
    Cervezas c
        JOIN
    Recetas r ON c.idCerveza = r.idCerveza;


/* 2. listar 3 de las recetas que contengan mas de 5 ingredientes.*/

SELECT 
    r.nombreReceta, COUNT(ir.idIngrediente) AS CantIngredientes
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
GROUP BY r.idReceta
HAVING CantIngredientes > 5
ORDER BY CantIngredientes DESC
LIMIT 3;


/* 3. ordenar los ingredientes de cada receta junto con el nombre de cada ingrediente de forma descendente.*/

SELECT 
    r.nombreReceta, ir.idIngrediente, i.nombreIngrediente
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
        JOIN
    Ingredientes i ON i.idIngrediente = ir.idIngrediente
ORDER BY r.idReceta , ir.idIngrediente DESC;


/* 4. Consultar el Promedio de ingredientes de todas las recetas.*/

SELECT 
    COUNT(ir.idIngrediente)/COUNT(DISTINCT r.idReceta) AS prom
FROM
    IngredientesRecetas ir
    JOIN Recetas r ON r.idReceta = ir.idReceta;

/* 5. Listar toda la informacion de cada una de las recetas y toda la informacion de los ingredientes.*/

SELECT 
    r.nombreReceta, c.nombreCerveza, i.nombreIngrediente
FROM
    Cervezas c
        JOIN
    Recetas r ON c.idCerveza = r.idCerveza
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
        JOIN
    Ingredientes i ON i.idIngrediente = ir.idIngrediente
ORDER BY r.nombreReceta , c.nombreCerveza;


/* 6. Listar las cervezas que se encuentren entre la letras C y P, junto al nombre de su receta.*/

SELECT 
    c.nombreCerveza, r.nombreReceta
FROM
    Cervezas c
        JOIN
    Recetas r ON r.idCerveza = c.idCerveza
WHERE
    (c.nombreCerveza > 'Bz')
        AND (c.nombreCerveza < 'Pz');


/* 7. Listar la Receta que mas ingredientes contenga.*/

SELECT 
    r.nombreReceta, COUNT(ir.idReceta) AS cantIng
FROM
    IngredientesRecetas ir
        JOIN
    Recetas r ON r.idReceta = ir.idReceta
GROUP BY r.idReceta
ORDER BY cantIng DESC
LIMIT 1;


/* 8. Listar los 2 ingredientes que menos se utilizan (en menos recetas se encuentre).*/

SELECT 
    i.nombreIngrediente, COUNT(ir.idIngrediente) AS cant
FROM
    Ingredientes i
        JOIN
    IngredientesRecetas ir ON ir.idIngrediente = i.idIngrediente
GROUP BY ir.idIngrediente
ORDER BY cant ASC
LIMIT 2;


/* 9. Listar los Ingredientes que NO se utilicen en ninguna de las Recetas.*/

SELECT i.nombreIngrediente
FROM Ingredientes i 
LEFT JOIN IngredientesRecetas ir
ON i.idIngrediente = ir.idIngrediente
WHERE i.idIngrediente NOT IN (SELECT ir.idIngrediente FROM IngredientesRecetas ir);




CREATE DATABASE dbMuseo;
USE dbMuseo;


CREATE TABLE Escuelas (
    idEscuela INT AUTO_INCREMENT,
    escuela VARCHAR(30) NOT NULL,
    domicilio VARCHAR(30),
    PRIMARY KEY (idEscuela)
);
    
CREATE TABLE Reservas (
    idReserva INT NOT NULL,
    idEscuela INT NOT NULL,
    Fecha DATE,
    PRIMARY KEY (idReserva),
    CONSTRAINT fk_idEscuela FOREIGN KEY (idEscuela)
        REFERENCES Escuelas (idEscuela)
);
    
CREATE TABLE TelefonosEscuelas (
    telefono INT NOT NULL,
    idEscuela INT NOT NULL,
    PRIMARY KEY (telefono , idEscuela),
    CONSTRAINT pfk_IdEscuela FOREIGN KEY (idEscuela)
        REFERENCES Escuelas (idEscuela)
);
    
CREATE TABLE TipoVisitas (
    idTipoVisita INT AUTO_INCREMENT,
    tipoVisita VARCHAR(30) NOT NULL,
    arancel DECIMAL(6 , 2 ) NOT NULL,
    PRIMARY KEY (idTipoVisita)
);

CREATE TABLE Guias (
    idGuia INT AUTO_INCREMENT,
    guia VARCHAR(30) NOT NULL,
    PRIMARY KEY (idGuia)
);
    
CREATE TABLE Visitas (
    idReserva INT NOT NULL,
    idTipoVisita INT NOT NULL,
    grado VARCHAR(10),
    alumnos INT,
    alumnosReales INT,
    arancel DECIMAL(6 , 2 ),
    PRIMARY KEY (idReserva , idTipoVisita),
    CONSTRAINT fk_tipoVisita FOREIGN KEY (idTipoVisita)
        REFERENCES TipoVisitas (idTipoVisita),
    CONSTRAINT fk_idReserva FOREIGN KEY (idReserva)
        REFERENCES Reservas (idReserva)
);
    
CREATE TABLE VisitasGuias (
    idReserva INT NOT NULL,
    idTipoVisita INT NOT NULL,
    idGuia INT NOT NULL,
    responsable VARCHAR(30),
    PRIMARY KEY (idReserva , idTipoVisita , idGuia),
    CONSTRAINT fk_idReservaGuia FOREIGN KEY (idReserva)
        REFERENCES Reservas (idReserva),
    CONSTRAINT fk_idTipoVisitaGuia FOREIGN KEY (idTipoVisita)
        REFERENCES TipoVisitas (idTipoVisita),
    CONSTRAINT fk_idGuiaV FOREIGN KEY (idGuia)
        REFERENCES Guias (idGuia)
);

CREATE TABLE Localidades (
    idLocalidad INT AUTO_INCREMENT,
    localidad VARCHAR(30) NOT NULL,
    PRIMARY KEY (idLocalidad)
);
    
    
    
ALTER TABLE Escuelas ADD idLocalidad INT NOT NULL;
ALTER TABLE Escuelas ADD CONSTRAINT fk_localidad FOREIGN KEY (idLocalidad) REFERENCES Localidades(idLocalidad);
ALTER TABLE TelefonosEscuelas ADD COLUMN telefonoNum BIGINT;
ALTER TABLE TelefonosEscuelas DROP PRIMARY KEY, ADD PRIMARY KEY(telefonoNum, idEscuela);
ALTER TABLE TelefonosEscuelas DROP COLUMN telefono;
ALTER TABLE TelefonosEscuelas CHANGE telefonoNum telefono BIGINT NOT NULL;
DESCRIBE TelefonosEscuelas;
ALTER TABLE Visitas DROP FOREIGN KEY fk_idReserva;
ALTER TABLE VisitasGuias DROP FOREIGN KEY fk_idReservaGuia;
ALTER TABLE Reservas CHANGE idReserva idReserva INT AUTO_INCREMENT;
ALTER TABLE Visitas ADD CONSTRAINT fk_idReserva FOREIGN KEY (idReserva) REFERENCES Reservas(idReserva); 
ALTER TABLE VisitasGuias ADD CONSTRAINT fk_idReservaGuia FOREIGN KEY (idReserva) REFERENCES Reservas(idReserva); 
DESCRIBE Reservas;
ALTER TABLE VisitasGuias CHANGE responsable responsable INT;

ALTER TABLE Visitas ADD CONSTRAINT chk_alumnosReales 
	CHECK (alumnosReales = CASE WHEN alumnosReales IS NULL THEN alumnos
								ELSE alumnosReales
                                END);


INSERT INTO Localidades(localidad) VALUES 
	('Mar del Plata'),
    ('Coronel Suarez'),
    ('Bariloche'),
    ('Saavedra');
INSERT INTO Escuelas(escuela, domicilio, idLocalidad) VALUES
	('San Agustin', 'Alberti 1612', 1),
	('Nacional', 'Avellaneda 426', 2),
	('EEM N°4', 'Avellaneda 442', 2),
	('Einstein', 'Colón 7423', 3),
	('EEM N°46', 'Lavalle 2145', 4),
	('D.F. Sarmiento', 'Alem 152', 1);
INSERT INTO TelefonosEscuelas(telefono, idEscuela) VALUES
	(2234225243, 1),
    (292649123521, 2),
    (2926424642, 3),
    (2524777511, 4);
INSERT INTO Guias(Guia) VALUES
	('Juan'),
	('Maximo'),
	('Josefa'),
	('Aldana');
INSERT INTO TipoVisitas(TipoVisita, Arancel) VALUES
	('Comun', 55.25),
	('Extendida', 75.9),
	('Completa', 150.0);
INSERT INTO Reservas(idEscuela, fecha) VALUES
	(1, '2020-12-21'),
   	(2, '2021-06-12'),
	(4, '2021-04-01'),
	(5, '2021-03-21'),
	(6, '2020-12-10');
INSERT INTO Visitas(idReserva, idTipoVisita, grado, alumnos, alumnosReales) VALUES
	(1, 1, '2° A', 32, 30),
	(2, 3, '7° C', 22, 22),
	(3, 1, '2° B', 30, 20),
	(4, 2, '3° A', 36, 32),
	(5, 1, '1° A', 40, 35);
INSERT INTO VisitasGuias(idReserva, idTipoVisita, idGuia, responsable) VALUES
	(1, 1, 4, 0),
    (2, 3, 1, 0),
    (3, 1, 3, 1),
    (4, 2, 4, 0),
    (5, 1, 2, 1);
    
SELECT 
    *
FROM
    Escuelas;
SELECT 
    *
FROM
    TelefonosEscuelas;
SELECT 
    *
FROM
    Reservas;
SELECT 
    *
FROM
    Visitas;
SELECT 
    *
FROM
    VisitasGuias;
SELECT 
    *
FROM
    TipoVisitas;
SELECT 
    *
FROM
    Guias;
SELECT 
    *
FROM
    Localidades;

ALTER TABLE Visitas ADD CHECK(alumnosReales <= alumnos);
/* ALTER TABLE Visitas ADD CONSTRAINT df_alumReales DEFAULT alumnos alumnosReales;*/


SELECT 
    escuela, telefono
FROM
    Escuelas e,
    TelefonosEscuelas t
WHERE
    e.idEscuela = t.idEscuela;

SELECT 
    escuela, IFNULL(telefono, 'No disponible')
FROM
    Escuelas e
        LEFT JOIN
    TelefonosEscuelas t ON e.idEscuela = t.idEscuela;


/* ● Listar Nombre y cantidad de Reservas realizadas para cada Escuela durante el presente año.*/

SELECT 
    escuela, IFNULL(COUNT(r.idEscuela),0) AS cantReservas
FROM
    Escuelas e,
    Reservas r
WHERE
    e.idEscuela = r.idEscuela
        AND YEAR(r.fecha) = '2020'
GROUP BY r.idEscuela;


/* ● Listar Nombre y cantidad de Reservas realizadas para cada Escuela durante el presente año, en caso
de no haber realizado Reservas, mostrar el número cero.*/

INSERT INTO Escuelas(escuela, domicilio, idLocalidad) VALUES ('San Francisco', 'Lacunza 3613', 3);

SELECT 
    e.escuela, COUNT(r.idEscuela) AS cantReservas
FROM
    Escuelas e
        LEFT JOIN
    (SELECT 
        *
    FROM
        Reservas r
    WHERE
        YEAR(r.fecha) = '2020') AS r ON r.idEscuela = e.idEscuela
GROUP BY e.idEscuela;


/* ● Listar el nombre de los Guías que participaron en las Visitas, pero no como Responsable.*/

SELECT 
    *
FROM
    VisitasGuias;

SELECT 
    guia
FROM
    Guias g
        JOIN
    VisitasGuias v ON v.idGuia = g.idGuia
WHERE
    responsable = 0
GROUP BY g.guia;


/* ● Listar el nombre de los Guías que no participaron de ninguna Visita.*/

INSERT INTO Guias(guia) VALUES ('Miguel');

SELECT 
    guia
FROM
    Guias g
        LEFT JOIN
    VisitasGuias v ON g.idGuia = v.idGuia
WHERE
    v.idGuia IS NULL;

SELECT 
    guia
FROM
    Guias g
WHERE
    g.idGuia NOT IN (SELECT 
            idGuia
        FROM
            VisitasGuias);

/* ● Listar para cada Visita, el nombre de Escuela, el nombre del Guía responsable, la cantidad de
alumnos que concurrieron y la fecha en que se llevó a cabo.*/

SELECT 
    v.idReserva, e.escuela, g.guia, v.alumnosReales, r.fecha
FROM
    Visitas v
        JOIN
    Reservas r ON v.idReserva = r.idReserva
        JOIN
    Escuelas e ON r.idEscuela = e.idEscuela
        JOIN
    VisitasGuias vg ON vg.idReserva = v.idReserva
        JOIN
    Guias g ON vg.idGuia = g.idGuia
;

/* ● Listar el nombre de cada Escuela y su localidad. También deben aparecer las Localidades que no
tienen Escuelas, indicando ‘Sin Escuelas’. Algunas Escuelas no tienen cargada la Localidad, debe
indicar ‘Sin Localidad’.*/

ALTER TABLE Escuelas DROP CONSTRAINT fk_localidad;
ALTER TABLE Escuelas CHANGE idLocalidad idLocalidad INT DEFAULT NULL;
DESCRIBE Escuelas;
ALTER TABLE Escuelas ADD CONSTRAINT fk_localidad FOREIGN KEY (idLocalidad) REFERENCES Localidades(idLocalidad);
INSERT INTO Localidades(localidad) VALUES ('Batan'), ('Junin');
INSERT INTO Escuelas(escuela, domicilio) VALUES ('Instituto Adolfo Abalos', 'Diagonal X 2234');
    
SELECT 
    IFNULL(e.escuela, 'Sin Escuelas'),
    IFNULL(l.localidad, 'Sin Localidad')
FROM
    Escuelas e
        LEFT JOIN
    Localidades l ON e.idLocalidad = l.idLocalidad 
UNION 
SELECT 
    IFNULL(e.escuela, 'Sin Escuelas'),
    IFNULL(l.localidad, 'Sin Localidad')
FROM
    Localidades l
        LEFT JOIN
    Escuelas e ON e.idLocalidad = l.idLocalidad;


/* ● Listar el nombre de los Directores y el de los Guías, juntos, ordenados alfabéticamente.*/

CREATE TABLE Directores (
    idDirector INT AUTO_INCREMENT,
    director VARCHAR(30) NOT NULL,
    PRIMARY KEY (idDirector)
);
    
ALTER TABLE Escuelas ADD COLUMN director INT;
ALTER TABLE Escuelas ADD CONSTRAINT fk_director FOREIGN KEY (director) REFERENCES Directores(idDirector);
INSERT INTO Directores(director) VALUES
	('Raul Gonzales'),
	('Pedro Pianno'),
	('Marisa Salomon'),
	('Noemi Alberdi');
UPDATE Escuelas 
SET 
    director = 1
WHERE
    idEscuela = 4;
UPDATE Escuelas 
SET 
    director = 2
WHERE
    idEscuela = 1;
UPDATE Escuelas 
SET 
    director = 3
WHERE
    idEscuela = 5;
UPDATE Escuelas 
SET 
    director = 4
WHERE
    idEscuela = 2;

SELECT 
    g.guia AS nombre
FROM
    Guias g 
UNION ALL SELECT 
    d.director AS nombre
FROM
    Directores d
ORDER BY nombre ASC;


/* ● Listar el nombre de los Directores de las escuelas de Mar del Plata, y el de todos los Guías, juntos,
ordenados alfabéticamente.*/

SELECT 
    *
FROM
    Localidades;

SELECT 
    g.guia AS nombre
FROM
    Guias g 
UNION ALL (SELECT 
    d.director AS nombre
FROM
    Directores d
        JOIN
    Escuelas e ON d.idDirector = e.director
WHERE
    e.idLocalidad = 1) ORDER BY nombre ASC;


/* ● Listar para las Escuelas que tienen Reservas, el nombre y la Localidad, teniendo en cuenta que
algunas Escuelas no tienen Localidad.*/

SELECT 
    *
FROM
    Escuelas;

SELECT 
    e.escuela,
    IFNULL(l.localidad, 'No especificado') AS location
FROM
    Escuelas e
        LEFT JOIN
    Localidades l ON e.idLocalidad = l.idLocalidad
ORDER BY location; 


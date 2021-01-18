CREATE DATABASE LigaBasquet;
USE LigaBasquet;

CREATE TABLE Equipos (
    idEquipo INT NOT NULL AUTO_INCREMENT,
    nombreEquipo VARCHAR(50),
    PRIMARY KEY (idEquipo)
);
    
CREATE TABLE Jugadores (
    idJugador INT NOT NULL AUTO_INCREMENT,
    idEquipo INT NOT NULL,
    nombre VARCHAR(50),
    apellido VARCHAR(50),
    PRIMARY KEY (idJugador),
    CONSTRAINT fk_idEquipo FOREIGN KEY (idEquipo)
        REFERENCES Equipos (idEquipo)
);

CREATE TABLE Partidos (
    idPartido INT NOT NULL AUTO_INCREMENT,
    idEquipoLocal INT NOT NULL,
    idEquipoVisitante INT NOT NULL,
    fecha DATETIME,
    PRIMARY KEY (idPartido),
    CONSTRAINT fk_eqLocal FOREIGN KEY (idEquipoLocal)
        REFERENCES Equipos (idEquipo),
    CONSTRAINT fk_eqVisit FOREIGN KEY (idEquipoVisitante)
        REFERENCES Equipos (idEquipo)
);

CREATE TABLE JugadoresEquiposPartidos (
    idJugador INT NOT NULL,
    idPartido INT NOT NULL,
    puntos INT,
    rebotes INT,
    asistencias INT,
    minutos INT,
    faltas INT,
    PRIMARY KEY (idJugador , idPartido),
    CONSTRAINT fk_JEP_idJugador FOREIGN KEY (idJugador)
        REFERENCES Jugadores (idJugador),
    CONSTRAINT fk_JEP_idPartido FOREIGN KEY (idPartido)
        REFERENCES Partidos (idPartido)
);
    
INSERT INTO Equipos (nombreEquipo) VALUES
	('Boston Celtics'),
	('NY Knicks'),
    ('Philadelphia 76ers'),
	('Toronto Raptors'),	
	('Golden State Warriors'),	
    ('LA Lakers'),	
    ('Phoenix Suns'),
    ('Chicago Bulls'),
    ('Houston Rockets'),
    ('San Antonio Spurs');

INSERT INTO Jugadores(idEquipo, nombre, apellido) VALUES
	(1,'Jayson','Tatum'),
    (1,'Kemba','Walker'),
    (1,'Tacko','Fall'),
    (1,'Semi','Ojeleye'),
    (1,'Tremont','Walker'),
    (2,'RJ','Barret'),
    (2,'Reggie','Bullock'),
    (2,'Alec','Burks'),
    (2,'Taj','Gibson'),
    (2,'Jacob','Evans'),
    (3,'Seth','Curry'),
    (3,'Danny','Green'),
    (3,'Dwight','Howard'),
    (3,'Justin','Robinson'),
    (3,'Matisse','Thybulle'),
    (4,'Chris','Boucher'),
    (4,'Kyle','Lowry'),
    (4,'Yuta','Watanabe'),
    (4,'OG','Anunoby'),
    (4,'DeAndre','Bembry'),
    (5,'Stephen','Curry'),
    (5,'Damion','Lee'),
    (5,'Marquese','Chriss'),
    (5,'Draymond','Green'),
    (5,'Jordan','Poole'),
    (6,'Kostas','Antetokounmpo'),
    (6,'Anthony','Davis'),
    (6,'Marc','Gasol'),
    (6,'LeBron','James'),
    (6,'Alex','Caruso'),
    (7,'Chris','Paul'),
    (7,'Abdel','Nader'),
    (7,'Damian','Jones'),
    (7,'Deandre','Ayton'),
    (7,'Devin','Booker'),
    (8,'Thaddeus','Young'),
    (8,'Tomas','Satoransky'),
    (8,'Otto','Porter Jr'),
    (8,'Wendell','Carter Jr'),
    (8,'Zach','LaVine'),
    (9,'Tyson','Chandler'),
    (9,'DeMarcus','Cousins'),
    (9,'James','Harden'),
    (9,'Sterling','Brown'),
    (9,'Chris','Clemons'),
    (10,'Derrick','White'),
    (10,'Cameron','Reynolds'),
    (10,'Dejounte','Murray'),
    (10,'Patty','Mills'),
    (10,'LaMarcus','Aldridge');
    
INSERT INTO Partidos(idEquipoLocal, idEquipoVisitante, fecha) VALUES
	( 1, 2, '2020-12-08'),
    ( 3, 4, '2020-12-08'),
    ( 5, 6, '2020-12-08'),
    ( 7, 8, '2020-12-08'),
    ( 9, 10, '2020-12-08'),
    ( 2, 1, '2020-12-10'),
    ( 4, 3, '2020-12-10'),
    ( 6, 5, '2020-12-10'),
    ( 8, 7, '2020-12-10'),
    ( 10, 9, '2020-12-10');
SELECT 
    *
FROM
    Partidos;
INSERT INTO JugadoresEquiposPartidos(idJugador, idPartido, puntos, rebotes, asistencias, minutos, faltas) VALUES
	( 1,1, 25, 2, 1, 32, 1),
    ( 2,1, 4, 0, 1, 23, 4),
    ( 3,1, 10, 1, 3, 22, 3),
    ( 4,1, 21, 2, 2, 40, 2),
    ( 5,1, 12, 5, 2, 33, 2),
    ( 6,1, 14, 2, 2, 32, 1),
    ( 7,1, 2, 0, 5, 13, 1),
    ( 8,1, 7, 1, 4, 25, 4),
    ( 9,1, 16, 2, 2, 29, 5),
    ( 10,1, 27, 1, 1, 35, 0),
    
	( 11,2, 25, 2, 1, 32, 1),
    ( 12,2, 4, 0, 1, 23, 4),
    ( 13,2, 10, 1, 3, 22, 3),
    ( 14,2, 21, 2, 2, 40, 2),
    ( 15,2, 12, 5, 2, 33, 2),
    ( 16,2, 14, 2, 2, 32, 1),
    ( 17,2, 2, 0, 5, 13, 1),
    ( 18,2, 7, 1, 4, 25, 4),
    ( 19,2, 16, 2, 2, 29, 5),
    ( 20,2, 27, 1, 1, 35, 0),
    
	( 21,3, 25, 2, 1, 32, 1),
    ( 22,3, 4, 0, 1, 23, 4),
    ( 23,3, 10, 1, 3, 22, 3),
    ( 24,3, 21, 2, 2, 40, 2),
    ( 25,3, 12, 5, 2, 33, 2),
    ( 26,3, 14, 2, 2, 32, 1),
    ( 27,3, 2, 0, 5, 13, 1),
    ( 28,3, 7, 1, 4, 25, 4),
    ( 29,3, 16, 2, 2, 29, 2),
    ( 30,3, 27, 1, 1, 35, 1),
    
	( 31,4, 21, 2, 1, 32, 1),
    ( 32,4, 22, 0, 1, 22, 4),
    ( 33,4, 0, 1, 3, 22, 3),
    ( 34,4, 26, 2, 2, 20, 2),
    ( 35,4, 19, 5, 2, 33, 2),
    ( 36,4, 9, 2, 2, 32, 1),
    ( 37,4, 15, 0, 5, 23, 1),
    ( 38,4, 11, 1, 4, 25, 4),
    ( 39,4, 26, 2, 2, 29, 2),
    ( 40,4, 27, 1, 1, 35, 1),
    
	( 41,5, 15, 2, 2, 22, 3),
    ( 42,5, 24, 0, 1, 23, 3),
    ( 43,5, 12, 0, 2, 12, 3),
    ( 44,5, 1, 2, 2, 10, 0),
    ( 45,5, 32, 5, 4, 13, 1),
    ( 46,5, 4, 0, 2, 22, 4),
    ( 47,5, 22, 0, 5, 23, 2),
    ( 48,5, 17, 1, 4, 35, 2),
    ( 49,5, 26, 2, 2, 19, 2),
    ( 50,5, 17, 0, 1, 25, 1),
    
	( 1,16, 21, 1, 2, 36, 1),
    ( 2,16, 24, 5, 1, 33, 2),
    ( 3,16, 20, 4, 3, 12, 1),
    ( 4,16, 11, 3, 2, 20, 0),
    ( 5,16, 2, 1, 5, 37, 5),
    ( 6,16, 1, 3, 3, 36, 5),
    ( 7,16, 21, 1,7, 23, 1),
    ( 8,16, 17, 2, 5, 21, 2),
    ( 9,16, 26, 1, 2, 22, 2),
    ( 10,16, 7, 0, 0, 32, 4),
    
	( 11,17, 29, 2, 1, 32, 1),
    ( 12,17, 14, 0, 2, 21, 0),
    ( 13,17, 18, 1, 3, 21, 1),
    ( 14,17, 25, 2, 1, 16, 4),
    ( 15,17, 12, 5, 5, 35, 2),
    ( 16,17, 11, 2, 1, 22, 4),
    ( 17,17, 25, 1, 1, 15, 2),
    ( 18,17, 17, 1, 1, 22, 2),
    ( 19,17, 12, 2, 1, 19, 1),
    ( 20,17, 22, 1, 5, 31, 1),
    
	( 21,18, 15, 2, 1, 32, 2),
    ( 22,18, 8, 0, 1, 21, 0),
    ( 23,18, 10, 1, 3, 12, 5),
    ( 24,18, 31, 2, 2, 20, 1),
    ( 25,18, 2, 5, 2, 36, 2),
    ( 26,18, 4, 2, 2, 38, 1),
    ( 27,18, 20, 0, 5, 33, 1),
    ( 28,18, 17, 1, 4, 15, 2),
    ( 29,18, 11, 2, 2, 39, 1),
    ( 30,18, 21, 0, 1, 21, 4),
    
	( 31,19, 15, 2, 1, 22, 0),
    ( 32,19, 14, 0, 1, 23, 4),
    ( 33,19, 12, 1, 3, 12, 1),
    ( 34,19, 21, 2, 2, 40, 2),
    ( 35,19, 12, 5, 2, 3, 2),
    ( 36,19, 4, 2, 2, 32, 1),
    ( 37,19, 21, 0, 5, 13, 1),
    ( 38,19, 17, 1, 4, 15, 1),
    ( 39,19, 16, 2, 2, 29, 1),
    ( 40,19, 21, 1, 1, 35, 0),
    
	( 41,20, 22, 2, 1, 32, 2),
    ( 42,20, 14, 0, 1, 21, 4),
    ( 43,20, 0, 1, 3, 22, 3),
    ( 44,20, 12, 2, 2, 33, 2),
    ( 45,20, 15, 5, 2, 31, 2),
    ( 46,20, 12, 2, 1, 22, 1),
    ( 47,20, 21, 0, 5, 13, 1),
    ( 48,20, 17, 1, 3, 25, 4),
    ( 49,20, 26, 2, 2, 29, 5),
    ( 50,20, 17, 2, 1, 35, 0);
    
    
    
/* 1) Listar los jugadores y a que equipo pertenecen (nombre, apellido ,
nombre_equipo).*/

SELECT 
    j.nombre, j.apellido, e.nombreEquipo
FROM
    Jugadores j,
    Equipos e
WHERE
    j.idEquipo = e.idEquipo
ORDER BY e.idEquipo;

SELECT 
    j.nombre, j.apellido, e.nombreEquipo
FROM
    Jugadores j
        JOIN
    Equipos e ON j.idEquipo = e.idEquipo
ORDER BY e.idEquipo;


/* 2) Listar los equipos cuyo nombre comience con la letra P.*/

SELECT 
    e.nombreEquipo
FROM
    Equipos e
WHERE
    e.nombreEquipo LIKE 'P%';


/* 3) Listar los jugadores que pertenezcan a un equipo que contenga una “NY” o
“LA” en su nombre​ ”.*/

SELECT 
    e.nombreEquipo
FROM
    Equipos e
WHERE
    e.nombreEquipo LIKE '%NY%'
        OR e.nombreEquipo LIKE '%LA%';


/* 4) Listar los jugadores y su equipo siempre y cuando el jugador haya jugado al menos
un partido.*/

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    IFNULL(COUNT(jep.idJugador), 0) AS partidosJugados
FROM
    Jugadores j
        JOIN
    Equipos e ON j.idEquipo = e.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.idJugador
HAVING partidosJugados > 0
ORDER BY e.idEquipo , partidosJugados;


/* 5) Listar los partidos con su fecha y los nombres de los equipos local y visitante.*/

SELECT 
    p.idPartido,
    p.fecha,
    e.nombreEquipo AS EqLocal,
    ee.nombreEquipo AS EqVisitante
FROM
    Partidos p
        JOIN
    Equipos e ON p.idEquipoLocal = e.idEquipo
        JOIN
    Equipos ee ON p.idEquipoVisitante = ee.idEquipo;


/* 6) Listar los equipos y la cantidad de jugadores que tiene .*/

SELECT 
    e.nombreEquipo,
    IFNULL(COUNT(j.idEquipo), 0) AS cantJugadores
FROM
    Equipos e
        JOIN
    Jugadores j ON j.idEquipo = e.idEquipo
GROUP BY e.idEquipo
ORDER BY e.idEquipo;


/* 7) Listar los jugadores y la cantidad de partidos que jugó.*/

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    IFNULL(COUNT(jep.idJugador), 0) AS cantPartidos
FROM
    Jugadores j
        JOIN
    Equipos e ON j.idEquipo = e.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.idJugador
ORDER BY e.nombreEquipo , cantPartidos DESC;


/* 8) Elaborar un ranking con los jugadores que más puntos hicieron en el torneo .*/

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    SUM(jep.puntos) AS cantPuntos
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
GROUP BY j.idJugador
ORDER BY cantPuntos DESC
LIMIT 10;


/* 9) Elaborar un ranking con los jugadores que más promedio de puntos tienen en el
torneo.*/

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    AVG(jep.puntos) AS cantPuntos
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
GROUP BY j.idJugador
ORDER BY cantPuntos DESC
LIMIT 10;


/* 10) Para cada jugador, mostrar la fecha del primer y último partido que jugo.*/

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    MIN(p.fecha) AS PrimerPartido,
    MAX(p.fecha) AS UltPartido
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
        JOIN
    Partidos p ON (e.idEquipo = p.idEquipoLocal
        OR e.idEquipo = p.idEquipoVisitante)
GROUP BY j.idJugador
ORDER BY e.idEquipo;


/* 11)Listar los equipos que tengan registrados mas de 150 puntos */

SELECT 
    e.nombreEquipo, SUM(jep.puntos) AS Puntos
FROM
    Equipos e
        JOIN
    Jugadores j ON j.idEquipo = e.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
GROUP BY e.nombreEquipo
HAVING Puntos > 150
ORDER BY Puntos DESC;


/*12) Listar los jugadores que hayan dado más de 5 asistencias y promediado más de 10
puntos por partido. */

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    SUM(jep.asistencias) AS asistencias,
    AVG(jep.puntos) AS promPuntos
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.nombre , j.apellido , e.nombreEquipo
HAVING asistencias > 5 AND promPuntos > 10
ORDER BY promPuntos DESC , asistencias DESC , e.nombreEquipo , j.nombre , j.apellido;


/*13) Listar los jugadores que en promedio tengan más de 10 puntos, 3 asistencias y 3
rebotes por partido. */

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    AVG(jep.asistencias) AS promAsistencias,
    AVG(jep.puntos) AS promPuntos,
    AVG(jep.rebotes) AS promRebotes
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.nombre , j.apellido , e.nombreEquipo
HAVING promAsistencias > 3 AND promPuntos > 10
    AND promRebotes > 3
ORDER BY promPuntos DESC , promAsistencias DESC , promRebotes DESC , e.nombreEquipo , j.nombre , j.apellido;


/*14) Dado un equipo y un partido, devolver cuantos puntos hizo cada equipo en cada
uno de los partidos que jugó como local. */

SELECT 
    e.nombreEquipo AS EqLocal,
    p.idPartido,
    SUM(jep.puntos) AS TotalPuntos
FROM
    Equipos e
        JOIN
    Partidos p ON e.idEquipo = p.idEquipoLocal
        JOIN
    Jugadores j ON j.idEquipo = e.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
        AND jep.idPartido = p.idPartido
GROUP BY e.idEquipo , p.idPartido
ORDER BY TotalPuntos DESC;


/*14) Dado un equipo y un partido, devolver cuantos puntos hizo cada equipo en cada
uno de los partidos que jugó, si fue local o visitante. */

SELECT 
    puntosL.nombreEquipo AS EqLocal,
    puntosVisit.nombreEquipo AS EqVisitante,
    p.idPartido,
    puntosL.TotalPuntosLocal AS TotalPuntosLocal,
    puntosVisit.TotalPuntosVisit AS TotalPuntosVisitante
FROM
    Partidos p
        JOIN
    (SELECT 
        e.nombreEquipo,
            p.idPartido,
            SUM(jep.puntos) AS TotalPuntosLocal
    FROM
        Equipos e
    JOIN Partidos p ON e.idEquipo = p.idEquipoLocal
    JOIN Jugadores j ON j.idEquipo = e.idEquipo
    JOIN JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
        AND jep.idPartido = p.idPartido
    GROUP BY e.idEquipo , p.idPartido) AS puntosL ON puntosL.idPartido = p.idPartido
        JOIN
    (SELECT 
        e.nombreEquipo,
            p.idPartido,
            SUM(jep.puntos) AS TotalPuntosVisit
    FROM
        Equipos e
    JOIN Partidos p ON e.idEquipo = p.idEquipoVisitante
    JOIN Jugadores j ON j.idEquipo = e.idEquipo
    JOIN JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
        AND jep.idPartido = p.idPartido
    GROUP BY e.idEquipo , p.idPartido) AS puntosVisit ON puntosVisit.idPartido = p.idPartido
GROUP BY p.idPartido , p.idEquipoLocal , p.idEquipoVisitante;




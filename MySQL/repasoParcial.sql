# Con el modelo de Museo, resuelva las siguientes consignas:
# ● Listar nombre y teléfonos de cada escuela.

use dbMuseo;

SELECT 
    e.escuela, IFNULL(t.telefono, 'no especificado')
FROM
    Escuelas e
        LEFT JOIN
    TelefonosEscuelas t ON e.idEscuela = t.idEscuela;

# ● Listar Nombre y cantidad de Reservas realizadas para cada Escuela durante el presente año.

SELECT 
    e.escuela, COUNT(r.idEscuela) AS cantReservas
FROM
    Escuelas e
        LEFT JOIN
    Reservas r ON e.idEscuela = r.idEscuela
GROUP BY e.idEscuela;


# ● Listar Nombre y cantidad de Reservas realizadas para cada Escuela durante el presente año, en caso
# de no haber realizado Reservas, mostrar el número cero.

SELECT 
    e.escuela, COUNT(r.idEscuela) AS cantReservas
FROM
    Escuelas e
        LEFT JOIN
    Reservas r ON e.idEscuela = r.idEscuela
WHERE
    YEAR(r.Fecha) = YEAR(NOW())
GROUP BY e.idEscuela;



SELECT 
    *
FROM
    Reservas;


# ● Listar el nombre de los Guías que participaron en las Visitas, pero no como Responsable.

SELECT 
    g.guia
FROM
    Guias g
        JOIN
    VisitasGuias vg ON vg.idGuia = g.idGuia
WHERE
    vg.responsable = 0
GROUP BY g.guia;

# ● Listar el nombre de los Guías que no participaron de ninguna Visita.

SELECT 
    g.guia
FROM
    Guias g
        LEFT JOIN
    VisitasGuias vg ON vg.idGuia = g.idGuia
WHERE
    vg.idGuia IS NULL
GROUP BY g.guia;


# ● Listar para cada Visita, el nombre de Escuela, el nombre del Guía responsable, la cantidad de
# alumnos que concurrieron y la fecha en que se llevó a cabo.

SELECT 
    r.idReserva, e.escuela, g.guia, v.alumnosReales, r.Fecha
FROM
    Visitas v
        JOIN
    Reservas r ON r.idReserva = v.idReserva
        JOIN
    VisitasGuias vg ON r.idReserva = vg.idReserva
        JOIN
    Guias g ON vg.idGuia = g.idGuia
        JOIN
    Escuelas e ON e.idEscuela = r.idEscuela
GROUP BY r.idReserva , e.escuela , g.guia , v.alumnosReales , r.Fecha;


# ● Listar el nombre de cada Escuela y su localidad. También deben aparecer las Localidades que no
# tienen Escuelas, indicando ‘Sin Escuelas’. Algunas Escuelas no tienen cargada la Localidad, debe
# indicar ‘Sin Localidad’.

SELECT 
    IFNULL(e.escuela, 'sin escuelas'),
    IFNULL(l.localidad, 'sin localidad')
FROM
    Escuelas e
        LEFT JOIN
    Localidades l ON l.idLocalidad = e.idLocalidad 
UNION SELECT 
    IFNULL(e.escuela, 'sin escuelas'),
    IFNULL(l.localidad, 'sin localidad')
FROM
    Localidades l
        LEFT JOIN
    Escuelas e ON l.idLocalidad = e.idLocalidad; 

# ● Listar el nombre de los Directores y el de los Guías, juntos, ordenados alfabéticamente.

SELECT 
    g.guia AS nombre
FROM
    Guias g 
UNION ALL SELECT 
    d.director AS nombre
FROM
    Directores d
ORDER BY nombre ASC;


# ● Listar el nombre de los Directores de las escuelas de Mar del Plata, y el de todos los Guías, juntos,
# ordenados alfabéticamente.


SELECT 
    g.guia AS nombre
FROM
    Guias g 
UNION ALL SELECT 
    d.director AS nombre
FROM
    Directores d
        JOIN
    Escuelas e ON e.director = d.idDirector
        JOIN
    Localidades l ON l.idLocalidad = e.idLocalidad
WHERE
    l.localidad = 'Mar del Plata'
ORDER BY nombre ASC;



################################################################################################

# 1) Listar los jugadores y a que equipo pertenecen (nombre, apellido ,
# nombre_equipo).

USE LigaBasquet;

SELECT 
    j.nombre, j.apellido, e.nombreEquipo
FROM
    Jugadores j
        JOIN
    Equipos e ON j.idEquipo = e.idEquipo
ORDER BY e.nombreEquipo;

# 2) Listar los equipos cuyo nombre comience con la letra P.

SELECT 
    e.nombreEquipo
FROM
    Equipos e
WHERE
    e.nombreEquipo LIKE 'P%';


# 3) Listar los jugadores que pertenezcan a un equipo que contenga una “LA” o
# “NY” en su nombre 

SELECT 
    e.nombreEquipo, j.nombre, j.apellido
FROM
    Equipos e
        JOIN
    Jugadores j ON j.idEquipo = e.idEquipo
WHERE
    e.nombreEquipo LIKE '%LA%'
        OR e.nombreEquipo LIKE '%NY%';


# 4) Listar los jugadores y su equipo siempre y cuando el jugador haya jugado al menos
# un partido.

SELECT 
    j.nombre, j.apellido, e.nombreEquipo
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
WHERE
    EXISTS( SELECT 
            idJugador
        FROM
            JugadoresEquiposPartidos)
GROUP BY j.nombre , j.apellido , e.nombreEquipo
ORDER BY e.nombreEquipo , j.nombre , j.apellido;


# 5) Listar los partidos con su fecha y los nombres de los equipos local y visitante.

SELECT 
    p.idPartido,
    e.nombreEquipo AS Local,
    ee.nombreEquipo AS Visitante,
    p.fecha
FROM
    Partidos p
        JOIN
    Equipos e ON p.idEquipoLocal = e.idEquipo
        JOIN
    Equipos ee ON p.idEquipoVisitante = ee.idEquipo
ORDER BY p.idPartido ASC;

# 6) Listar los equipos y la cantidad de jugadores que tiene .

SELECT 
    e.nombreEquipo, COUNT(j.idEquipo) AS cantJugadores
FROM
    Equipos e
        JOIN
    Jugadores j ON j.idEquipo = e.idEquipo
GROUP BY e.nombreEquipo;


# 7) Listar los jugadores y la cantidad de partidos que jugó.

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    COUNT(jep.idJugador) AS cantPartidos
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.nombre , j.apellido , e.nombreEquipo
ORDER BY e.nombreEquipo , j.nombre , j.apellido;


# 8) Elaborar un ranking con los jugadores que más puntos hicieron en el torneo .

SELECT 
    j.nombre, j.apellido, SUM(jep.puntos) AS cantPuntos
FROM
    Jugadores j
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.nombre , j.apellido
ORDER BY cantPuntos DESC;



# 9) Elaborar un ranking con los jugadores que más promedio de puntos tienen en el
# torneo.

SELECT 
    j.nombre, j.apellido, AVG(jep.puntos) AS promPuntos
FROM
    Jugadores j
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.nombre , j.apellido
ORDER BY promPuntos DESC;


# 10) Para cada jugador, mostrar la fecha del primer y último partido que jugo.

SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    MIN(p.fecha) AS primerP,
    MAX(p.fecha) AS ultimoP
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    Partidos p ON e.idEquipo = p.idEquipoLocal
        OR e.idEquipo = p.idEquipoVisitante
GROUP BY j.nombre , j.apellido
ORDER BY e.nombreEquipo ASC;

# 11)Listar los equipos que tengan registrados mas de 150 puntos

SELECT 
    e.nombreEquipo, SUM(jep.puntos) AS puntos
FROM
    Equipos e
        JOIN
    Jugadores j ON j.idEquipo = e.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY e.nombreEquipo
HAVING puntos > 150
ORDER BY puntos DESC;

# 12) Listar los jugadores que hayan dado más de 5 asistencias y promediado más de 10
# puntos por partido.

SELECT 
    j.nombre,
    j.apellido,
    AVG(jep.puntos) AS promP,
    SUM(jep.asistencias) AS asist
FROM
    Jugadores j
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.nombre , j.apellido
HAVING asist > 5 AND promP > 10
ORDER BY promP DESC , asist DESC;

# 13) Listar los jugadores que en promedio tengan más de 10 puntos, 3 asistencias y 1
# rebotes por partido.

SELECT 
    j.nombre,
    j.apellido,
    AVG(jep.puntos) AS promP,
    AVG(jep.asistencias) AS promAsist,
    AVG(jep.rebotes) AS promRebotes
FROM
    Jugadores j
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
GROUP BY j.nombre , j.apellido
HAVING promAsist > 3 AND promP > 10
    AND promRebotes > 1
ORDER BY promP DESC , promAsist DESC;

# 14) Dado un equipo y un partido, devolver cuantos puntos hizo cada equipo en cada
# uno de los partidos que jugo como local.

SELECT 
    e.nombreEquipo, p.idPartido, SUM(jep.puntos) AS puntos
FROM
    Equipos e
        JOIN
    Jugadores j ON j.idEquipo = e.idEquipo
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
        JOIN
    Partidos p ON e.idEquipo = p.idEquipoLocal
        AND jep.idPartido = p.idPartido
GROUP BY e.nombreEquipo , p.idPartido
ORDER BY puntos DESC;

#########################################################################################



# 1. Mostrar la información de todas las cervezas junto con el respectivo nombre de su receta segun corresponda.

USE Cervecerias;

SELECT 
    c.idCerveza, c.nombreCerveza, c.gradoAlcohol, r.nombreReceta
FROM
    Cervezas c
        JOIN
    Recetas r ON r.idCerveza = c.idCerveza;


# 2. listar 3 de las recetas que contengan mas de 5 ingredientes.

SELECT 
    r.nombreReceta, COUNT(ir.idReceta) AS cantIng
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON r.idReceta = ir.idReceta
GROUP BY r.nombreReceta
ORDER BY cantIng DESC
LIMIT 3;


# 3. ordenar los ingredientes de cada receta junto con el nombre de cada ingrediente de forma descendente.

SELECT 
    r.nombreReceta, i.nombreIngrediente
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
        JOIN
    Ingredientes i ON i.idIngrediente = ir.idIngrediente
ORDER BY r.nombreReceta ASC , i.nombreIngrediente DESC;


# 4. Consultar el Promedio de ingredientes de todas las recetas.

SELECT 
    COUNT(ir.idIngrediente) / COUNT(DISTINCT ir.idReceta) AS prom
FROM
    IngredientesRecetas ir;


# 5. Listar toda la informacion de cada una de las recetas y toda la informacion de los ingredientes.

SELECT 
    r.idReceta,
    r.nombreReceta,
    i.idIngrediente,
    i.nombreIngrediente
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON r.idReceta = ir.idReceta
        JOIN
    Ingredientes i ON i.idIngrediente = ir.idIngrediente
ORDER BY r.idReceta ASC;


# 6. Listar las cervezas que se encuentren entre la letras C y P, junto al nombre de su receta.

SELECT 
    c.nombreCerveza, r.nombreReceta
FROM
    Cervezas c
        JOIN
    Recetas r ON r.idCerveza = c.idCerveza
WHERE
    c.nombreCerveza > 'C'
        AND c.nombreCerveza < 'P';


# 7. Listar la Receta que mas ingredientes contenga.

SELECT 
    r.nombreReceta, COUNT(ir.idReceta) AS cantIng
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
GROUP BY r.nombreReceta
ORDER BY cantIng DESC
LIMIT 1;



# 8. Listar los 2 ingredientes que menos se utilizan (en menos recetas se encuentre).

SELECT 
    i.nombreIngrediente, COUNT(ir.idIngrediente) AS cantUsos
FROM
    Ingredientes i
        JOIN
    IngredientesRecetas ir ON i.idIngrediente = ir.idIngrediente
GROUP BY i.nombreIngrediente
ORDER BY cantUsos ASC
LIMIT 2;


# 9. Listar los Ingredientes que NO se utilicen en ninguna de las Recetas.

SELECT 
    i.nombreIngrediente
FROM
    Ingredientes i
        LEFT JOIN
    IngredientesRecetas ir ON ir.idIngrediente = i.idIngrediente
WHERE
    ir.idIngrediente IS NULL;



# ===================================================
# Realizar las siguientes Consultas con Subconsultas
# ===================================================

# 1. Mostrar el nombre del ingrediente del que mas cantidad haya.

SELECT 
    i.nombreIngrediente, COUNT(ir.idIngrediente) AS cant
FROM
    Ingredientes i
        JOIN
    IngredientesRecetas ir ON ir.idIngrediente = i.idIngrediente
WHERE
    i.idIngrediente = (SELECT 
            ir.idIngrediente
        FROM
            IngredientesRecetas ir
        ORDER BY COUNT(ir.idIngrediente) DESC
        LIMIT 1); 

# 2. Mostrar las Recetas que contengan un numero igual o menor al promedio total.

SELECT 
    r.nombreReceta, COUNT(ir.idReceta) AS cantIng
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
GROUP BY r.nombreReceta
HAVING cantIng >= (SELECT 
        COUNT(ir.idIngrediente) / COUNT(DISTINCT ir.idReceta)
    FROM
        IngredientesRecetas ir);


# 3. Listar las Cervezas que en su Receta contengan la mayor cantidad de Ingredientes.

SELECT 
    c.nombreCerveza, COUNT(ir.idReceta)
FROM
    Cervezas c
        JOIN
    Recetas r ON r.idCerveza = c.idCerveza
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
GROUP BY c.nombreCerveza
HAVING COUNT(ir.idReceta) = (SELECT 
        COUNT(ir.idReceta)
    FROM
        IngredientesRecetas ir
    GROUP BY ir.idReceta
    ORDER BY COUNT(ir.idReceta) DESC
    LIMIT 1);

SELECT 
    *
FROM
    IngredientesRecetas
ORDER BY idReceta;

# 4. Mostrar las Receta con el ID 3, junto con la cantidad de Ingredientes que posee y 
# en otra columna el promedio de ingredientes General.

SELECT 
    r.nombreReceta,
    COUNT(ir.idReceta) AS cantIng,
    (SELECT 
            COUNT(ir.idIngrediente) / COUNT(DISTINCT r.idReceta)
        FROM
            Recetas r
                JOIN
            IngredientesRecetas ir ON ir.idReceta = r.idReceta) AS prom
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
WHERE
    r.idReceta = 3
GROUP BY r.nombreReceta;

# 5. Mostrar las Recetas que superen el Promedio de ingredientes general (Simular Having).


SELECT 
    r.nombreReceta, COUNT(ir.idReceta) AS cantIng
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
GROUP BY r.nombreReceta
HAVING COUNT(ir.idReceta) > (SELECT 
        COUNT(ir.idIngrediente) / COUNT(DISTINCT r.idReceta)
    FROM
        Recetas r
            JOIN
        IngredientesRecetas ir ON ir.idReceta = r.idReceta);




######################################################################################
# En base al modelo de datos propuesto realizar las siguientes actividades :
# 1) Generar un Stored Procedure que permite ingresar un equipo.

use LigaBasquet;

DROP PROCEDURE IF EXISTS InsertarEquipo;
DELIMITER $$

CREATE PROCEDURE InsertarEquipo (IN nombreEq VARCHAR(50))
BEGIN 
	INSERT INTO Equipos(nombreEquipo) VALUES (nombreEq);
END $$

CALL InsertarEquipo('Orlando Magik');
SELECT * FROM Equipos;

UPDATE Equipos SET nombreEquipo = 'Orlando Magic' WHERE nombreEquipo = 'Orlando Magik';
DELETE FROM Equipos WHERE nombreEquipo = 'Orlando Magic';


# 2) Generar un Stored Procedure que permita agregar un jugador pero se debe pasar el
# nombre del equipo y no el Id.

DROP PROCEDURE IF EXISTS InsertarJugadorXnombreEq;
DELIMITER $$

CREATE PROCEDURE InsertarJugadorXnombreEq (IN nombreJ VARCHAR(50), IN apellidoJ VARCHAR(50), IN nombreEq VARCHAR (50))
BEGIN
	DECLARE EquipoId INT;
    SELECT e.idEquipo INTO EquipoId FROM Equipos e WHERE e.nombreEquipo = nombreEq;
    
    INSERT INTO Jugadores (idEquipo, nombre, apellido) VALUES (EquipoId, nombreJ, apellidoJ);
END $$

CALL InsertarJugadorXnombreEq( 'Magic', 'Johnson','Orlando Magic');


SELECT 
    j.nombre, j.apellido, e.nombreEquipo
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
WHERE
    e.nombreEquipo = 'Orlando Magic';


# 3) Generar un Stored Procedure que liste los partidos de un mes y año, pasado por
# parametro.

DROP PROCEDURE IF EXISTS ListarPartidosMesAnio;
DELIMITER $$

CREATE PROCEDURE ListarPartidosMesAnio (IN mes INT, IN anio INT)

BEGIN
	SELECT p.idPartido, e.nombreEquipo as EqLocal, ee.nombreEquipo as EqVisitante
    FROM Partidos p
    JOIN Equipos e ON e.idEquipo = p.idEquipoLocal
    JOIN Equipos ee ON ee.idEquipo = p.idEquipoVisitante
    WHERE YEAR(p.fecha) = anio AND MONTH(p.fecha) = mes;
END $$

CALL ListarPartidosMesAnio(12,2020);


# 4) Generar un Stored Procedure que devuelva el resultado de un partido pasando por
# parámetro los nombres de los equipos. El resultado debe ser devuelto en dos
# variables output

DROP PROCEDURE IF EXISTS ResultadoPartido;
DELIMITER $$

CREATE PROCEDURE ResultadoPartido (IN eqLocal VARCHAR(50), IN eqVisit VARCHAR(50), OUT ptsLocal INT, OUT ptsVisit INT)
BEGIN
	DECLARE idL INT;
    DECLARE idV INT;
    DECLARE idP INT;
    
    SELECT idEquipo INTO idL FROM Equipos WHERE nombreEquipo = eqLocal;
	SELECT idEquipo INTO idV FROM Equipos WHERE nombreEquipo = eqVisit;
	SELECT idPartido INTO idP FROM Partidos WHERE idEquipoLocal = idL
    AND idEquipoVisitante = idV;


    SELECT SUM(jep.puntos) INTO ptsLocal FROM JugadoresEquiposPartidos jep 
		JOIN Jugadores j ON j.idJugador = jep.idJugador
        WHERE j.idEquipo = idL AND jep.idPartido = idP;
    
 
    SELECT SUM(jep.puntos) INTO ptsVisit FROM JugadoresEquiposPartidos jep 
		JOIN Jugadores j ON j.idJugador = jep.idJugador
        WHERE j.idEquipo = idV AND jep.idPartido = idP;
        
END $$

CALL ResultadoPartido('Boston Celtics', 'NY Knicks', @loc, @vis);

SELECT @loc as ptsLocal, @vis as ptsVisit;


# 5) Generar un stored procedure que muestre las estadisticas promedio de los jugadores
# de un equipo.


DROP PROCEDURE IF EXISTS EstadisticasJugadores;
DELIMITER $$

CREATE PROCEDURE EstadisticasJugadores(IN nombreEq VARCHAR(50), OUT promPuntos INT, OUT promAsist INT, OUT promReb INT, OUT promFaltas INT)
BEGIN

DECLARE EqId INT;

SELECT idEquipo INTO EqId FROM Equipos WHERE nombreEquipo = nombreEq;

SELECT AVG(puntos) INTO promPuntos
FROM JugadoresEquiposPartidos jep
JOIN Jugadores j
ON j.idJugador = jep.idJugador
WHERE j.idEquipo = EqId;

SELECT AVG(asistencias) INTO promAsist
FROM JugadoresEquiposPartidos jep
JOIN Jugadores j
ON j.idJugador = jep.idJugador
WHERE j.idEquipo = EqId;

SELECT AVG(rebotes) INTO promReb
FROM JugadoresEquiposPartidos jep
JOIN Jugadores j
ON j.idJugador = jep.idJugador
WHERE j.idEquipo = EqId;

SELECT AVG(faltas) INTO promFaltas
FROM JugadoresEquiposPartidos jep
JOIN Jugadores j
ON j.idJugador = jep.idJugador
WHERE j.idEquipo = EqId;

END $$


CALL EstadisticasJugadores ('NY Knicks', @pts, @asist, @reb, @fouls);

SELECT 'NY KNICKS' AS equipo, @pts as PromPuntos, @asist as PromAsistencias, @reb as PromRebotes, @fouls as PromFaltas;
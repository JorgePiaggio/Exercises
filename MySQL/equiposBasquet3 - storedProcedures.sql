USE LigaBasquet;

/* 1) Generar un Stored Procedure que permite ingresar un equipo.*/

DROP PROCEDURE IF EXISTS Insertar;

DELIMITER $$
CREATE PROCEDURE Insertar(IN nombre_Equipo VARCHAR(50))
BEGIN
	INSERT Equipos(nombreEquipo) VALUES (nombre_Equipo);
END $$

CALL Insertar('Atlanta Hawks');
SELECT * FROM Equipos;

/* 2) Generar un Stored Procedure que permita agregar un jugador pero se debe pasar el
nombre del equipo y no el Id.*/

DROP PROCEDURE IF EXISTS InsertarJugador;
DELIMITER $$
CREATE PROCEDURE InsertarJugador(IN nombre_Equipo VARCHAR(50), IN nombre VARCHAR(50), IN apellido VARCHAR(50))
BEGIN 
	DECLARE equipoId INT;
    
    SET equipoId = (SELECT idEquipo FROM Equipos WHERE nombreEquipo = nombre_Equipo);
    
    INSERT Jugadores(idEquipo, nombre, apellido) VALUES (equipoId, nombre, apellido);
END $$

CALL InsertarJugador('Atlanta Hawks', 'John', 'Hammer');

SELECT * FROM Jugadores WHERE idEquipo = 11;


/* 3) Generar un Stored Procedure que liste los partidos de un mes y año, pasado por
parametro.*/

DROP PROCEDURE IF EXISTS ListarPartidosMesAnio;
DELIMITER $$

CREATE PROCEDURE ListarPartidosMesAnio(mes INT, anio INT)
BEGIN 
	SELECT 
		p.fecha,
        p.idPartido,
        e.nombreEquipo as EqLocal,
        ee.nombreEquipo as EqVisitante
	FROM Partidos p
    JOIN Equipos e 
    ON p.idEquipoLocal = e.idEquipo
    JOIN Equipos ee
    ON p.idEquipoVisitante = ee.idEquipo
	WHERE YEAR(p.fecha) = anio AND MONTH(p.fecha) = mes;
END $$

CALL ListarPartidosMesAnio(12, 2020);
SELECT * FROM Partidos;


/* 4) Generar un Stored Procedure que devuelva el resultado de un partido pasando por
parámetro los nombres de los equipos. El resultado debe ser devuelto en dos
variables output*/

DROP PROCEDURE IF EXISTS Resultado;
DELIMITER $$

CREATE PROCEDURE Resultado(IN eqLocal VARCHAR(50), IN eqVisit VARCHAR(50),
							OUT ptsLocal INT, OUT ptsVisit INT)
BEGIN
		DECLARE vIdLocal INT;
        DECLARE vIdVisit INT;
        DECLARE vIdPartido INT;
	
		SELECT idEquipo INTO vIdLocal FROM Equipos WHERE nombreEquipo = eqLocal;
        SELECT idEquipo INTO vIdVisit FROM Equipos WHERE nombreEquipo = eqVisit;
        SELECT idPartido INTO vIdPartido FROM Partidos WHERE idEquipoLocal = vIdLocal AND idEquipoVisitante = vIdVisit;
        
        SELECT SUM(puntos) INTO ptsLocal
        FROM JugadoresEquiposPartidos jep
        JOIN Jugadores j
        ON jep.idJugador = j.idJugador
        WHERE j.idEquipo = vIdLocal AND jep.idPartido = vIdPartido;
		
		SELECT SUM(puntos) INTO ptsVisit
        FROM JugadoresEquiposPartidos jep
        JOIN Jugadores j
        ON jep.idJugador = j.idJugador
        WHERE j.idEquipo = vIdVisit AND jep.idPartido = vIdPartido;
END $$


CALL Resultado('Pheonix Suns', 'Chicago Bulls', @suns, @bulls);
SELECT @suns;
SELECT 'Suns' AS Equipo, @suns AS Puntos
UNION 
SELECT 'Bulls', @bulls
        
        
/* 5) Generar un stored procedure que muestre las estadisticas promedio de los jugadores
de un equipo.*/

DROP PROCEDURE IF EXISTS EstadisticaEquipo;
DELIMITER $$

CREATE PROCEDURE EstadisticaEquipo(IN nombreEq VARCHAR (50), OUT pts INT, OUT reb INT, OUT asist INT, OUT fouls INT)
BEGIN
	DECLARE equipoId INT;
    
    SELECT idEquipo INTO equipoId FROM Equipos WHERE nombreEquipo = nombreEq;
    
    SELECT AVG(puntos) INTO pts
	FROM JugadoresEquiposPartidos jep
    JOIN Jugadores j
    ON j.idJugador = jep.idJugador
    WHERE j.idEquipo = equipoId;
    
    SELECT AVG(asistencias) INTO asist
	FROM JugadoresEquiposPartidos jep
    JOIN Jugadores j
    ON j.idJugador = jep.idJugador
    WHERE j.idEquipo = equipoId;
    
    SELECT AVG(rebotes) INTO reb
	FROM JugadoresEquiposPartidos jep
    JOIN Jugadores j
    ON j.idJugador = jep.idJugador
    WHERE j.idEquipo = equipoId;
    
    SELECT AVG(faltas) INTO fouls
	FROM JugadoresEquiposPartidos jep
    JOIN Jugadores j
    ON j.idJugador = jep.idJugador
    WHERE j.idEquipo = equipoId;
			
END $$    

CALL EstadisticaEquipo('LA Lakers', @pts, @reb, @asist, @fouls);

SELECT 'LA Lakers' AS Equipo, @pts AS PromPuntos,
@reb AS PromRebs,
@asist AS PromAsist,
@fouls AS PromFouls;
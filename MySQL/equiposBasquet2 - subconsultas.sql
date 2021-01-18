USE LigaBasquet;

/* 1) Generar​ ​ una​ ​ consulta​ ​ para​ ​ conocer​ ​ los​ ​ jugadores​ ​ y ​ ​ cuantos​ ​ puntos​ ​, ​ ​ rebotes,
asistencias​ ​ y ​ ​ faltas​ ​ hicieron​ ​ de​ ​ promedio.​ ​ Listar​ ​ los​ ​ mejores​ ​ 5 ​ ​ y ​ ​ los​ ​ peores​ ​ 5 ​ ​ en​ ​ base
a​ ​ un​ ​ coeficiente​ ​ (promedio*1​ ​ + ​ ​ rebotes*0.5​ ​ + ​ ​ asistencias*0.5​ ​ + ​ ​ (faltas​ ​ * ​ ​ -1))​ ​ .
Identificar​ ​ cada​ ​ grupo​ ​ diciendo​ ​ si​ ​ está​ ​ entre​ ​ los​ ​ mejores​ ​ 5 ​ ​ o ​ ​ los​ ​ peores​ ​ 5.*/

SELECT 
    j.nombre,
    j.apellido,
    mejores.Coeficiente AS Coeficiente,
    CASE
        WHEN mejores.Coeficiente THEN 'TOP 5'
    END AS 'Rank'
FROM
    Jugadores j
        JOIN
    (SELECT 
        j.idJugador,
            (AVG(jep.puntos) * 1 + AVG(jep.asistencias) * 0.5 + AVG(jep.rebotes) * 0.5 + AVG(jep.faltas) * (- 1)) AS Coeficiente
    FROM
        Jugadores j
    JOIN JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
    GROUP BY j.idJugador
    ORDER BY Coeficiente DESC
    LIMIT 5) AS mejores ON j.idJugador = mejores.idJugador 
UNION ALL SELECT 
    j.nombre,
    j.apellido,
    peores.Coeficiente AS Coeficiente,
    CASE
        WHEN peores.Coeficiente THEN 'BOTTOM 5'
    END AS 'Rank'
FROM
    Jugadores j
        JOIN
    (SELECT 
        j.idJugador,
            (AVG(jep.puntos) * 1 + AVG(jep.asistencias) * 0.5 + AVG(jep.rebotes) * 0.5 + AVG(jep.faltas) * (- 1)) AS Coeficiente
    FROM
        Jugadores j
    JOIN JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
    GROUP BY j.idJugador
    ORDER BY Coeficiente ASC
    LIMIT 5) AS peores ON j.idJugador = peores.idJugador
ORDER BY Coeficiente DESC;


/* 2) Generar​ ​ la​ ​ consulta​ ​ del​ ​ punto​ ​ 1 ​ ​ pero​ ​ tomando​ ​ en​ ​ cuenta​ ​ los​ ​ puntos.*/

SELECT 
    j.nombre,
    j.apellido,
    mejores.Coeficiente AS PromPuntos,
    CASE
        WHEN mejores.Coeficiente THEN 'TOP 5'
    END AS 'Rank'
FROM
    Jugadores j
        JOIN
    (SELECT 
        j.idJugador, AVG(jep.puntos) AS Coeficiente
    FROM
        Jugadores j
    JOIN JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
    GROUP BY j.idJugador
    ORDER BY Coeficiente DESC
    LIMIT 5) AS mejores ON j.idJugador = mejores.idJugador 
UNION ALL SELECT 
    j.nombre,
    j.apellido,
    peores.Coeficiente AS PromPuntos,
    CASE
        WHEN peores.Coeficiente THEN 'BOTTOM 5'
    END AS 'Rank'
FROM
    Jugadores j
        JOIN
    (SELECT 
        j.idJugador, AVG(jep.puntos) AS Coeficiente
    FROM
        Jugadores j
    JOIN JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
    GROUP BY j.idJugador
    ORDER BY Coeficiente ASC
    LIMIT 5) AS peores ON j.idJugador = peores.idJugador
ORDER BY PromPuntos DESC;


/* 3) Generar​ ​ una​ ​ consulta​ ​ que​ ​ nos​ ​ devuelva​ ​ el​ ​ resultado​ ​ de​ ​ un​ ​ partido.*/

SELECT 
    p.idPartido,
    loc.nombreEquipo AS EqLocal,
    vis.nombreEquipo AS EqVisitante,
    loc.Puntos AS PtsLocal,
    vis.Puntos AS PtsVisitante
FROM
    Partidos p
        JOIN
    (SELECT 
        p.idPartido, e.nombreEquipo, SUM(jep.puntos) AS Puntos
    FROM
        Equipos e
    JOIN Jugadores j ON e.idEquipo = j.idEquipo
    JOIN Partidos p ON p.idEquipoLocal = e.idEquipo
    JOIN JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
        AND jep.idPartido = p.idPartido
    GROUP BY p.idPartido , e.nombreEquipo) AS loc ON loc.idPartido = p.idPartido
        JOIN
    (SELECT 
        p.idPartido, e.nombreEquipo, SUM(jep.puntos) AS Puntos
    FROM
        Equipos e
    JOIN Jugadores j ON e.idEquipo = j.idEquipo
    JOIN Partidos p ON p.idEquipoVisitante = e.idEquipo
    JOIN JugadoresEquiposPartidos jep ON jep.idJugador = j.idJugador
        AND jep.idPartido = p.idPartido
    GROUP BY p.idPartido , e.nombreEquipo) AS vis ON vis.idPartido = p.idPartido
GROUP BY p.idPartido , loc.nombreEquipo , vis.nombreEquipo;


/* 4) Generar​ ​ una​ ​ consulta​ ​ que​ ​ nos​ ​ permita​ ​ conocer​ ​ los​ ​ jugadores​ ​ que​ ​ hicieron​ ​ más
puntos​ ​ en​ ​ un​ ​ partido​ ​ y ​ ​ en​ ​ qué​ ​ partido​ ​ lo​ ​ hicieron​ ​ (Poner​ ​ Equipo​ ​ Local​ ​ y ​ ​ Equipo
Visitante).*/

SELECT 
    j.nombre, j.apellido, e.nombreEquipo, puntos, Cond
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    Partidos p ON p.idPartido = 1
        JOIN
    (SELECT 
        j.idJugador,
            j.nombre,
            j.apellido,
            e.nombreEquipo,
            CASE
                WHEN e.idEquipo = p.idEquipoLocal THEN 'L'
                ELSE 'V'
            END AS Cond,
            SUM(jep.puntos) puntos
    FROM
        Jugadores j
    JOIN Equipos e ON e.idEquipo = j.idEquipo
    JOIN Partidos p ON p.idPartido = 1
        AND e.idEquipo = p.idEquipoLocal
    JOIN JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
        AND p.idPartido = jep.idPartido
    GROUP BY j.nombre , j.apellido , p.idPartido
    ORDER BY puntos DESC
    LIMIT 1) AS Loc ON j.idJugador = Loc.idJugador 
UNION ALL (SELECT 
    j.nombre,
    j.apellido,
    e.nombreEquipo,
    SUM(jep.puntos) puntos,
    CASE
        WHEN e.idEquipo = p.idEquipoLocal THEN 'L'
        ELSE 'V'
    END AS Cond
FROM
    Jugadores j
        JOIN
    Equipos e ON e.idEquipo = j.idEquipo
        JOIN
    Partidos p ON p.idPartido = 1
        AND e.idEquipo = p.idEquipoVisitante
        JOIN
    JugadoresEquiposPartidos jep ON j.idJugador = jep.idJugador
        AND p.idPartido = jep.idPartido
GROUP BY j.nombre , j.apellido , p.idPartido
ORDER BY puntos DESC
LIMIT 1);



/* 5)  Listar los equipos y en el mismo registro listar cual es el jugador con el mayor
promedio de puntos. 
*/

SELECT j.idEquipo, e.nombreEquipo, t.idJugador, j.nombre, j.apellido, t.promedio as PromPuntos
FROM
(SELECT jep.idJugador, AVG(puntos) as promedio
FROM JugadoresEquiposPartidos jep
GROUP BY jep.idJugador
ORDER BY promedio DESC) as t
JOIN Jugadores j on j.idJugador = t.idJugador
JOIN Equipos e ON e.idEquipo = j.idEquipo
GROUP BY j.idEquipo 
HAVING MAX(t.promedio);



/* 8) Listar los equipos en el mismo registro listar cual es el jugador que hizo más puntos
en un partido, cuantos puntos y en qué partido lo hizo
*/

SELECT * FROM
(SELECT jep.idJugador,j.nombre, j.apellido, e.nombreEquipo, jep.puntos AS Puntos, jep.idPartido
FROM JugadoresEquiposPartidos jep
JOIN Jugadores j ON j.idJugador = jep.idJugador
JOIN Equipos e ON e.idEquipo = j.idEquipo
GROUP BY jep.idPartido, jep.idJugador
HAVING MAX(jep.puntos)) as t
GROUP BY t.nombreEquipo
ORDER BY Puntos DESC;
use dbMuseo;

/*Listar la cantidad de Reservas realizadas para cada Escuela, ordenar el resultado por identificador
de Escuela.*/

SELECT 
    e.idEscuela,
    e.escuela,
    IFNULL(COUNT(r.idEscuela), 0) AS cantReservas
FROM
    Escuelas e
        LEFT JOIN
    Reservas r ON r.idEscuela = e.idEscuela
GROUP BY e.idEscuela
ORDER BY e.idEscuela;


/*Listar la cantidad de Reservas realizadas para cada Escuela, en cada mes.*/

SELECT 
    e.idEscuela,
    e.escuela,
    IFNULL(COUNT(r.idEscuela), 0) AS cantReservas,
    IFNULL(YEAR(r.fecha), '-') AS año,
    IFNULL(MONTH(r.fecha), '-') AS mes
FROM
    Escuelas e
        LEFT JOIN
    Reservas r ON r.idEscuela = e.idEscuela
GROUP BY YEAR(r.fecha) , MONTH(r.fecha) , e.idEscuela
ORDER BY YEAR(r.fecha) , MONTH(r.fecha) , e.idEscuela , cantReservas DESC;


/*Listar para cada Reserva, la cantidad total de Alumnos para los que se reservó y la cantidad total de Alumnos que concurrieron en realidad.*/

SELECT 
    r.idReserva,
    IFNULL(v.alumnos, 'No especificado') AS alumnosReservados,
    IFNULL(v.alumnosReales, 'No especificado') AS alumnosConcurridos
FROM
    Reservas r
        LEFT JOIN
    Visitas v ON v.idReserva = r.idReserva
ORDER BY r.idReserva;


/*Listar para cada Escuela, la primera y la última fecha de Reserva, ordenar el resultado por
identificador de Escuela en forma descendente.*/

SELECT 
    e.idEscuela,
    e.escuela,
    IFNULL(MIN(r.fecha), '-') AS primeraReserva,
    IFNULL(MAX(r.fecha), '-') AS ultimaReserva
FROM
    Escuelas e
        LEFT JOIN
    Reservas r ON e.idEscuela = r.idEscuela
GROUP BY e.idEscuela
ORDER BY e.idEscuela DESC;


/*Listar para cada Guía, la cantidad de reservas en las que participó.*/

SELECT 
    g.guia, IFNULL(COUNT(vg.idGuia), 0) AS cantReservas
FROM
    Guias g
        LEFT JOIN
    VisitasGuias vg ON g.idGuia = vg.idGuia
GROUP BY g.idGuia;


/*Listar para cada Guía, la cantidad de reservas de día completo en las que participó.*/

SELECT 
    *
FROM
    TipoVisitas;

SELECT 
    g.guia, IFNULL(COUNT(vg.idGuia), 0) AS cantReservas
FROM
    Guias g
        LEFT JOIN
    VisitasGuias vg ON g.idGuia = vg.idGuia
WHERE
    idTipoVisita = 3
GROUP BY g.idGuia;


/*Listar para cada Guía, la cantidad de reservas de día completo en las que participó, cuando haya
superado las 2 (dos) participaciones.*/

SELECT 
    g.guia, IFNULL(COUNT(vg.idGuia), 0) AS cantReservas
FROM
    Guias g
        LEFT JOIN
    VisitasGuias vg ON g.idGuia = vg.idGuia
WHERE
    idTipoVisita = 3
GROUP BY g.idGuia
HAVING cantReservas > 2;


/*Listar el Guía que haya participado en mayor cantidad de reservas.*/

SELECT 
    g.guia, COUNT(vg.idGuia) AS cantReservas
FROM
    Guias g
        JOIN
    VisitasGuias vg ON vg.idGuia = g.idGuia
GROUP BY g.idGuia
ORDER BY cantReservas DESC
LIMIT 1;


/*Listar las Escuelas que hayan hecho reservas en el mes de noviembre de 2020. Tener en cuenta que
las Escuelas pueden realizar más de una reserva mensual.*/

SELECT 
    *
FROM
    Reservas;

SELECT 
    e.escuela, r.fecha
FROM
    Escuelas e
        JOIN
    Reservas r ON e.idEscuela = r.idEscuela
WHERE
    YEAR(r.fecha) = '2020'
        AND MONTH(r.fecha) = '11';

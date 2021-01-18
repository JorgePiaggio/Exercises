use dbMuseo;

/* ● Listar Código y Nombre de cada Escuela, y obtener la cantidad de Reservas realizadas con una subconsulta.*/

SELECT 
    e.idEscuela,
    e.escuela,
    (SELECT 
            IFNULL(COUNT(r.idEscuela), 0)
        FROM
            Reservas r
        WHERE
            r.idEscuela = e.idEscuela) AS cantReservas
FROM
    Escuelas e;


/* ● Listar Código y Nombre de cada Escuela, y obtener la cantidad de Reservas realizadas durante el
presente año, con una subconsuta. En caso de no haber realizado Reservas, mostrar el número
cero.*/

SELECT 
    *
FROM
    Reservas;

SELECT 
    e.idEscuela,
    e.escuela,
    (SELECT 
            IFNULL(COUNT(r.idEscuela), 0)
        FROM
            Reservas r
        WHERE
            r.idEscuela = e.idEscuela
                AND YEAR(r.fecha) = '2020') AS cantReservas2020
FROM
    Escuelas e;


/* ● Para cada Tipo de Visita, listar el nombre y obtener con una subconsulta como tabla derivada la
cantidad de Reservas realizadas.*/

SELECT 
    tv.tipoVisita, cantidades.cant
FROM
    TipoVisitas tv
        JOIN
    (SELECT 
        IFNULL(COUNT(v.idTipoVisita), 0) AS cant, v.idTipoVisita
    FROM
        Visitas v
    GROUP BY v.idTipoVisita) AS cantidades ON tv.idTipoVisita = cantidades.idTipoVisita;


/* ● Para cada Guía, listar el nombre y obtener con una subconsulta como tabla derivada la cantidad de
Visitas en las que participó como Responsable. En caso de no haber participado en ninguna,
mostrar el número cero.*/

SELECT g.guia, IFNULL(vis.cantidadVisitas,0) as cantVisitas
FROM Guias g
LEFT JOIN (SELECT COUNT(vg.idGuia) as cantidadVisitas, vg.idGuia
			FROM VisitasGuias vg
            WHERE responsable = 1
            GROUP BY vg.idGuia) as vis
ON vis.idGuia = g.idGuia;


/* ● Para cada Escuela, mostrar el nombre y la cantidad de Reservas realizadas el último año que
visitaron el Museo. Resolver con subconsulta correlacionada.*/

SELECT e.escuela, (SELECT IFNULL(COUNT(r.idEscuela),0) 
FROM Reservas r
WHERE e.idEscuela = r.idEscuela
AND YEAR(r.fecha) = (SELECT MAX(YEAR(r.fecha)) FROM Reservas r WHERE YEAR(r.fecha) <= YEAR(now()))) as cantReservas
FROM Escuelas e;

SELECT e.escuela, IFNULL(COUNT(r.idEscuela),0) as cant
FROM Escuelas e
LEFT JOIN Reservas r
ON e.idEscuela = r.idEscuela
WHERE YEAR(r.fecha) = (SELECT MAX(YEAR(r.fecha)) FROM Reservas r WHERE YEAR(r.fecha) <= YEAR(now()))
GROUP BY e.escuela;


/* ● Listar el nombre de las Escuelas que realizaron Reservas. Resolver con Exists.*/

SELECT e.escuela
FROM Escuelas e
WHERE EXISTS (SELECT r.idEscuela FROM Reservas r WHERE e.idEscuela = r.idEscuela);


/* ● Listar el nombre de las Escuelas que realizaron Reservas. Resolver con IN.*/

SELECT e.escuela
FROM Escuelas e
WHERE e.idEscuela IN (SELECT r.idEscuela FROM Reservas r WHERE e.idEscuela = r.idEscuela);



use dbMuseo;

INSERT INTO Reservas(idEscuela, fecha) VALUES
	(1, '2020-11-28'),
   	(1, '2020-11-12'),
	(1, '2020-11-01'),
	(6, '2020-11-21'),
	(6, '2020-11-03'),
	(6, '2020-11-04'),
	(6, '2020-11-10');
INSERT INTO Visitas(idReserva, idTipoVisita, grado, alumnos, alumnosReales) VALUES
	(7, 3, '3° A', 42, 40),
    (11, 3, '6° A', 33, 30),
    (12, 1, '6 B', 32, 32),
    (13, 2, '9°', 37, 35),
	(14, 2, '1° C', 30, 22),
	(17, 2, '5° B', 25, 23),
    (19, 1, '5° A', 26, 26);
INSERT INTO VisitasGuias(idReserva, idTipoVisita, idGuia, responsable) VALUES
	(7, 3, 1, 1),
    (11, 3, 1, 0),
    (12, 1, 3, 1),
	(14, 2, 2, 1),
	(17, 2, 4, 0),
    (19, 1, 4, 0);

    
SELECT * FROM TipoVisitas;
SELECT * FROM Visitas;
SELECT * FROM VisitasGuias;
SELECT * FROM Reservas;


UPDATE Visitas 
SET 
    arancel = 55.25 * alumnosReales
WHERE
    idTipoVisita = 1;
    
UPDATE Visitas 
SET 
    arancel = 75.90 * alumnosReales
WHERE
    idTipoVisita = 2;
    
UPDATE Visitas 
SET 
    arancel = 150.0 * alumnosReales
WHERE
    idTipoVisita = 3;


/* ● Listar las escuelas que tengan más de 3 reservas en el último mes.*/
    
SELECT e.escuela, COUNT(r.idEscuela) as cantidadR
FROM Escuelas e
JOIN Reservas r
on e.idEscuela = r.idEscuela
WHERE (YEAR(r.fecha) = '2020' AND MONTH(r.fecha) = '11')
GROUP BY escuela
HAVING cantidadR > 3 ;


/* ● Listar las 3 escuelas que hayan asistido con la mayor cantidad de alumnos reales.*/

SELECT escuela, SUM(v.alumnosReales) as cantidadAlumnos
FROM Escuelas e
JOIN Reservas r 
ON r.idEscuela = e.idEscuela
JOIN Visitas v
ON v.idReserva = r.idReserva
GROUP BY escuela
ORDER BY cantidadAlumnos DESC
LIMIT 3;


/* ● Listar los tipos de visita más realizados en los últimos 2 meses en orden ascendente.*/

SELECT t.idTipoVisita, t.tipoVisita, COUNT(v.idTipoVisita) as cantidad
FROM TipoVisitas t
JOIN Visitas v
ON t.idTipoVisita = v.idTipoVisita
JOIN Reservas r
ON r.idReserva = v.idReserva
WHERE YEAR(r.fecha) = '2020' AND MONTH(r.fecha) IN ('10','11')
GROUP BY t.tipoVisita
ORDER BY cantidad ASC;

/* ● Listar los guías con menor cantidad de visitas guiadas en cada escuela.*/

SELECT MIN(vg.idGuia), g.guia, e.escuela
FROM VisitasGuias vg
JOIN Visitas v 
ON v.idReserva = vg.idReserva
JOIN Reservas r 
ON r.idReserva = v.idReserva
JOIN Guias g 
ON g.idGuia = vg.idGuia
JOIN Escuelas e
ON e.idEscuela = r.idEscuela
GROUP BY e.escuela
HAVING COUNT(v.idReserva) >= 1;

SELECT idGuia, COUNT(idGuia)
FROM VisitasGuias
GROUP BY idGuia;

/* ● Listar los grados con gastos superiores a los $1000 en los últimos 3 meses.*/

SELECT v.grado, SUM(v.arancel) as gastos
FROM Visitas v
JOIN Reservas r
ON r.idReserva = v.idReserva
WHERE YEAR(r.fecha) = '2020' AND MONTH(r.fecha) IN ('9','10','11')
GROUP BY grado
HAVING gastos > 1000
ORDER BY gastos DESC;

/* ● Listar de mayor a menor las Localidades con mayor cantidad de reservas por escuela en
los últimos 2 meses.*/

SELECT l.localidad, COUNT(e.idEscuela) as cant
FROM Localidades l
JOIN Escuelas e
ON e.idLocalidad = l.idLocalidad
JOIN Reservas r 
ON r.idEscuela = e.idEscuela
WHERE YEAR(r.fecha) = '2020' 
GROUP BY l.localidad
ORDER BY cant DESC;

/*check*/
SELECT l.localidad, COUNT(e.idLocalidad)
FROM Localidades l
JOIN Escuelas e
ON l.idLocalidad = e.idLocalidad
GROUP BY l.localidad;

/* ● Listar la suma y el promedio de lo gastado por cada escuela ordenado por fecha.*/

SELECT e.escuela, SUM(v.arancel), AVG(v.arancel)
FROM Visitas v 
JOIN Reservas r
ON r.idReserva = v.idReserva
JOIN Escuelas e
ON e.idEscuela = r.idEscuela
GROUP BY escuela
ORDER BY r.fecha DESC;
use dbMuseo;

/* Con el modelo de Museo, resuelva las siguientes consignas:*/

/* ● Listar nombre y teléfonos de cada escuela.*/

SELECT e.escuela, IFNULL(t.telefono, '-')
FROM Escuelas e
LEFT JOIN TelefonosEscuelas t
ON e.idEscuela = t.idEscuela;


/* ● Listar Nombre y cantidad de Reservas realizadas para cada Escuela durante el presente año.*/

SELECT e.escuela, COUNT(r.idEscuela) as cantReservas
FROM Escuelas e
LEFT JOIN Reservas r
ON r.idEscuela = e.idEscuela
GROUP BY e.escuela;


/* ● Listar Nombre y cantidad de Reservas realizadas para cada Escuela durante el presente año, en caso
de no haber realizado Reservas, mostrar el número cero.*/



/* ● Listar el nombre de los Guías que participaron en las Visitas, pero no como Responsable.*/



/* ● Listar el nombre de los Guías que no participaron de ninguna Visita.*/

SELECT g.guia
FROM Guias g
LEFT JOIN VisitasGuias v
ON v.idGuia = g.idGuia
WHERE v.idGuia IS NULL;

SELECT * FROM VisitasGuias;
SELECT * FROM Guias;

SELECT g.guia, COUNT(v.idGuia) as cantVisitas
FROM Guias g
LEFT JOIN VisitasGuias v
ON v.idGuia = g.idGuia
GROUP BY g.guia;


/* ● Listar para cada Visita, el nombre de Escuela, el nombre del Guía responsable, la cantidad de
alumnos que concurrieron y la fecha en que se llevó a cabo.*/

SELECT v.idReserva, e.escuela, g.guia, v.alumnosReales, r.fecha
FROM Visitas v
JOIN Reservas r
ON r.idReserva = v.idReserva
JOIN Escuelas e
ON e.idEscuela = r.idEscuela
JOIN VisitasGuias vg
ON r.idReserva = vg.idReserva
JOIN Guias g
ON g.idGuia = vg.idGuia
GROUP BY v.idReserva;


/* ● Listar el nombre de cada Escuela y su localidad. También deben aparecer las Localidades que no
tienen Escuelas, indicando ‘Sin Escuelas’. Algunas Escuelas no tienen cargada la Localidad, debe
indicar ‘Sin Localidad’.*/

SELECT IFNULL(e.escuela, 'Sin Escuelas'), 
		IFNULL(l.localidad, 'Sin Localidad')
FROM Escuelas e
LEFT JOIN Localidades l
ON l.idLocalidad = e.idLocalidad
UNION
SELECT IFNULL(e.escuela, 'Sin Escuelas'), 
		IFNULL(l.localidad, 'Sin Localidad')
FROM Localidades l
LEFT JOIN Escuelas e
ON l.idLocalidad = e.idLocalidad;


/* ● Listar el nombre de los Directores y el de los Guías, juntos, ordenados alfabéticamente.*/

SELECT d.director as nombre
FROM Directores d 
UNION
SELECT g.guia as nombre
FROM Guias g
ORDER BY nombre ASC;


/* ● Listar el nombre de los Directores de las escuelas de Mar del Plata, y el de todos los Guías, juntos,
ordenados alfabéticamente.*/

SELECT d.director as nombre
FROM Directores d 
JOIN Escuelas e
ON e.director = d.idDirector
WHERE e.idLocalidad = 1
UNION
SELECT g.guia as nombre
FROM Guias g
ORDER BY nombre ASC;


/* ● Listar para las Escuelas que tienen Reservas, el nombre y la Localidad, teniendo en cuenta que
algunas Escuelas no tienen Localidad.*/

SELECT e.escuela, IFNULL(l.localidad, 'Sin Localidad') as localidad, COUNT(r.idEscuela) as cantReservas
FROM Escuelas e
JOIN Localidades l
ON e.idLocalidad = l.idLocalidad
JOIN Reservas r
ON r.idEscuela = e.idEscuela
GROUP BY e.idEscuela
ORDER BY cantReservas DESC;



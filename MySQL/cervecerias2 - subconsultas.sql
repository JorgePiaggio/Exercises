USE Cervecerias;

/* Realizar las siguientes Consultas con Subconsultas*/

SELECT 
    i.nombreIngrediente
FROM
    Ingredientes i
WHERE
    i.idIngrediente = (SELECT 
            idIngrediente
        FROM
            IngredientesRecetas ir
        ORDER BY COUNT(ir.idIngrediente) DESC
        LIMIT 1);


/* 2. Mostrar las Recetas que contengan un numero igual o menor al promedio total.*/
    
SELECT 
    r.nombreReceta, COUNT(ir.idIngrediente) AS cantidadIng
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON r.idReceta = ir.idReceta
GROUP BY ir.idReceta
HAVING cantidadIng <= (SELECT 
        COUNT(ir.idIngrediente) / COUNT(DISTINCT r.idReceta) AS prom
    FROM
        Recetas r
            JOIN
        IngredientesRecetas ir ON r.idReceta = ir.idReceta);
                            
                            
/* 3. Listar las Cervezas que en su Receta contengan la mayor cantidad de Ingredientes.*/

SELECT 
    r.nombreReceta, COUNT(ir.idReceta) AS cant
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON ir.idReceta = r.idReceta
GROUP BY ir.idReceta
HAVING COUNT(ir.idReceta) = (SELECT 
        COUNT(ir.idReceta) AS cant
    FROM
        IngredientesRecetas ir
    GROUP BY ir.idReceta
    ORDER BY cant DESC
    LIMIT 1);

/* 4. Mostrar las Receta con el ID 3, junto con la cantidad de Ingredientes que posee y en otra columna el promedio de ingredientes General.*/

SELECT 
    r.nombreReceta,
    COUNT(ir.idReceta) AS cantIng,
    (SELECT 
            COUNT(ir.idIngrediente) / COUNT(DISTINCT r.idReceta) AS promedioIngredientes
        FROM
            Recetas r
                JOIN
            IngredientesRecetas ir ON r.idReceta = ir.idReceta) AS PromedioGeneral
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON r.idReceta = ir.idReceta
WHERE
    r.idReceta = 3;


/* 5. Mostrar las Recetas que superen el Promedio de ingredientes general (Simular Having).*/

SELECT 
    r.nombreReceta, COUNT(ir.idIngrediente) AS cantidadIng
FROM
    Recetas r
        JOIN
    IngredientesRecetas ir ON r.idReceta = ir.idReceta
GROUP BY ir.idReceta
HAVING cantidadIng > (SELECT 
        COUNT(ir.idIngrediente) / COUNT(DISTINCT r.idReceta) AS prom
    FROM
        Recetas r
            JOIN
        IngredientesRecetas ir ON r.idReceta = ir.idReceta);


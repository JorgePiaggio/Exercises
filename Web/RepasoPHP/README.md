## RepasoPHP


### UTN – Universidad Tecnológica Nacional de Mar del Plata
**Tecnicatura Superior en Programación - Laboratorio IV – 2020**

Una empresa de calzados nos encarga comenzar con el desarrollo de una aplicación que les permita
administrar su catálogo.
Como primera fase de desarrollo necesitamos realizar el Login de la aplicación y el Listado y Alta de
Calzados.
En base al siguiente esquema, se solicita:



| User | Shoe |
| ---- | ---- |
| Email | Id |
| Password | Name |
|  | Brand |
|  | Category |
|  | Price |
|  | ShoeRepository |

1. Generar las clases indicadas en el Diagrama utilizando los principios de POO que consideres necesarios.
2. Implementar el Login de la aplicación:
* El usuario debe iniciar sesión en la aplicación con el usuario user@myapp.com y password 123456
* No se requiere persistencia para el login, simplemente comprobar este usuario y password en el
código (hardcoded value)
* Proteger el resto de las páginas internas para evitar el acceso sin autenticación, utilizando SESSION.
Si se trata de acceder a una página interna sin iniciar sesión, se debe redireccionar al index.
* Mostrar un error si el usuario ingresa un ususario o password invalidos
3. Implementar el Alta de Calzados:
* Solicitar los campos del form al usuario. Todos los campos son requeridos
* Para el campo Brand, modificar la interfaz gráfica para utilizar un Select Input con las siguientes
opciones. Nike, Adidas, Reebok
* Para el campo Category, modificar la interfaz gráfica para utilizar Radio Buttons con las siguientes
opciones. Deportivo, Urbano, Formal
* Para el campo Price, utilizar un campo numérico con un mínimo de 100 y un máximo de 5000.
* Se debe persistir la información de los Calzados en archivos JSON
* Validar que el Id de cada calzado sea único
4. Implementar el List Form de Calzados:
* Mostrar el listado de Libros con su Id, Nombre, Marca, Categoría, Precio
* El listado debe mostrarse ordenado por Nombre
* Mostrar el precio promedio de los calzados
* Mostrar la cantidad de productos por categoría

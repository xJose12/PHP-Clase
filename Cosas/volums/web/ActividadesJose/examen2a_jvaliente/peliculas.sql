-- Borrar la base de datos
DROP DATABASE IF EXISTS peliculas;

-- Crear la base de datos
CREATE DATABASE peliculas;

-- Usar la base de datos
USE peliculas;

CREATE TABLE datospeliculas  (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(150) NOT NULL,
    fecha_lanzamiento DATE NOT NULL,
    presupuesto INT NOT NULL,
    pais VARCHAR(20) NOT NULL
);
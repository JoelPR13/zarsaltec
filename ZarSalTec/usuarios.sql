CREATE DATABASE zarsaltec;
USE zarsaltec;
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    contrasena VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (nombre, contrasena) VALUES ('admin',  'admin');
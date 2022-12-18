SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE DATABASE IF NOT EXISTS Ejercicio7 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE Ejercicio7;

CREATE TABLE PRODUCTO (
	codigo_producto VARCHAR(5) NOT NULL,
	nombre_producto VARCHAR(255) NOT NULL,
    precio_producto INT NOT NULL,
	descripcion_producto VARCHAR(255) NOT NULL,
	PRIMARY KEY (codigo_producto)
);

CREATE TABLE PEDIDO_PRODUCTO (
	codigo_producto VARCHAR(5) NOT NULL,
	codigo_factura VARCHAR(5) NOT NULL,
	cantidad_producto INT NOT NULL,
	PRIMARY KEY (codigo_factura),
	FOREIGN KEY (codigo_producto) REFERENCES PRODUCTO(codigo_producto)
);

CREATE TABLE CLIENTE (
	codigo_cliente VARCHAR(5) NOT NULL,
	nombreApellidos_cliente VARCHAR(255) NOT NULL,
	PRIMARY KEY (codigo_cliente)
);

CREATE TABLE ALMACEN (
	codigo_almacen VARCHAR(5) NOT NULL,
	nombre_almacen VARCHAR(255) NOT NULL,
    localizacion_almacen VARCHAR(255) NOT NULL,
	PRIMARY KEY (codigo_almacen)
);

CREATE TABLE FACTURA (
	codigo_cliente VARCHAR(5) NOT NULL,
	codigo_almacen VARCHAR(5) NOT NULL,
	codigo_factura VARCHAR(5) NOT NULL,
    importe_factura INT NOT NULL,
	FOREIGN KEY (codigo_factura) REFERENCES PEDIDO_PRODUCTO(codigo_factura),
	FOREIGN KEY (codigo_almacen) REFERENCES ALMACEN(codigo_almacen),
	FOREIGN KEY (codigo_cliente) REFERENCES CLIENTE(codigo_cliente)
);




INSERT INTO PRODUCTO (codigo_producto, nombre_producto, precio_producto, descripcion_producto) VALUES
("P0001", "Alfombra gris", "32", "Alfombra gris de algodón"),
("P0002", "Sofá verde botella", "230", "Sofá color verde botella de terciopelo"),
("P0003", 'Silla mecedora', "80", "Silla mecedora de mimbre"),
("P0004", "Somier cama 135cm", "120", "Somier de madera para cama de 135x100cm");

INSERT INTO PEDIDO_PRODUCTO (codigo_producto, codigo_factura, cantidad_producto) VALUES
("P0001", "F0001", 300),
("P0002", "F0002", 150),
("P0003", "F0003", 63),
("P0004", "F0004", 85);

INSERT INTO CLIENTE (codigo_cliente, nombreApellidos_cliente) VALUES
("C0001", "Sara"),
("C0002", "Luis"),
("C0003", "Laura"),
("C0004", "Celia");

INSERT INTO ALMACEN (codigo_almacen, nombre_almacen, localizacion_almacen) VALUES
("A0001", "Almacén Alarjo", "Llagu"),
("A0002", "Almacenes BigMat", "Gijón"),
("A0003", "Almacén industrial ERJO", "Avilés"),
("A0004", "Almacén POL", "Oviedo");

INSERT INTO FACTURA (codigo_cliente, codigo_almacen, codigo_factura, importe_factura) VALUES
("C0001", "A0001", "F0001", "200"),
("C0002", "A0002", "F0002", "400"),
("C0003", 'A0003', "F0003", "380"),
("C0004", "A0004", "F0004", "125");
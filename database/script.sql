CREATE TABLE ciudad(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL
);
CREATE TABLE sucursal(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL,	
	id_ciudad int NOT NULL,
	FOREIGN KEY (id_ciudad) REFERENCES ciudad(id) ON DELETE CASCADE ON UPDATE CASCADE
 
);
CREATE TABLE categoria (
	id serial PRIMARY KEY,
	nombre varchar(60)
);
CREATE TABLE talla (
	id serial PRIMARY KEY,
	nombre varchar(10)
);

CREATE TABLE producto (
	id serial PRIMARY KEY,
  	nombre varchar(60) NOT NULL,
  	imagen varchar(100),
  	descripcion varchar(200),
	stock decimal NOT NULL check(precio >= 0),
	precio real NOT NULL,
  	id_categoria int NOT NULL,
  	id_talla int NOT NULL,
  	id_sucursal int NOT NULL,
  	FOREIGN KEY (id_categoria) REFERENCES categoria(id) ON DELETE CASCADE ON UPDATE CASCADE,
  	FOREIGN KEY (id_talla) REFERENCES talla(id) ON DELETE CASCADE ON UPDATE CASCADE,
  	FOREIGN KEY (id_sucursal) REFERENCES sucursal(id) ON DELETE CASCADE ON UPDATE CASCADE

);
CREATE TABLE rol(
	id serial NOT NULL PRIMARY KEY,
	nombre varchar(60) 	
);
CREATE TABLE usuario(
	id serial NOT NULL PRIMARY KEY,
	nombre varchar(60) ,
	email varchar(60) ,
	foto varchar(300),
 	telefono varchar(30), 
	password varchar(300) NOT NULL,
	id_rol int NOT NULL,
	FOREIGN KEY (id_rol) REFERENCES rol(id)  

);
CREATE TABLE direccion(
	id serial NOT NULL PRIMARY KEY,
	ciudad varchar(60) ,
	calle varchar(60) ,
	numero int not null,
	id_usuario int NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES usuario(id) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE metodo_envio(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL,
	costo real NOT NULL
);
CREATE TABLE estado(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL
);
CREATE TABLE pedido(
	id serial PRIMARY KEY,
	id_usuario int NOT NULL,
 	id_estado int NOT NULL,
	FOREIGN KEY (id_usuario) REFERENCES  usuario(id),
 	FOREIGN KEY (id_estado) REFERENCES estado(id)

);
CREATE TABLE envio(
	id_direccion int NOT NULL ,
	id_pedido  	int  NOT NULL,
	id_metodo_envio int NOT NULL,
	PRIMARY KEY(id_direccion,id_pedido),
	FOREIGN KEY (id_metodo_envio) REFERENCES metodo_envio(id) , 
	FOREIGN KEY (id_direccion) REFERENCES direccion(id) , 
	FOREIGN KEY (id_pedido) REFERENCES pedido(id)  

);
CREATE TABLE metodo_pago(
	id serial PRIMARY KEY,
	nombre varchar(60) NOT NULL
);

CREATE TABLE pago(
	id serial PRIMARY KEY,
	monto real CHECK(monto>0),	
	descripcion varchar(60),
	id_metodo int NOT NULL,
	id_pedido int NOT NULL,
	FOREIGN KEY (id_pedido) REFERENCES pedido(id),
	FOREIGN KEY (id_metodo) REFERENCES metodo_pago(id)
);

CREATE TABLE detalle_pedido(
	id_producto int NOT NULL,
	id_pedido int NOT NULL,
	cantidad int NOT NULL,
	precio real CHECK(precio>=0),
	PRIMARY KEY ( id_producto,id_pedido),
 	FOREIGN KEY (id_producto) REFERENCES producto(id) ,
 	FOREIGN KEY (id_pedido) REFERENCES pedido(id)  
	
);
-- CIUDADES
INSERT into ciudad (nombre) values('LA PAZ');
INSERT into ciudad (nombre) values('COCHABAMBA');
INSERT into ciudad (nombre) values('ORURO');
INSERT into ciudad (nombre) values('SANTA CRUZ');

-- SUCURSALES
INSERT into sucursal (nombre,id_ciudad) values('ZONA SUR',1);
INSERT into sucursal (nombre,id_ciudad) values('ZONA El ALTO',1);
INSERT into sucursal (nombre,id_ciudad)  values('ZONA CENTRO',2);
INSERT into sucursal (nombre,id_ciudad)  values('ZONA SUR',3);
INSERT into sucursal (nombre,id_ciudad)  values('EQUIPETROL',4);

-- CATEGORIAS
INSERT into categoria (nombre) values('Polera');
INSERT into categoria (nombre) values('Pantalon');
INSERT into categoria (nombre) values('Blusa');
INSERT into categoria (nombre) values('Chompas');

-- TALLAS
INSERT into talla (nombre) values('M');
INSERT into talla (nombre) values('M');
INSERT into talla (nombre) values('S');
INSERT into talla (nombre) values('XL');
-- ROLES
INSERT into rol (nombre) values('Administrador');
INSERT into rol (nombre) values('Empleado');
INSERT into rol (nombre) values('Cliente');



INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('Polera rojo','/','es una polera rojo',1,1);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('Polera amarila','/','es una polera amarilla',1,2);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('Polera rosado','/','es una polera rosado',1,3);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('Polera negro','/','es una polera negro',1,4);

INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('pantalon rojo','/','es una pantalon rojo',2,1);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('pantalon amarila','/','es una pantalon amarilla',2,2);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('pantalon rosado','/','es una pantalon rosado',2,3);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('pantalon negro','/','es una pantalon negro',2,4);

INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('blusa rojo','/','es una blusa rojo',3,1);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('blusa amarila','/','es una blusa amarilla',3,2);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('blusa rosado','/','es una blusa rosado',3,3);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('blusa negro','/','es una blusa negro',3,4);

 INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('chompa rojo','/','es una chompa rojo',4,1);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('chompa amarila','/','es una chompa amarilla',4,2);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('chompa rosado','/','es una chompa rosado',4,3);
INSERT into producto (nombre,imagen,descripcion,id_categoria,id_talla) 
				values('chompa negro','/','es una chompa negro',4,4);
 

 INSERT INTO metodo_pago(nombre) values ('tarjeta credito/debito');
 INSERT INTO metodo_pago(nombre) values ('Transferencia QR');

 INSERT INTO metodo_envio(nombre) values ('Envio gratis');
 INSERT INTO metodo_envio(nombre) values ('Costo fijo');
 INSERT INTO metodo_envio(nombre) values ('Costo fijo');
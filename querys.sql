use escommerce;

create table usuario (rfc char(15) primary key, nombreUsuario varchar(100) unique not null,
contraUsuario varchar(100) not null, correo varchar(200) unique not null, tipoUser char(10)
not null constraint tipoUsuario check (tipoUser in ('cliente', 'vendedor')));

create table venta (idVenta bigint auto_increment primary key, total float not null);

create table compra (rfc char(15), idVenta bigint, primary key (rfc, idVenta), 
foreign key(rfc) references usuario(rfc) on delete cascade on update cascade, 
foreign key(idVenta) references venta(idVenta) on delete cascade on update cascade);

create table categoria ( idCategoria bigint auto_increment primary key, 
nomCategoria varchar(100) unique not null); 

create table subcategoria (idSubcategoria bigint, idCategoria bigint,
primary key(idSubcategoria, idCategoria),
foreign key(idSubcategoria) references categoria(idCategoria) on delete cascade on update
cascade, foreign key(idCategoria) references categoria(idCategoria) on delete cascade
on update cascade);

create table producto (idProducto bigint auto_increment, rfc char(15), idCategoria bigint,
precio float not null, marca varchar(100) not null, modelo varchar(100) not null, 
caracteristicas varchar(500) not null, primary key (idProducto, rfc, idCategoria),
foreign key(rfc) references usuario(rfc) on delete cascade on update cascade,
foreign key(idCategoria) references categoria(idCategoria) on delete cascade on update
cascade);

show tables;

create table vendido (idVenta bigint, idProducto bigint, primary key(idVenta, idProducto),
foreign key(idVenta) references venta(idVenta) on delete cascade on update cascade,
foreign key(idProducto) references producto(idProducto) on delete cascade on update cascade);

create table preguntas (uniqueId bigint auto_increment, idProducto bigint, 
fieldname varchar(500) not null, primary key(uniqueId, idProducto), 
foreign key(idProducto) references producto(idProducto) on delete cascade on update cascade);

create table pregRes (uniqueId bigint, idRespuesta bigint, primary key(uniqueId, idRespuesta),
foreign key(uniqueId) references preguntas(uniqueId) on delete cascade on update cascade,
foreign key(idRespuesta) references preguntas(uniqueId) on delete cascade on update cascade);

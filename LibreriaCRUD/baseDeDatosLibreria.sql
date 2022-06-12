create database Libreria;
use Libreria;

create table libro(
	codigo int primary key not null,
    Nombre varchar(50),
    Categoria varchar(50)
);

create table prestamo(
	dpi int primary key not null,
    nombreCliente varchar(50),
    codigoLibro int not null, 
    foreign key (codigoLibro)
    references libro(codigo)
    on delete cascade
    on update cascade
); 
select * from prestamo;
/*
	--------------FORMATOS DE FECHAS------------------ 
    -date: YYYY-MM-DD solo almacena la fecha sin hora con rango 1000-01-01 a 9999-12-31
    -datetime: YYYY-MM-DD HH:MI:SS almacena fecha y hora con rango 1000-01-01 00:00:00 a 9999-12-31 23:59:59
    -TIMESTAMP: almacena fecha y hora con rango 1970-01-01 00:00:01 a 2038-01-09 03:14:17
	-TIME: almacena la hora sin fecha con rango -838:59:59 a 838:59:59
    -YEAR: almacena el año con 4 o 2 digitos con rango de 70(1970)-69(2069) para 2 dígitos y 1901-2155 | 0000 para 4 dígitos. 
*/
create table detallePrestamo(
	id int primary key auto_increment,
    cantidadPrestamo double(100,2),
    fecha date
);

insert into detalleprestamo(cantidadPrestamo,fecha) values (1120.456,'2019-8-6');
select * from detalleprestamo;

create table categorias(
	idCategoria int primary key not null,
    nombre varchar(50)
);
/*
	vamos a eliminar una columna y luego a crear una nueva 
    pero esta vez con una llave foranea
*/

alter table libro drop column idCategoria;
/*
	ALTER TABLE nombreTabla DROP COLUMN columna;
    elimina la columna de la tabla. si se desea eliminar una
    columna con llave foranea será necesario eliminar primero
    la llave foranea con este comando
    ALTER TABLE nombreTabla DROP FOREING KEY nombreColumna
*/
ALTER TABLE libro drop foreign key libro_ibfk_1;
select * from categorias;
select * from libro;
/*
	añadimos una nueva columna a la tabla y si queremos le agregamos 
    que sea una llave foranea a esa columna u otra.
    en contraint le podemos agregar un nombre a esa relacion de
	llave foranea y cuando deseamos eliminar esa relacion se 
    utiliza ese nombre para eliminar la llave foranea.
*/
alter table libro add column Categoria int;
alter table libro add CONSTRAINT foreign key(idCategoria) references categorias(idCategoria);
drop table categorias;

create database inventarioDemo;
use inventarioDemo;

create table usuario(
id_usuario int primary key auto_increment,
nombre varchar (500),
id_admin int,
id_usuarioR int,
id_usuarioD int,
id_usuarioU int,
id_usuarioN int,
id_asesor int
);

create table administrador(
id_administrador int primary key auto_increment,
nombre varchar (500),
apellidos varchar (500),
usuario varchar (500),
email varchar (500),
clave varchar (500),
id_usuario int
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO administrador (nombre, apellidos, usuario, clave, email) VALUES
('Jose', 'Antonio', 'Administrador', '$2y$10$EPY9LSLOFLDDBriuJICmFOqmZdnDXxLJG8YFbog5LcExp77DBQvgC', '');


select * from administrador;

create table usuarioR(
id_usuarioR int primary key auto_increment,
usuario varchar (500),
nombre varchar (500),
clave varchar (500),
asignado_uno varchar (500),
turno_uno varchar (500),
asignado_dos varchar (500),
turno_dos varchar (500),
cargo varchar (500),
area varchar (500),
clave_sga varchar (500),
estado varchar (500),
id_usuario int	
); 
select * from usuarioR;

SELECT * FROM usuarioR WHERE id_usuarioR;

create table usuarioD(
id_usuarioD int primary key auto_increment,
usuario varchar (500),
nombre varchar (500),
clave varchar (500),
asignado varchar (500),
turno varchar (500),
cargo varchar (500),
estado varchar (500),
id_usuario int
); 

select * from usuarioD;

create table usuarioU(
id_usuarioU int primary key auto_increment,
usuario varchar (500),
nombre varchar (500),
clave varchar (500),
asignado varchar (500),
turno varchar (500),
cargo varchar (500),
estado varchar (500),
id_usuario int
); 

select * from usuarioU;

create table usuarioN(
id_usuarioN int primary key auto_increment,
usuario varchar (500),
nombre varchar (500),
clave varchar (500),
asignado varchar (500),
num_autenticacion int (9),
cargo varchar (500),
supervisor_cargo varchar (500),
clave_sga varchar (500),
estado varchar (500),
id_usuario int
); 

select * from usuarioN;

create table asesor(
id_asesor int primary key auto_increment,
nombre varchar (500),
apellido varchar (500),
dni int (9),
num_celular int (9),
turno varchar (500),
sala varchar (50),
estado varchar(500),
id_usuario int
);

select * from asesor;

/*-------------FOREIGN KEY USUARIOS------------*/
alter table administrador 
add constraint fk_id_usuario
foreign key (id_usuario) references usuario (id_usuario);

alter table usuarioR 
add constraint fk_id_usuarioR
foreign key (id_usuario) references usuario (id_usuario);

alter table usuarioD 
add constraint fk_id_usuarioD
foreign key (id_usuario) references usuario (id_usuario);

alter table usuarioU 
add constraint fk_id_usuarioU
foreign key (id_usuario) references usuario (id_usuario);

alter table usuarioN 
add constraint fk_id_usuarioN
foreign key (id_usuario) references usuario (id_usuario);

alter table asesor 
add constraint fk_id_usuarioAsesor
foreign key (id_usuario) references usuario (id_usuario);

/*--------------------------------------------------*/
/*--------------------------------------------------/*--------------------------------------------------*/

create table categoria(
categoria_id int primary key auto_increment,
categoria_nombre varchar (500),
categoria_ubicacion varchar (500),
id_equipo int,
id_celular int
);

select * from categoria;

/*--------------------------------------------------/*--------------------------------------------------*/

create table equipo(
id_equipo int primary key auto_increment,
codigo varchar (500),
modelo varchar (500),
mac_wifi varchar (500),
mac_ethernet varchar (500),
mac_change varchar(500),
ip varchar (500),
sistema_operativo varchar (500),
procesador varchar (500),
capacidad_disco_duro varchar (500),
tipo_disco_duro varchar (500),
tipo_equipo varchar (500),
categoria_id int not null,
id_administrador int not null
);

SELECT * FROM equipo;

alter table equipo
add key categoria_id (categoria_id),
add key id_administrador (id_administrador);

alter table equipo
add constraint fk_categoria_id
foreign key (categoria_id) references categoria (categoria_id),
add constraint fk_id_administrador
foreign key (id_administrador) references administrador (id_administrador);


create table celular(
id_celular int primary key auto_increment,
equipo varchar (500),
numero int (9),
imei_uno varchar (500),
imei_dos varchar (500),
capacidad varchar(500),
asignado varchar (500),
categoria_id int not null,
id_administrador int not null
);

alter table celular
add key categoria_id (categoria_id),
add key id_administrador (id_administrador);

alter table celular
add constraint fk_id_categoria_dos
foreign key (categoria_id) references categoria (categoria_id),
add constraint fk_id_administrador_dos
foreign key (id_administrador) references administrador (id_administrador);



SELECT equipo.id_equipo,equipo.codigo,equipo.modelo,equipo.mac_wifi,equipo.mac_ethernet,equipo.mac_change,equipo.ip,equipo.sistema_operativo,equipo.procesador,
    equipo.capacidad_disco_duro,equipo.tipo_disco_duro,equipo.tipo_equipo,equipo.categoria_id,equipo.id_administrador,
	categoria.categoria_id,categoria.categoria_nombre,administrador.id_administrador,administrador.nombre,administrador.apellidos FROM equipo INNER JOIN categoria ON 
equipo.categoria_id=categoria.categoria_id INNER JOIN administrador ON equipo.id_administrador=administrador.id_administrador 
where equipo.codigo LIKE 'b' ORDER BY equipo.modelo; 

SELECT equipo.id_equipo,equipo.codigo,equipo.modelo,equipo.mac_wifi,equipo.mac_ethernet,equipo.mac_change,equipo.ip,equipo.sistema_operativo,equipo.procesador,
    equipo.capacidad_disco_duro,equipo.tipo_disco_duro,equipo.tipo_equipo,equipo.categoria_id,equipo.id_administrador,
	categoria.categoria_id,categoria.categoria_nombre,administrador.id_administrador,administrador.nombre,administrador.apellidos
    FROM equipo INNER JOIN categoria ON equipo.categoria_id=categoria.categoria_id 
    INNER JOIN administrador ON equipo.id_administrador=administrador.id_administrador WHERE equipo.categoria_id='1' ORDER BY equipo.modelo


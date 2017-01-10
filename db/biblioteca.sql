drop table if exists socios cascade;
create table socios(
    id bigserial constraint pk_socios primary key,
    nombre varchar(100) not null
);

drop table if exists libros cascade;
create table libros(
    id bigserial constraint pk_libros primary key,
    titulo varchar(100) not null
);

create table alquilan(
    id bigserial constraint pk_alquilan primary key,
    socios_id bigint constraint fk_socios_alquilan references socios (id)
                on delete no action on update cascade,
    libros_id bigint constraint fk_libros_alquilan references libros (id)
                on delete no action on update cascade,
    fecha date default current_timestamp
);

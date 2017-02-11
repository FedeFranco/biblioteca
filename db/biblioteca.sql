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
drop table if exists alquilan cascade;
create table alquilan(
    id bigserial constraint pk_alquilan primary key,
    socios_id bigint constraint fk_socios_alquilan references socios (id)
                on delete no action on update cascade,
    libros_id bigint constraint fk_libros_alquilan references libros (id)
                on delete no action on update cascade,
    fecha date default current_timestamp
);

drop table if exists usuario cascade;
create table usuario(
    id bigserial constraint pk_usuario primary key,
    nombre varchar(15) not null constraint uq_usuario_nombre unique,
    password varchar(60) not null,
    token varchar(32)
);

drop table if exists resena cascade;
create table resena(
    id bigserial constraint pk_resenias primary key,
    titulo varchar(20) not null,
    usuario_id bigint constraint fk_usuario_resenia references public.user(id)
    on delete no action on update cascade,
    fecha date default current_timestamp

);

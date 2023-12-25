-- This script was generated by a beta version of the ERD tool in pgAdmin 4.
-- Please log an issue at https://redmine.postgresql.org/projects/pgadmin4/issues/new if you find any bugs, including reproduction steps.
BEGIN;


CREATE TABLE IF NOT EXISTS public.aeropuerto
(
    id_aeropuerto integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    ubicacion character varying(50) COLLATE pg_catalog."default",
    fkpiloto_aer integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    CONSTRAINT aeropuerto_pkey PRIMARY KEY (id_aeropuerto)
);

CREATE TABLE IF NOT EXISTS public.avion
(
    id_avion integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    tipo_aeronave character varying(30) COLLATE pg_catalog."default",
    modelo character varying(30) COLLATE pg_catalog."default",
    fkpiloto integer,
    CONSTRAINT avion_pkey PRIMARY KEY (id_avion)
);

CREATE TABLE IF NOT EXISTS public.freno
(
    id_freno integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    f_pedal_derecho integer,
    f_pedal_izquierdo integer,
    CONSTRAINT freno_pkey PRIMARY KEY (id_freno)
);

CREATE TABLE IF NOT EXISTS public.instrumentos
(
    id_resumenvuelo integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    airspeed integer,
    attitude integer,
    latitude integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    turn_rate integer,
    heading integer,
    vertical_speed integer,
    fkfreno_inst integer,
    fktimon_inst integer,
    longitude integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    gps jsonb,
    CONSTRAINT instrumentos_pkey PRIMARY KEY (id_resumenvuelo)
);

CREATE TABLE IF NOT EXISTS public.piloto
(
    id_piloto integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    nombre character varying(30) COLLATE pg_catalog."default",
    apellido character varying(30) COLLATE pg_catalog."default",
    dni integer,
    fkmaniobra integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    tiempo_realizado integer,
    CONSTRAINT piloto_pkey PRIMARY KEY (id_piloto)
);

CREATE TABLE IF NOT EXISTS public.timon
(
    id_timon integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    rudder integer,
    CONSTRAINT timon_pkey PRIMARY KEY (id_timon)
);

CREATE TABLE IF NOT EXISTS public.vuelo
(
    id_maniobra integer NOT NULL GENERATED BY DEFAULT AS IDENTITY ( INCREMENT 1 START 1 MINVALUE 1 MAXVALUE 2147483647 CACHE 1 ),
    identificacion character varying(50) COLLATE pg_catalog."default",
    hora time without time zone,
    fkpiloto_man integer,
    fkfreno integer,
    fktimon integer,
    metar jsonb,
    CONSTRAINT maniobra_pkey PRIMARY KEY (id_maniobra)
);

ALTER TABLE IF EXISTS public.aeropuerto
    ADD CONSTRAINT fkpiloto FOREIGN KEY (fkpiloto_aer)
    REFERENCES public.piloto (id_piloto) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.avion
    ADD CONSTRAINT fkpiloto FOREIGN KEY (fkpiloto)
    REFERENCES public.piloto (id_piloto) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.instrumentos
    ADD CONSTRAINT fkfreno_inst FOREIGN KEY (fkfreno_inst)
    REFERENCES public.freno (id_freno) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.instrumentos
    ADD CONSTRAINT fktimon_inst FOREIGN KEY (fktimon_inst)
    REFERENCES public.timon (id_timon) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.vuelo
    ADD CONSTRAINT fkfreno FOREIGN KEY (fkfreno)
    REFERENCES public.freno (id_freno) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.vuelo
    ADD CONSTRAINT fkpiloto_man FOREIGN KEY (fkpiloto_man)
    REFERENCES public.piloto (id_piloto) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;


ALTER TABLE IF EXISTS public.vuelo
    ADD CONSTRAINT fktimon FOREIGN KEY (fktimon)
    REFERENCES public.timon (id_timon) MATCH SIMPLE
    ON UPDATE NO ACTION
    ON DELETE NO ACTION
    NOT VALID;

END;
CREATE TABLE PRODUCTO(
    cod_pro int not null AUTO_INCREMENT,
    nom_pro varchar(50) null,
    des_pro varchar(150) null,
    pre_pro numeric(6,2) null,
    estado int null, 
    rutima_pro varchar(100) null,
    stock int not null,
    CONSTRAINT pk_producto
    PRIMARY KEY (cod_pro)
);
ALTER TABLE PRODUCTO ADD rutima_pro varchar(100) null;
INSERT INTO PRODUCTO (nom_pro, des_pro, pre_pro, estado, rutima_pro, stock)
VALUES ('Zapatillas Nike', 'Producto de la mas alta calidad y exclusividad.', 35000, 1, 'zapatillas.png', 20),
('Poleron negro', 'Hoddie con costuras firmes y estilo esbelto.', 15000, 1, 'poleron2.png', 43);

CREATE TABLE USUARIO(
    cod_usu int not null AUTO_INCREMENT,
    nom_usu varchar(50),
    ape_usu varchar(50),
    ema_usu varchar(50) not null,
    pass_usu varchar(20) not null,
    estado int not null,
    CONSTRAINT pk_usuario
    PRIMARY KEY (cod_usu)
);
INSERT INTO USUARIO (nom_usu, ape_usu, ema_usu, pass_usu, estado)
VALUES ('Usuario','Demo', 'correo@example.com', '123456', 1);

CREATE TABLE PEDIDO
(
    cod_ped int AUTO_INCREMENT not null,
    cod_usu int not null,
    cod_pro int not null,
    fec_ped datetime not null,
    estado int not null,
    dir_usu varchar(50) not null,
    tel_usu varchar(12) not null,
    PRIMARY KEY (cod_ped)

);
CREATE TABLE venta
(
    cod_ven int AUTO_INCREMENT not null,
    cod_usu int not null,
    tot_ven int not null,
    fec_ven datetime not null,
    PRIMARY KEY (cod_ven)
);
CREATE TABLE venta_producto
(
    cod_ven_pro int AUTO_INCREMENT not null,
    cod_ven int not null,
    cod_pro int not null,
    can_ven_pro int not null,
    pre_ven_pro datetime not null,
    stotal_ven_pro int not null,
    PRIMARY KEY (cod_ven_pro)
);

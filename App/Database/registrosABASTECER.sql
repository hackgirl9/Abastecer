-- Registros CLAP
INSERT INTO `clap`
    (codigoClap,codigoSala,nombreClap,rifClap,parroquia,emailClap,tlfClap,nombreComunidad,
    limiteNorteComunidad,limiteSurComunidad,limiteOesteComunidad,limiteEsteComunidad,
    nombreConsejoComunal,rifConsejoComunal,zonaSilencio,cantManzaneros,eje,revisadoEnlace,
    cantViviendas,cantFamilias,estado,idEnlace,idEmpresa) 
    VALUES 
    ("0000-NNNN","ZXCV-1111","Cerro Blanco","J-223344556","Juan de Villegas","vallehondoclap@correo.com",
    "04123456787","La Morita","El Frio","Rey Dormido","Barro Negro","La Menca","Los Sapos",
    "J-998877665",1,50,10,1,100,78,1,1,3);
INSERT INTO `clap`
    (codigoClap,codigoSala,nombreClap,rifClap,parroquia,emailClap,tlfClap,nombreComunidad,
    limiteNorteComunidad,limiteSurComunidad,limiteOesteComunidad,limiteEsteComunidad,
    nombreConsejoComunal,rifConsejoComunal,zonaSilencio,cantManzaneros,eje,revisadoEnlace,
    cantViviendas,cantFamilias,estado,idEnlace,idEmpresa) 
    VALUES 
    ("0000-AAAA","ABCD-1111","Valle Hondo","J-223344556","Juan de Villegas","vallehondoclap@correo.com",
    "04123456787","La Morita","El Frio","Rey Dormido","Barro Negro","La Menca","Los Sapos",
    "J-998877665",1,50,10,1,100,78,1,1,3);
INSERT INTO `clap`
    (codigoClap,codigoSala,nombreClap,rifClap,parroquia,emailClap,tlfClap,nombreComunidad,
    limiteNorteComunidad,limiteSurComunidad,limiteOesteComunidad,limiteEsteComunidad,
    nombreConsejoComunal,rifConsejoComunal,zonaSilencio,cantManzaneros,eje,revisadoEnlace,
    cantViviendas,cantFamilias,estado,idEnlace,idEmpresa) 
    VALUES 
    ("0000-BBBB","ASDF-2222","Cañadita","J-334455667","Catedral","lacanadita@correo.com",
    "04120099887","La Cañada","San Jacinto","El Jeve","San Lorenzo","La Victoria","Los Balurdos",
    "J-334422144",1,24,1,0,245,300,0,3,1);
INSERT INTO `clap`
    (codigoClap,codigoSala,nombreClap,rifClap,parroquia,emailClap,tlfClap,nombreComunidad,
    limiteNorteComunidad,limiteSurComunidad,limiteOesteComunidad,limiteEsteComunidad,
    nombreConsejoComunal,rifConsejoComunal,zonaSilencio,cantManzaneros,eje,revisadoEnlace,
    cantViviendas,cantFamilias,estado,idEnlace,idEmpresa) 
    VALUES 
    ("0000-CCCC","QWER-3333","El Limoncito","J-113322445","Moran","el-limoncito@correo.com",
    "041299887766","El Limocito","La Naranjita","La Perita","La Lechozita","La Mandarina","Campesinitos",
    "J-554433221",0,10,4,1,115,100,1,5,4);
INSERT INTO `clap`
    (codigoClap,codigoSala,nombreClap,rifClap,parroquia,emailClap,tlfClap,nombreComunidad,
    limiteNorteComunidad,limiteSurComunidad,limiteOesteComunidad,limiteEsteComunidad,
    nombreConsejoComunal,rifConsejoComunal,zonaSilencio,cantManzaneros,eje,revisadoEnlace,
    cantViviendas,cantFamilias,estado,idEnlace,idEmpresa) 
    VALUES 
    ("0000-DDDD","TYUI-4444","Santa Rosa","J-55322441","Santa Rosa","larosita12@correo.com",
    "04123214567","La Pastora","La Victoria","El Paraiso","El Carmen","San Pedro","Pastores",
    "J-234564323",1,34,5,0,156,205,1,7,3);

-- Registros Familia

INSERT INTO `grupofamiliar`
    (grupoFamiliar,apellidoFamilia,direccionFamilia,numVivienda,
    numManzana,cantMercadosAsignados,idCLAP) 
    VALUES ("2","IN2112","UPTAEB","2-5",2,1,2);

-- Registros MIEMBRO FAMILIA
INSERT INTO `miembrofamilia`(cedulaIntegrante,nombreIntegrante,apellidoIntegrante,sexoIntegrante,fechaNacimiento,telefonoIntegrante,emailIntegrante,rolPersona,codigoCarnetPatria,serialCarnetPatria,manzanero,idFamilia)
    VALUES ('10956121', 'Lissette', 'Torrealba', 'F', '1971-11-06', '04163594804', 'lissette@correo.com', 'Jefe', NULL, NULL, '0', 2);
INSERT INTO `miembrofamilia`(cedulaIntegrante,nombreIntegrante,apellidoIntegrante,sexoIntegrante,fechaNacimiento,telefonoIntegrante,emailIntegrante,rolPersona,codigoCarnetPatria,serialCarnetPatria,manzanero,idFamilia)
    VALUES ('28286639', 'Andrés', 'Meléndez', 'M', '1999-05-22', '04266544506', 'andres@correo.com', 'Miembro', NULL, NULL, '0', 2);
INSERT INTO `miembrofamilia`(cedulaIntegrante,nombreIntegrante,apellidoIntegrante,sexoIntegrante,fechaNacimiento,telefonoIntegrante,emailIntegrante,rolPersona,codigoCarnetPatria,serialCarnetPatria,manzanero,idFamilia)
    VALUES ('27085898', 'Yohnneiber', 'Díaz', 'M', '1999-03-04', '04144546669', 'yohnneiber@correo.com', 'Miembro', NULL, NULL, '0', 2);
INSERT INTO `miembrofamilia`(cedulaIntegrante,nombreIntegrante,apellidoIntegrante,sexoIntegrante,fechaNacimiento,telefonoIntegrante,emailIntegrante,rolPersona,codigoCarnetPatria,serialCarnetPatria,manzanero,idFamilia)
    VALUES ('27317920', 'Jhon', 'Morán', 'M', '2000-03-26', '04163594804', 'jhon@correo.com', 'Miembro', NULL, NULL, '0', 2);
INSERT INTO `miembrofamilia`(cedulaIntegrante,nombreIntegrante,apellidoIntegrante,sexoIntegrante,fechaNacimiento,telefonoIntegrante,emailIntegrante,rolPersona,codigoCarnetPatria,serialCarnetPatria,manzanero,idFamilia)
    VALUES ('27198456', 'Verónica', 'Quintero', 'F', '1999-09-19', '04144546669', 'verito@correo.com', 'Miembro', NULL, NULL, '0', 2);
INSERT INTO `miembrofamilia`(cedulaIntegrante,nombreIntegrante,apellidoIntegrante,sexoIntegrante,fechaNacimiento,telefonoIntegrante,emailIntegrante,rolPersona,codigoCarnetPatria,serialCarnetPatria,manzanero,idFamilia)
    VALUES ('27212503', 'Gabriel', 'Oropeza', 'M', '1999-06-22', '04163594804', 'gabito@correo.com', 'Miembro', NULL, NULL, '0', 2);

-- Mas registros

-- Registros enlaces politicos
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Juan','Ororzco','Buena Vista');
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Vanesa','Rodríguez','Catedral');
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Mario','Mendoza','Concepción');
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Antonio','Falcón','Felipe Alvarado');
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Ana María','Mendez','Juan de Villegas');
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Laura','Martinez','Juarez');
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Luis','Fuentes','Santa Rosa');
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Vicente','Lozada','Tamaca');
INSERT INTO `enlace_politico`(nombreEnlace,apellidoEnlace,parroquiaEncargado) 
    VALUES ('Daniela','Pérez','Unión');

-- Registros Empresas distribuidoras
INSERT INTO `empresa_distribuidora`(nombreEmpresa,rifEmpresa,emailEmpresa,tlfEmpresa) 
    VALUES ('ABAS C.A','J-1234567890','abas@correo.com','04262450215');
INSERT INTO `empresa_distribuidora`(nombreEmpresa,rifEmpresa,emailEmpresa,tlfEmpresa) 
    VALUES ('MERCAL','J-2345678901','mercal@correo.com','04266544506');
INSERT INTO `empresa_distribuidora`(nombreEmpresa,rifEmpresa,emailEmpresa,tlfEmpresa) 
    VALUES ('BICENTENARIO','J-0987654321','bicentenario@correo.com','04263073306');
INSERT INTO `empresa_distribuidora`(nombreEmpresa,rifEmpresa,emailEmpresa,tlfEmpresa) 
    VALUES ('POLAR','J-22113344556','empresaspolar@correo.com','04127858928');
INSERT INTO `empresa_distribuidora`(nombreEmpresa,rifEmpresa,emailEmpresa,tlfEmpresa) 
    VALUES ('KRAFT','J-99887766554','kraft@correo.com','04263594804');

-- Registros de CARGOS.
INSERT INTO `cargo_clap`(cargoRol) VALUES ('UBCH');
INSERT INTO `cargo_clap`(cargoRol) VALUES ('UNAMUJER');
INSERT INTO `cargo_clap`(cargoRol) VALUES ('MILICIA');
INSERT INTO `cargo_clap`(cargoRol) VALUES ('FFM');
INSERT INTO `cargo_clap`(cargoRol) VALUES ('CLP');
INSERT INTO `cargo_clap`(cargoRol) VALUES ('JEFE COMUNIDAD');
INSERT INTO `cargo_clap`(cargoRol) VALUES ('CHAMBA JUVENIL');
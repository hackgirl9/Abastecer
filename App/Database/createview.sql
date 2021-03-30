CREATE VIEW denuncias_view AS SELECT denuncias.idDenuncia,DATE_FORMAT(denuncias.fechaDenuncia,'%d/%m/%Y') AS fechaDenuncia,denuncias.nControl,denuncias.statusDenuncia,miembrofamilia.idIntegrante,miembrofamilia.cedulaIntegrante FROM denuncias INNER JOIN miembrofamilia ON denuncias.idIntegrante=miembrofamilia.idIntegrante;

CREATE VIEW denuncias_all_view AS SELECT denuncias.idDenuncia,denuncias.statusDenuncia,
denuncias.nControl,denuncias.fechaDenuncia,denuncias.motivo,
miembrofamilia.nombreIntegrante,miembrofamilia.apellidoIntegrante,
miembrofamilia.cedulaIntegrante,miembrofamilia.emailIntegrante,
miembrofamilia.telefonoIntegrante, miembrofamilia.idIntegrante,
miembrofamilia.idFamilia,grupofamiliar.direccionFamilia,clap.idClap,
clap.nombreClap, clap.parroquia,clap.nombreComunidad,clap.nombreConsejoComunal,
clap.tlfClap,clap.emailClap FROM denuncias INNER JOIN miembrofamilia ON denuncias.idIntegrante=miembrofamilia.idIntegrante INNER JOIN grupofamiliar ON miembrofamilia.idFamilia=grupofamiliar.idFamilia INNER JOIN clap ON grupofamiliar.idCLAP=clap.idClap
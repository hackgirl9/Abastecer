<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar CLAP</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div id="preloader" class="loader">
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <form action="" method="post" class="col s12" id="clap-register">
                        <div class="row">
                            <h3 class="center-align black-text">Registrar CLAP</h3>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-beenhere prefix grey-text"></i>
                                <input type="text" name="codigoClap" id="codigoClap" class="validate" pattern="[A-Za-z0-9-]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." maxlength="20">
                                <label for="codigoClap">Código CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-playlist_add_check prefix grey-text"></i>
                                <input type="text" name="codigoSala" id="codigoSala" class="validate" pattern="[A-Za-z0-9-]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                                <label for="codigoSala">Código Sala</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <input type="text" name="nombreClap" id="nombreClap" class="validate" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                                <label for="nombreClap">Nombre del CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-chrome_reader_mode prefix grey-text"></i>
                                <input type="text" name="rifClap" id="rifClap" class="validate" pattern="[JVE0-9-]+" title="Solo puede usar J (Jurídico), V (Venezolano) o E (Extranjero) en MAYÚSCULA y números del 0 al 9." required>
                                <label for="rifClap">RIF del CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-map prefix grey-text"></i>
                                <select name="parroquia" id="parroquia" required>
                                    <option disabled selected>Elige una opción</option>
                                    <option>Buena Vista</option>
                                    <option>Catedral</option>
                                    <option>Concepción</option>
                                    <option>Felipe Alvarado</option>
                                    <option>Juan de Villegas</option>
                                    <option>Juarez</option>
                                    <option>Santa Rosa</option>
                                    <option>Tamaca</option>
                                    <option>Unión</option>
                                </select>
                                <label>Parroquia</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-markunread prefix grey-text"></i>
                                <input type="email" name="emailClap" id="emailClap" class="validate" required>
                                <label for="emailClap">E-mail del CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-phone_iphone prefix grey-text"></i>
                                <input type="text" name="tlfClap" id="tlfClap" class="validate" pattern="[0-9]+" title="Solo puede usar números." required>
                                <label for="tlfClap">Teléfono del CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-location_city prefix grey-text"></i>
                                <input type="text" name="nombreComunidad" id="nombreComunidad" class="validate" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                                <label for="nombreComunidad">Nombre Comunidad</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-arrow_upward prefix grey-text"></i>
                                <input type="text" name="limiteNorteComunidad" id="limiteNorteComunidad" class="validate" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                                <label for="limiteNorteComunidad">Limite al Norte</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-arrow_downward prefix grey-text"></i>
                                <input type="text" name="limiteSurComunidad" id="limiteSurComunidad" class="validate" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                                <label for="limiteSurComunidad">Limite al Sur</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-arrow_forward prefix grey-text"></i>
                                <input type="text" name="limiteEsteComunidad" id="limiteEsteComunidad" class="validate" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                                <label for="limiteEsteComunidad">Limite al Este</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-arrow_back prefix grey-text"></i>
                                <input type="text" name="limiteOesteComunidad" id="limiteOesteComunidad" class="validate" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                                <label for="limiteOesteComunidad">Limite al Oeste</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <input type="text" name="nombreConsejoComunal" id="nombreConsejoComunal" class="validate" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                                <label for="nombreConsejoComunal">Nombre Cons. Comunal</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-chrome_reader_mode prefix grey-text"></i>
                                <input type="text" name="rifConsejoComunal" id="rifConsejoComunal" class="validate" pattern="[JVE0-9-]+" title="Solo puede usar J (Juridico), V (Venezolano) o E (Extranjero) en MAYÚSCULA y números del 0 al 9." required>
                                <label for="rifConsejoComunal">RIF del Consjo. Comunal</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-directions prefix grey-text"></i>
                                <select name="zonaSilencio" id="zonaSilencio" required>
                                    <option disabled selected>Elige una opción</option>
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                </select>
                                <label>Zona en Silencio</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-people_outline prefix grey-text"></i>
                                <input type="number" name="cantManzaneros" id="cantManzaneros" min="1" pattern="[0-9]+" title="Solo puede usar números." required>
                                <label for="cantManzaneros">Cantidad de Manzaneros</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-nature prefix grey-text"></i>
                                <input type="number" name="eje" id="eje" min="1" pattern="[0-9]+" title="Solo puede usar números." required>
                                <label for="eje">Eje</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-local_convenience_store prefix grey-text"></i>
                                <input type="number" name="cantViviendas" id="cantViviendas" min="1" pattern="[0-9]+" title="Solo puede usar números." required>
                                <label for="cantViviendas">Cantidad de Viviendas</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-group_add prefix grey-text"></i>
                                <input type="number" name="cantFamilias" id="cantFamilias" min="1" pattern="[0-9]+" title="Solo puede usar números." required>
                                <label for="cantFamilias">Cantidad de Familias</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-local_shipping prefix grey-text"></i>
                                <select name="idEmpresa" id="idEmpresa">
                                    <option disabled selected>Elige una opción</option>
                                </select>
                                <label>Empresa Distribuidora</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-perm_contact_calendar prefix grey-text"></i>
                                <select name="revisadoEnlace" id="revisadoEnlace">
                                    <option disabled selected>Elige una opción</option>
                                    <option value="1">SI</option>
                                    <option value="0">NO</option>
                                </select>
                                <label>Revisado por Enlace P.</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-directions prefix grey-text"></i>
                                <select name="estado" id="estado">
                                    <option disabled selected>Elige una opción</option>
                                    <option value="1">Admitido</option>
                                    <option value="0">Suspendido</option>
                                </select>
                                <label>Estado</label>
                            </div>
                            <div class="col s12 center-align buttons section">
                                <button type="submit" class="btn indigo-45deg-gradient-1 waves-effect" id="register" name="register"><i class="icon-add_box right"></i>Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/CLAP.js"></script>
</body>
</html>
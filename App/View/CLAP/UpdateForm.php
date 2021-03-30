<form action="" method="post" id="clap-update" class="modal-update modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Actualizar CLAP - <?php echo $register->nombreClap; ?></h4>
        <!-- Formulario para actualizar -->
        <div class="row">
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-beenhere prefix grey-text"></i>
                <input type="text" name="codigoClap" id="codigoClap" class="validate" maxlength="20" placeholder="" pattern="[A-Za-z0-9-]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9.">
                <label for="codigoClap">Código CLAP</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-playlist_add_check prefix grey-text"></i>
                <input type="text" name="codigoSala" id="codigoSala" class="validate" placeholder="" pattern="[A-Za-z0-9-]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                <label for="codigoSala">Código Sala</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-streetview prefix grey-text"></i>
                <input type="text" name="nombreClap" id="nombreClap" class="validate" placeholder="" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                <label for="nombreClap">Nombre del CLAP</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-chrome_reader_mode prefix grey-text"></i>
                <input type="text" name="rifClap" id="rifClap" class="validate" placeholder="" pattern="[JVE0-9-]+" title="Solo puede usar J (Jurídico), V (Venezolano) o E (Extranjero) en MAYÚSCULA y números del 0 al 9." required>
                <label for="rifClap">RIF del CLAP</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="prefix grey-text"></i>
                <select name="parroquia" id="parroquia">
                    <option disabled selected>Elige una opción</option>
                    <option value="Buena Vista">Buena Vista</option>
                    <option value="Catedral">Catedral</option>
                    <option value="Concepción">Concepción</option>
                    <option value="Felipe Alvarado">Felipe Alvarado</option>
                    <option value="Juan de Villegas">Juan de Villegas</option>
                    <option value="Juarez">Juarez</option>
                    <option value="Santa Rosa">Santa Rosa</option>
                    <option value="Tamaca">Tamaca</option>
                    <option value="Unión">Unión</option>
                </select>
                <label>Parroquia</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-markunread prefix grey-text"></i>
                <input type="email" name="emailClap" id="emailClap" class="validate" placeholder="" required>
                <label for="emailClap">E-mail del CLAP</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-phone_iphone prefix grey-text"></i>
                <input type="text" name="tlfClap" id="tlfClap" class="validate" placeholder="" pattern="[0-9]+" title="Solo puede usar números." required>
                <label for="tlfClap">Teléfono del CLAP</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-location_city prefix grey-text"></i>
                <input type="text" name="nombreComunidad" id="nombreComunidad" class="validate" placeholder="" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                <label for="nombreComunidad">Nombre Comunidad</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-arrow_upward prefix grey-text"></i>
                <input type="text" name="limiteNorteComunidad" id="limiteNorteComunidad" class="validate" placeholder="" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                <label for="limiteNorteComunidad">Limite al Norte</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-arrow_downward prefix grey-text"></i>
                <input type="text" name="limiteSurComunidad" id="limiteSurComunidad" class="validate" placeholder="" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                <label for="limiteSurComunidad">Limite al Sur</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-arrow_forward prefix grey-text"></i>
                <input type="text" name="limiteEsteComunidad" id="limiteEsteComunidad" class="validate" placeholder="" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                <label for="limiteEsteComunidad">Limite al Este</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-arrow_back prefix grey-text"></i>
                <input type="text" name="limiteOesteComunidad" id="limiteOesteComunidad" class="validate" placeholder="" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                <label for="limiteOesteComunidad">Limite al Oeste</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-streetview prefix grey-text"></i>
                <input type="text" name="nombreConsejoComunal" id="nombreConsejoComunal" class="validate" placeholder="" pattern="[A-Za-z0-9 ]+" title="Solo puede usar letras desde la A a la Z y números del 0 al 9." required>
                <label for="nombreConsejoComunal">Nombre Cons. Comunal</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-chrome_reader_mode prefix grey-text"></i>
                <input type="text" name="rifConsejoComunal" id="rifConsejoComunal" class="validate" placeholder="" pattern="[JVE0-9-]+" title="Solo puede usar J (Juridico), V (Venezolano) o E (Extranjero) en MAYÚSCULA y números del 0 al 9." required>
                <label for="rifConsejoComunal">RIF del Consjo. Comunal</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="prefix grey-text"></i>
                <select name="zonaSilencio" id="zonaSilencio">
                    <option disabled>Elige una opción</option>
                    <option value="1">Si</option>
                    <option value="0">No</option>
                </select>
                <label>Zona en Silencio</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-people_outline prefix grey-text"></i>
                <input type="number" name="cantManzaneros" id="cantManzaneros" min="1" placeholder="" pattern="[0-9]+" title="Solo puede usar números." required>
                <label for="cantManzaneros">Cantidad de Manzaneros</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-nature prefix grey-text"></i>
                <input type="number" name="eje" id="eje" min="1" placeholder="" pattern="[0-9]+" title="Solo puede usar números." required>
                <label for="eje">Eje</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-local_convenience_store prefix grey-text"></i>
                <input type="number" name="cantViviendas" id="cantViviendas" min="1" placeholder="" pattern="[0-9]+" title="Solo puede usar números." required>
                <label for="cantViviendas">Cantidad de Viviendas</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="icon-group_add prefix grey-text"></i>
                <input type="number" name="cantFamilias" id="cantFamilias" min="1" placeholder="" pattern="[0-9]+" title="Solo puede usar números." required>
                <label for="cantFamilias">Cantidad de Familias</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="prefix grey-text"></i>
                <select name="idEmpresa" id="idEmpresa">
                    <option disabled>Elige una opción</option>
                </select>
                <label>Empresa Distribuidora</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="prefix grey-text left"></i>
                <select name="revisadoEnlace" id="revisadoEnlace">
                    <option disabled>Elige una opción</option>
                    <option value="1">SI</option>
                    <option value="0">NO</option>
                </select>
                <label>Revisado por Enlace P.</label>
            </div>
            <div class="col s12 m6 xl4 input-field">
                <i class="prefix grey-text"></i>
                <select name="estado" id="estado">
                    <option disabled>Elige una opción</option>
                    <option value="1">Admitido</option>
                    <option value="0">Suspendido</option>
                </select>
                <label>Estado</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action modal-close waves-effect btn blue-45deg-gradient-1" name="update" id="updateBtn"><i class="icon-check right"></i>Actualizar</button>
        <a href="" class="modal-action modal-close waves-effect btn red-45deg-gradient-1"><i class="icon-close right"></i>Cancelar</a>
    </div>
</form>  
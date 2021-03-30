<!-- Boton para el modal de registrar nuevo usuario -->
<a href="#modal1" class="btn green-45deg-gradient-1 darken-2 modal-trigger col s12">
    <i class="icon-add left"></i>Registrar Nuevo Integrante<i class="icon-person_add right"></i>
</a>
<!-- Modal con formulario de registro -->
<div class="modal modal-fixed-footer" id="modal1">
    <form action="" method="post" id="clap-update">
        <div class="modal-content">
            <div class="row">
                <h4 class="center-align yellow-text text-darken-2 ">Registrar Integrante</h4>
            </div>
            <div class="row">
                <div class="col s12 m6 input-field">
                    <i class="icon-map prefix grey-text"></i>
                    <select name="parroquia">
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
                <div class="col s12 m6 input-field">
                    <i class="icon-streetview prefix grey-text"></i>
                    <select name="clap" id="clap">
                        <option disabled selected>Seleccione CLAP</option>
                    </select>
                    <label>CLAP</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-contact_mail prefix grey-text"></i>
                    <input type="text" id="cedulaIntegrante"  name="cedulaIntegrante"  class="validate">
                    <label for="cedulaIntegrante">Cedula</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-person_pin prefix grey-text"></i>
                    <input type="text" id="nombreIntegrante"  name="nombreIntegrante"  class="validate">
                    <label for="nombreIntegrante">Nombre</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-person_pin prefix grey-text"></i>
                    <input type="text" id="apellidoIntegrante"  name="apellidoIntegrante"  class="validate">
                    <label for="apellidoIntegrante">Apellido</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-phone_android prefix grey-text"></i>
                    <input id="telefonoIntegrante" type="text" name="telefonoIntegrante"  class="validate">
                    <label for="telefonoIntegrante">Teléfono</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-markunread prefix grey-text"></i>
                    <input type="email" name="emailIntegrante" id="emailIntegrante" class="validate">
                    <label for="emailIntegrante">E-mail</label>
                </div>
                <div class="col s12 m6 xl6 input-field">
                    <i class="icon-date_range prefix grey-text"></i>
                    <label for="fechaEleccion">Fecha Elección</label>
                    <input type="date" name="fechaEleccion" id="fechaEleccion" class="validate">            
                </div>
                <div class="col s12 m6 xl6 input-field">
                    <i class="icon-import_export prefix grey-text"></i>
                        <select name="status">
                            <option disabled selected>Elige una opción</option>
                            <option value="1">Admitido</option>
                            <option value="0">Denegado</option>
                        </select>
                    <label>Status</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-transfer_within_a_station prefix grey-text"></i>
                    <select name="cargo">
                        <option disabled selected>Elige una opción</option>
                        <?php foreach($allCargos as $cargo): ?>
                        <option value="<?php echo $cargo->idCargo; ?>"><?php echo $cargo->cargoRol; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Rol Organización</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action modal-close waves-effect btn green-45deg-gradient-1"><i class="icon-check right"></i>Registrar</button>
            <a href="" class="modal-action modal-close waves-effect btn red-45deg-gradient-1"><i class="icon-close right"></i>Eliminar</a>
        </div>
    </form>
</div>
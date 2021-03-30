<!-- modal-1 -->
<div id="modal-1" class="modal">
    <form action="<?php echo $helper->url('Usuario','updateData'); ?>" method="post">
        <div class="modal-content">
            <div class="row">
                <h4 class="center-align yellow-text text-darken-2">Actualizar Usuario</h4>
            </div>
            <div class="row">
                <input type="hidden" name="idUsuario" value="<?php echo $user->idUsuario; ?>">
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-person_pin prefix grey-text"></i>
                    <input id="nombreUsuario" type="text" name="nombreUsuario" class="validate" value="<?php echo $user->nombreUsuario; ?>">
                    <label for="nombreUsuario">Nombre del Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-person_pin prefix grey-text"></i>
                    <input id="apellidoUsuario" type="text" name="apellidoUsuario" class="validate" value="<?php echo $user->apellidoUsuario; ?>">
                    <label for="apellidoUsuario">Apellido del Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-person prefix grey-text"></i>
                    <input id="usuario" type="text" name="usuario" class="validate">
                    <label for="usuario">Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-security prefix grey-text"></i>
                    <input type="text" name="passwordUsuario" id="passwordUsuario" class="validate">
                    <label for="passwordUsuario">Contraseña</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-contact_mail prefix grey-text"></i>
                    <input id="cedulaUsuario" type="text" name="cedulaUsuario" class="validate">
                    <label for="cedulaUsuario">Cedula del Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-phone_android prefix grey-text"></i>
                    <input id="telefonoUsuario" type="text" name="telefonoUsuario" class="validate">
                    <label for="telefonoUsuario">Telefono del Usuario</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-markunread prefix grey-text"></i>
                    <input type="email" name="emailUsuario" id="emailUsuario" class="validate">
                    <label for="emailUsuario">E-mail del Usuario</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-transfer_within_a_station prefix grey-text"></i>
                    <select name="rolUsuario">
                        <option disabled selected>Elige una opición</option>
                        <option value="1">SuperUsuario</option>
                        <option value="2">Administrador</option>
                        <option value="3">Usuario</option>
                    </select>
                    <label>Rol de Usuario</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action modal-close waves-effect btn blue-45deg-gradient-1" name="update"><i class="icon-check right"></i>Actualizar</button>
            <a href="" class="modal-action modal-close waves-effect btn red-45deg-gradient-1"><i class="icon-close right"></i>Cancelar</a>
        </div>
    </form>
</div>
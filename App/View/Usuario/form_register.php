
<div class="modal modal-fixed-footer modal-update" id="modal1">
    <form action="<?php echo $helper->url('Usuario','registerData'); ?>" method="post">
        <div class="modal-content">
            <div class="row">
                <h4 class="center-align yellow-text text-darken-2 ">Registrar Usuario</h4>
            </div>
            <div class="row">
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-person_pin prefix grey-text"></i>
                    <input id="nombreUsuario" type="text" name="nombreUsuario"  class="datepicker validate">
                    <label for="nombreUsuario">Nombre del Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-person_pin prefix grey-text"></i>
                    <input id="apellidoUsuario" type="text" name="apellidoUsuario"  class="validate">
                    <label for="apellidoUsuario">Apellido del Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-contact_mail prefix grey-text"></i>
                    <input id="cedulaUsuario" type="text" name="cedulaUsuario"  class="validate">
                    <label for="cedulaUsuario">Cedula del Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-phone_android prefix grey-text"></i>
                    <input id="telefonoUsuario" type="text" name="telefonoUsuario"  class="validate">
                    <label for="telefonofUsuario">Telefono del Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-markunread prefix grey-text"></i>
                    <input type="email" name="emailUsuario" id="emailUsuario" class="validate">
                    <label for="emailUsuario">E-mail del Usuario</label>
                </div>
                <div class="col s12 m6 xl4 input-field">
                    <i class="icon-person prefix grey-text"></i>
                    <input id="usuario" type="text" name="usuario"  class="validate">
                    <label for="usuario">Usuario</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-security prefix grey-text"></i>
                    <input type="text" name="passwordUsuario" id="passwordUsuario" class="validate">
                    <label for="passwordUsuario">Contraseña</label>
                </div>
                <div class="col s12 m6 input-field">
                    <i class="icon-transfer_within_a_station prefix grey-text"></i>
                    <select name="rolUsuario">
                        <option disabled selected>Elige una opición</option>
                        <option>SuperUsuario</option>
                        <option>Administrador</option>
                        <option>Usuario</option>
                    </select>
                    <label>Rol de Usuario</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="modal-action modal-close waves-effect btn green-45deg-gradient-1" name="register"><i class="icon-check right"></i>Registrar</button>
            <a href="" class="modal-action modal-close waves-effect btn red-45deg-gradient-1"><i class="icon-close right"></i>Eliminar</a>
        </div>
    </form>
</div>
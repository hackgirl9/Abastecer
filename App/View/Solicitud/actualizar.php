<form action="<?php echo $helper->url("Solicitud","update"); ?>" method="post" id="modal2" class="modal-update modal modal-fixed-footer">
    <div class="modal-content">
        <h4>Actualizar Solicitud</h4>
        <!-- Formulario para actualizar -->
        <div class="row">
            <div class="col s6 input-field">
                <i class="icon-insert_comment prefix grey-text"></i>
                <textarea id="" class="materialize-textarea" disabled><?php echo $users->beneficioSolicitud; ?></textarea>
                <label id="beneficioSolicitud" for="textarea1">Beneficio</label>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" class="modal-action modal-close waves-effect btn blue-45deg-gradient-1" name="update" id="updateBtn"><i class="icon-check right"></i>Actualizar</button>
        <a href="" class="modal-action modal-close waves-effect btn red-45deg-gradient-1"><i class="icon-close right"></i>Cancelar</a>
    </div>
</form>  
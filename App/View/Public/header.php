<header>
    <nav class="red-45deg-gradient-1">
        <div class="nav-wrapper">
            <a href="" class="brand-logo">Abastecer C.A.</a>
            <ul id="nav" class="right hide-on-small-only">
                <li><a href="<?php echo $helper->url('Home','index'); ?>"><i class="icon-home left"></i>Inicio</a></li>
                <li><a href="<?php echo $helper->url('Login','cerrarSesion'); ?>"><i class="icon-directions_run left"></i>Salir</a></li>
            </ul>
            <ul id="nav-mobile" class="sidenav sidenav-fixed lateral-scrollbar">
                <li>
                    <div class="user-view" style="padding-bottom: 200px">
                        <div class="background">
                            <img src="Assets/img/big-logo.jpg" class="responsive-img" style="padding-bottom: 200px">
                        </div>
                    </div>
                </li>
                <li><div class="divider"></div></li>
                <li class="show-on-medium-and-down hide-on-large-only"><a href="<?php echo $helper->url('Home', 'index'); ?>" class="waves-effect waves-red"><i class="icon-home left"></i>Inicio</a></li>
                <li><a href="" class="waves-effect waves-red"><i class="icon-person left"></i><?php if(!isset($_SESSION['USUARIO'])){ header("Location:index.php?controller=Login&action=index"); }else{ echo $_SESSION['USUARIO'];} ?></a></li>
                <li><a href="#!" class="waves-effect waves-red"><i class="icon-mail_outline"></i><?php echo $_SESSION['EMAILUSUARIO']; ?></a></li>
                <li><a href="<?php echo $helper->url('Home','perfilHome'); ?>" class="waves-effect waves-red"><i class="icon-cloud_circle"></i>Información Personal</a></li>
                <li><a href="<?php echo $helper->url('Atencion','allNotificationes'); ?>" class="waves-effect waves-red"><i class="icon-notifications"></i>Notificaciones<span class="red-top-gradient-1" id="notification"  data-badge-caption="nueva(s)"></span></span></a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Funciones:</a></li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li>
                            <a class="collapsible-header waves-effect waves-red">Módulos<i class="icon-apps"></i></a>
                            <div class="collapsible-body">
                                <ul id="list-animate">
                                    <li><a href="<?php echo $helper->url('Home','clapHome'); ?>" class="waves-effect waves-red"><i class="icon-streetview right"></i>Gestionar CLAP</a></li>
                                    <li><a href="<?php echo $helper->url('Home','familiaHome'); ?>" class="waves-effect waves-red"><i class="icon-account_balance right"></i>Gestionar Familia</a></li>
                                    <li><a href="<?php echo $helper->url('Home','atencionHome'); ?>" class="waves-effect waves-red"><i class="icon-contact_mail right"></i>Getionar Atención</a></li>
                                    <li><a href="<?php echo $helper->url('Home','solicitudHome'); ?>" class="waves-effect waves-red"><i class="icon-work right"></i>Gestionar Solicitud</a></li>
                                    <li><a href="<?php echo $helper->url('Home','denunciaHome'); ?>" class="waves-effect waves-red"><i class="icon-assignment right"></i>Gestionar Denuncia</a></li>
                                    <li><a href="<?php echo $helper->url('Reporte','index'); ?>" class="wavel-effect waves-red"><i class="icon-assignment_turned_in right"></i>Gestionar Reportes</a></li>
                                    <?php if($_SESSION['ROLUSUARIO']=='SuperUsuario'):?>
                                    <li><a href="<?php echo $helper->url('DashBoard','index'); ?>" class="waves-effect waves-red"><i class="icon-poll right"></i>Reporte General</a></li>
                                    <?php endif;?>
                                </ul>
                            </div>
                        </li>
                        <?php if($_SESSION['ROLUSUARIO']=='SuperUsuario'): ?>
                        <li><a href="<?php echo $helper->url('Home','usuarioHome'); ?>" class="collapsible-header waves-effect"><i class="icon-settings"></i>Administrar Usuarios</a></li>
                        <?php endif;?>
                        <li><a href="<?php echo $helper->url("Home","ayudaHome"); ?>" class="collapsible-header waves-effect"><i class="icon-help"></i>Ayuda</a></li>
                        <li class="show-on-medium-and-down hide-on-large-only"><a href="<?php echo $helper->url('Login', 'cerrarSesion'); ?>" class="collapsible-header waves-effect"><i class="icon-directions_run left"></i>Salir</a></li>
                    </ul>
                </li>
            </ul>
            <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="icon-menu"></i></a>
        </div>
    </nav>
</header>
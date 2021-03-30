<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Abastecer C.A.</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/login.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once "header.php"; ?>
    <main>
        <section class="container section">
            <div class="row">
                <div class="col s12 valign-wrapper">
                    <div class="col s12 l6 logo-image hide-on-med-and-down">
                        <img src="Assets/img/LogoApp.png" alt="" class="responsive-img">
                    </div>
                    <div class="col s12 m12 l6 login-box">
                        <div class="row">
                            <div class="section center-align">
                                <h3 class="red-text text-darken-4">Iniciar Sesión</h3>
                            </div>
                            <div class="container center-align red-text" id="response-text">

                            </div>
                        </div>
                        <div class="row">
                            <form method="POST" class="login-form" name="form-entrar" id="form-entrar">
                                <div class="input-field col s12">
                                    <i class="icon-account_circle prefix grey-text"></i>
                                    <input type="text" name="username" id="username" class="validate" minlength="5" maxlength="7" required>
                                    <label for="username">Usuario: </label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="icon-lock prefix grey-text"></i>
                                    <input type="password" name="password" id="password" class="validate" minlength="4" required>
                                    <label for="password">Contraseña:</label>
                                </div>
                                <div class="row">
                                    <div class="col s12 center login-btn">
                                        <button type="submit" id="login" name="send" class="btn yellow-45deg-gradient-1 waves-effect btn-login"><i class="icon-send right"></i>Entrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php require_once "footer.php"; ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/login.js"></script>
</body>
</html>
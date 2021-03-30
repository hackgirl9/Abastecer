<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="../../Assets/css/materialize.min.css">

    <title>Gestionar Denuncia</title>
    
    <style>

        table{
            border-collapse: collapse;
            margin: auto;
        }

        tr {
            margin: 15px;
            padding: 15px;
        }
        td {
            margin: 15px;
            padding: 15px;
        }

        th{
            margin: 15px;
            padding: 15px;
        }
        .nav{
            height:120px;
            background-color:#8B008B;
            color:white;
        }

        .titulo{
            text-align:right;
            margin-top:-90px;
            margin-right:5px;
            font-size:50px;
        }

        .img{
            width:200px;
            height:120px;
        }

        .main{
            margin-top:0px;
            margin-left:2px;
            width:100%;
            border-radius:5px;
        }
        .fecha{
            text-align:right;
            margin-top:-20px;
            margin-right:5px;
            font-size:30px;  }        

        .cint{
            background-color:#8B008B;
            color:white;
            margin-top:30px;
            border-radius:5px;
            /*margin-left:50px;
            margin-right:60px;
            */
           text-align:center;
        }
    </style>
</head>
<body>


    <div class="nav">
    <img src="Assets/img/big-logo.jpg" class="img" width="300px" >  
     <h2 class="titulo">Informe Denuncia</h2>
     <p class="fecha"><?php echo $fecha= date("d/m/Y")?></p>
    </div>
    <div class="cint"><i class="icon-assignment_ind"></i> <h4 class="center">Datos de Denuncia</h4></div>
   
    <div class="main">

        <div class="tabla">
            <table border="1" width="1000px">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Cedula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Telefono</th>
                        <th>Parroquia</th>
                        <th>CLAP</th>
                        <th>Fecha</th>
                        <th>Status</th>
                        <th>Motivo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $resultado) : ?>
                    <tr>
                        <td><?php echo ucwords($resultado->nombreIntegrante)?></td>
                        <td><?php echo ucwords($resultado->cedulaIntegrante)?></td>
                        <td><?php echo ucwords($resultado->nombreIntegrante)?></td>
                        <td><?php echo ucwords($resultado->apellidoIntegrante)?></td>
                        <td><?php echo ucwords($resultado->direccionFamilia)?></td>
                        <td><?php echo ucwords($resultado->telefonoIntegrante)?></td>
                        <td><?php echo ucwords($resultado->parroquia)?></td>
                        <td><?php echo ucwords($resultado->nombreClap)?></td>
                        <td><?php echo ucwords($resultado->fechaDenuncia)?></td>
                        <td><?php echo ucwords($resultado->statusDenuncia)?></td>
                        <td><?php echo ucwords($resultado->motivo)?></td>

                    </tr>
                    <?php  endforeach?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
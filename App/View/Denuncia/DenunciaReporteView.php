
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
            width:1000px;
        }

        th{
            margin-left:30px;
            height:50px;
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
        }

        .img{
          
            width:200px;
            height:120px;
             
        }

        .main{
            margin-top:0px;
            margin-left:2px;
            width:99%;
            height:100px;
            border:black 1px;
            border-radius:5px;
          
          
        }
        .fila{
            
            width:740px;
            margin-top:-15px;
            margin-buttom:-10px;
            
            
        }
        .col1{
            margin:10px;
            width:350px;
        }

        .col2{
            margin-left:370px;
            margin-top:-64px;
            width:350px;
           
        }
        .n{
            text-align:right;
            margin-top:-20px;
            margin-right:5px;          
        }
        .fecha{
            text-align:right;
            margin-top:-20px;
            margin-right:5px;
 
        }
        .center{
            text-align:center;
        }
      
        p{margin-top:-10px;}
        
        .cint{
        background-color:#8B008B;
        color:white;
        margin-top:20px;
        margin-buttom:0px;
        border-radius:5px;
        }
        
        .cint {
        color:white;
        }


    </style>
</head>
<body>
    <?php foreach($datos as $resultado):
        if($resultado->idDenuncia===$id){
    ?>

    <div class="nav">
    <img src="Assets/img/big-logo.jpg" class="img" width="300px" >  
     <h2 class="titulo">Informe Denuncia</h2>
     <h3 class="n">N°<?php echo $resultado->nControl?></h3>
     <p class="fecha"><?php echo $fecha= date("d/m/Y")?></p>
    </div>
    <div class="cint"><i class="icon-assignment_ind"></i> <h4 class="center">Datos Personales del Denunciante</h4></div>
   
    
    <div class="main">
    
        <div class="fila">
            <div class="col1">
                <h4>Nombre: </h4><p><?php echo ucwords($resultado->nombreIntegrante)?></p>
            </div>
            <div class="col2">
                <h4>Apellido:</h4><p><?php echo ucwords($resultado->apellidoIntegrante)?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Cedula:</h4><p><?php echo $resultado->cedulaIntegrante?></p>
            </div>
            <div class="col2">
                <h4>Email:</h4><p><?php echo $resultado->emailIntegrante?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Telefono:</h4><p><?php echo $resultado->telefonoIntegrante?></p>
            </div>
            <div class="col2">
                <h4>Direccion:</h4><p><?php echo ucwords($resultado->direccionFamilia)?></p>
            </div>
        </div>
       
    </div>
    
    <div class="cint"><h4 class="center">Datos Denuncia</h4></div>
    
    <div class="main">
    
        <div class="fila">
            
            <div class="col1">
                <h4>Fecha:</h4><p><?php echo $resultado->fechaDenuncia?></p>
            </div>
            <div class="col2">
                <h4>Estatus:</h4><p><?php echo $resultado->statusDenuncia?></p>
            </div>
        </div>
        <div class="fila"> 
            <div class="col1">
                <h4>Descripcion:</h4><p><?php echo $resultado->motivo?></p>
            </div>
        </div>      
    </div>
    
    <div class="cint"> <h4 class="center">Datos del CLAP perteneciente</h4></div>
    
    <div class="main">
    
        <div class="fila">
            <div class="col1">
                <h4>CLAP: </h4><p><?php echo ucwords($resultado->nombreClap)?></p>
            </div>
            <div class="col2">
                <h4>Parroquia:</h4><p><?php echo ucwords($resultado->parroquia)?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Comunidad:</h4><p><?php echo ucwords($resultado->nombreComunidad)?></p>
            </div>
            <div class="col2">
                <h4>Consejo Comunal:</h4><p><?php echo ucwords($resultado->nombreConsejoComunal)?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Telefono:</h4><p><?php echo $resultado->tlfClap?></p>
            </div>
            <div class="col2">
                <h4>Email:</h4><p><?php echo $resultado->emailClap?></p>
            </div>
        </div>
    </div>
    
    <?php } endforeach?>
   
</body>
</html>
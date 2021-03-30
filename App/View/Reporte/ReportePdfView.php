<style type="text/css">
    table{
        width:1000px;
    }

    th{
        margin-left:30px;
        height:50px;
    }
    .nav{
        height:120px;
        background-color:#c62828;
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
      
    p{
        margin-top:-10px;
    }
        
    .cint{
        background-color:#c62828;
        color:white;
        margin-top:20px;
        margin-buttom:0px;
        border-radius:5px;
    }
        
    .cint {
        color:white;
    }
</style>
<page backtop="20px" backbottom="20px" backleft="20px" backright="20px">
    <div class="nav">
        <img src="Assets/img/big-logo.jpg" class="img" width="300px" >  
        <h2 class="titulo">Reporte CLAP</h2>
        <h3 class="n">Nombre CLAP: <?php echo $allClap->nombreClap; ?></h3>
        <h3 class="n">Código Sala: <?php echo $allClap->codigoSala; ?></h3>
    </div>
    <div class="cint"><i class="icon-assignment_ind"></i> 
        <h4 class="center">Datos Generales del CLAP</h4>
    </div>
    <div class="main">
        <div class="fila">
            <div class="col1">
                <h4>Nombre CLAP: </h4><p><?php echo ucwords($allClap->nombreClap) ?></p>
            </div>
            <div class="col2">
                <h4>Código CLAP:</h4><p><?php echo $allClap->codigoClap; ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Código Sala:</h4><p><?php echo $allClap->codigoSala; ?></p>
            </div>
            <div class="col2">
                <h4>RIF: </h4><p><?php echo $allClap->rifClap; ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Parroquia:</h4><p><?php echo $allClap->parroquia ?></p>
            </div>
            <div class="col2">
                <h4>Comunidad:</h4><p><?php echo ucwords($allClap->nombreComunidad) ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>E-mail:</h4><p><?php echo $allClap->emailClap ?></p>
            </div>
            <div class="col2">
                <h4>Teléfono:</h4><p><?php echo $allClap->tlfClap ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Eje: </h4><p><?php echo $allClap->eje ?></p>
            </div>
            <div class="col2">
                <h4>Cant. Manzaneros:</h4><p><?php echo $allClap->cantManzaneros; ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Cant. Viviendas:</h4><p><?php echo $allClap->cantViviendas; ?></p>
            </div>
            <div class="col2">
                <h4>Cant. Familias: </h4><p><?php echo $allClap->cantFamilias; ?></p>
            </div>
        </div>
    </div>
    <div class="cint"><i class="icon-assignment_ind"></i> 
        <h4 class="center">Datos Geo Estrategicos del CLAP</h4>
    </div>
    <div class="main">
        <div class="fila">
            <div class="col1">
                <h4>Límite al Norte: </h4><p><?php echo $allClap->limiteNorteComunidad ?></p>
            </div>
            <div class="col2">
                <h4>Límite al Sur:</h4><p><?php echo $allClap->limiteSurComunidad; ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Límite al Este:</h4><p><?php echo $allClap->limiteEsteComunidad; ?></p>
            </div>
            <div class="col2">
                <h4>Límite al Oeste: </h4><p><?php echo $allClap->limiteOesteComunidad; ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Consejo Comunal:</h4><p><?php echo $allClap->nombreConsejoComunal; ?></p>
            </div>
            <div class="col2">
                <h4>RIF del Consejo Comunal:</h4><p><?php echo $allClap->rifConsejoComunal; ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Zona en Silencio:</h4><p><?php echo ($allClap->zonaSilencio == 1) ? "SI" : "NO"; ?></p>
            </div>
            <div class="col2">
                <h4>Estado:</h4><p><?php echo($allClap->estado == 1) ? "Admitido" : "Suspendido"; ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Revisado por Enlace Político:</h4><p><?php echo ($allClap->revisadoEnlace == 1) ? "SI" : "NO"; ?></p>
            </div>
            <div class="col2">
                <h4>Enlace Político:</h4><p><?php echo "$allClap->nombreEnlace $allClap->apellidoEnlace"; ?></p>
            </div>
        </div>
        <div class="fila">
            <div class="col1">
                <h4>Empresa Distribuidora:</h4><p><?php echo $allClap->nombreEmpresa; ?></p>
            </div>
        </div>
    </div>
</page>
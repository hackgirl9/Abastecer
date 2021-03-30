<style>
    #left {
        width: 30%;
        height: 120px;
    }

    h2{
        color: #427332;
    }

    table {
        font-size: 14px;
    }

    .content{
        border: 2px solid #fcfcfcfc;
        width:750px;
        margin-left:-41px;
        border-radius: 5px;
        height:auto;
    }


    .content-beneficiarios{
        border: 2px solid #fcfcfcfc;
        border-bottom: none;
        width: 750px;
        margin-left:-37px;
        border-radius: 5px;
        margin-bottom: -10px;
    }

    .title{
        border-bottom: 2px solid #000 ;
        font-weight: bold;
        background-color:#c62828;
        color: #FFF;
    }

    .title-bene{
        font-weight: 700;
        background-color:#c62828;
        color:#FFF

    }

    table{
        margin: 10px;
    }

    tr{
        border-bottom: 5px solid #000 !important;
        margin-top:-50px;
    }

    .table-bene td{
        border: none;
        text-align: center;

    }

    .table-bene{
        font-size: 12.3px;
        margin-left:-37px ;
        border: 2px solid #000;
        border-radius: 5px;
    }

    #encabezado {
        padding:10px 0;
        border-top: 1px solid;
        border-bottom: 1px solid;
        width:100%;
        margin-left: -5px;
    }

    #encabezado .fila #col_1 {
        width: 20%
    }
    #encabezado .fila #col_2 {
        text-align:center;
        width: 50%
    }
    #encabezado .fila #col_3 {
        width: 20%;
    }

    #encabezado .fila td img {
        width:50%
    }
    #encabezado .fila #col_2 #span2{
        font-size: 12px;
        color:#427332;

    }

    h4{
        font-weight:none;
    }
    
</style>
<?php
    /* Establece el formato de fecha de Venezuela. */
    date_default_timezone_set("America/Caracas");
    /* Establece la fecha en español. */
    setlocale(LC_ALL, 'spanish');
?>
<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm" hideheader="2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20"s>
    <page_header >
        <table id="encabezado" align="center">
            <tr class="fila">
                <td id="col_1" >
                    <img src="Assets/img/big-logo.jpg" style="height: 100px; width: 160px;">
                </td>
                <td id="col_2">
                    <h2>INFORME DE CLAP</h2>
                    <br>
                    <span id="span2">Barquisimeto, <?php echo strftime('%d de %B del %Y'); ?></span>
                </td>
                <td id="col_3" align="right">
                    <img src="Assets/img/CLAP_Icon-1.png" style="height: 100px; width: 100px;">
                </td>
            </tr>
        </table>
    </page_header>
    <div class="content" style="margin-top: 130px">
        <div class="title"><h4 align="center"><b>DATOS GENERALES</b></h4></div>
        <div>
            <table cellspacing="7" cellpadding="" align="center" style="margin:0;">
                <tr>
                    <td><h4><b>Nombre CLAP: </b><?php echo ucwords($allClap->nombreClap) ?></h4></td>
                    <td><h4><b>Código CLAP: </b><?php echo $allClap->codigoClap; ?></h4></td>
                    <td><h4><b>Código Sala: </b><?php echo $allClap->codigoSala; ?></h4></td>
                </tr>
                <tr>
                    <td><h4><b>RIF CLAP: </b><?php echo $allClap->rifClap ?></h4></td>
                    <td><h4><b>Parroquia: </b><?php echo $allClap->parroquia; ?></h4></td>
                    <td><h4><b>Comunidad: </b><?php echo ucwords($allClap->nombreComunidad); ?></h4></td>
                </tr>
                <tr>
                    <td><h4><b>E-mail: </b><?php echo $allClap->emailClap; ?></h4></td>
                    <td><h4><b>Teléfono: </b><?php echo $allClap->tlfClap; ?></h4></td>
                    <td><h4><b>Eje: </b><?php echo $allClap->eje; ?></h4></td>
                </tr>
                <tr>
                    <td><h4><b>Cant. Manzaneros: </b><?php echo $allClap->cantManzaneros; ?></h4></td>
                    <td><h4><b>Cant. Viviendas: </b><?php echo $allClap->cantViviendas; ?></h4></td>
                    <td><h4><b>Cant. Familias: </b><?php echo $allClap->cantFamilias; ?></h4></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="content" style="margin-top: 30px">
        <div class="title"><h4 align="center"><b>DATOS DE COMUNA</b></h4></div>
        <div>
            <table cellspacing="" cellpadding="" align="center" style="margin:0;">
                <tr>
                    <td><h4><b>Límite al Norte: </b><?php echo $allClap->limiteNorteComunidad; ?></h4></td>
                    <td><h4><b>Límite al Sur: </b><?php echo $allClap->limiteSurComunidad; ?></h4></td>
                    <td><h4><b>Límite al Este: </b><?php echo $allClap->limiteEsteComunidad; ?></h4></td>
                </tr>
                <tr>
                    <td><h4><b>Límite al Oeste: </b><?php echo $allClap->limiteOesteComunidad ?></h4></td>
                    <td><h4><b>Consejo Comunal: </b><?php echo $allClap->nombreConsejoComunal; ?></h4></td>
                    <td><h4><b>RIF Cons. Comunal: </b><?php echo $allClap->rifConsejoComunal; ?></h4></td>
                </tr>
                <tr>
                    <td><h4><b>Zona Silencio: </b><?php echo ($allClap->zonaSilencio == 1) ? "SI" : "NO";; ?></h4></td>
                    <td><h4><b>Estado: </b><?php echo ($allClap->estado == 1) ? "Admitido" : "Suspendido"; ?></h4></td>
                    <td><h4><b>Revisado Enlace Político: </b><?php echo ($allClap->revisadoEnlace == 1) ? "SI" : "NO"; ?></h4></td>
                </tr>
                <tr>
                    <td><h4><b>Enlace Político: </b><?php echo "$allClap->nombreEnlace $allClap->apellidoEnlace"; ?></h4></td>
                    <td></td>
                    <td><h4><b>Distribuidora: </b><?php echo $allClap->nombreEmpresa; ?></h4></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="content-beneficiarios " style="margin-top: 20px;"  >
        <div class="title-bene"><h4 align="center"><b>FAMILIAS BENEFICIADAS</b></h4></div>
    </div>
        <?php if($allFamilias == null): ?>
        <h3 class="center">No hay familias registradas aún.</h3>
        <?php endif; ?>
        <?php if($allFamilias != null): ?>
        <table cellspacing="20" cellpadding="0"  class="table-bene">
            <tr>
                <td><b>N°</b></td>
                <td><b>GRUPO FAMLLIAR</b></td>
                <td><b>APELLIDOS DE LA FAMILIA</b></td>
                <td><b>MANZANA</b></td>
                <td><b>N° VIVIENDA</b></td>
                <td></td>
                <td><b>MERCADOS ASIGNADOS</b></td>
            </tr>
            <?php $i=1; $acum=0; ?>
            <?php foreach ($allFamilias as $familia):?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $familia->grupoFamiliar; ?></td>
                <td><?php echo $familia->apellidoFamilia?></td>
                <td><?php echo $familia->numManzana?></td>
                <td><?php echo $familia->numVivienda ?></td>
                <td></td>
                <td><?php echo $familia->cantMercadosAsignados; $acum+=$familia->cantMercadosAsignados ?></td>
            </tr>
            <?php endforeach;?>
        </table>
        <div align="right">
            <span><b>TOTAL DE MERCADOS ASIGNADOS:</b> <?php echo $acum ?></span>
        </div>
        <?php endif; ?>
    <page_footer>

    </page_footer>
</page>


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
        height:300px;
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
        background-color:#166AC5;
        color: #FFF;
    }

    .title-bene{
        font-weight: 700;
        background-color:#166AC5;
        color:#FFF

    }
    table{
        margin: 10px;

    }
    tr{
        border-bottom: 5px solid #000 !important;
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


</style>
<?php
/*Para que coloque la fecha de venezuela*/
date_default_timezone_set("America/Caracas");
/*Establece la fecha en español */

setlocale(LC_ALL, 'spanish');
?>

<page backtop="7mm" backbottom="7mm" backleft="10mm" backright="10mm" hideheader="2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20"s>
    <page_header >

        <table id="encabezado" align="center">
            <tr class="fila">
                <td id="col_1" >
                    <img  src="Assets/img/Family_Icon-1.png">
                </td>
                <td id="col_2">
                    <h2>INFORME DE ATENCIÓN</h2>
                    <br>
                    <span id="span2">Barquisimeto, <?php echo  strftime('%d de %B del %Y')?></span>
                </td>
                <td id="col_3" align="right" >
                    <img src="Assets/img/Atention_Icon-1.png" style="height: 100px" >
                </td>
            </tr>
        </table>
    </page_header>



    <div class="content" style="margin-top: 130px">
        <div class="title"><h4 align="center"><b>DATOS GENERALES</b></h4></div>
        <div>
            <table cellspacing="10" cellpadding="" align="center" style="margin-left: -10px;">
                <tr class="p-5 columna-color" >
                    <td><b>FECHA ATENCIÓN:</b> <?php echo $allAtencion->fechaAtencion ?></td>
                    <td><b>PARROQUIA:</b><?php echo $allAtencion->parroquia ?></td>
                    <td><b>NOMBRE DE CLAP:</b> <?php echo $allAtencion->nombreClap?></td>
                </tr>
                <tr class="p-5">
                    <td colspan="1"><b>FAMILIAS BENEFICIADAS:</b> <?php echo $allAtencion->cantidad?> </td>
                    <td colspan="1"><b>TIPO ATENCIÓN:</b> <?php echo $allAtencion->tipoAtencion?></td>
                    <td></td>
                </tr>
                <tr align="justify">
                    <td colspan="3" style="font-size: 11.5px"><b style="font-size: 13px">OBSERVACIÓN:</b> <?php echo $allAtencion->observacion?></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>

    </div>

    <div class="content-beneficiarios " style="margin-top: 20px;"  >
        <div class="title-bene"><h4 align="center"><b>FAMILIAS BENEFICIADAS</b></h4></div>
    </div>

            <table cellspacing="20"  class="table-bene">
                <tr>
                    <td><b>N</b>°</td><td><b>GRUPO FAMLLIAR</b></td><td><b>APELLIDOS DE LA FAMILIA</b></td><td><b>MANZANA</b></td><td><b>N° VIVIENDA</b></td><td></td><td><b>MERCADOS ASIGNADOS</b></td>
                </tr>
                <?php $i=1;$acum=0; ?>
                <?php foreach ($allBeneficiarios as $beneficiario):?>
                <tr>
                    <td><?php echo $i++; ?></td><td><?php echo $beneficiario->grupoFamiliar?></td><td><?php echo $beneficiario->apellidoFamilia?></td><td><?php echo $beneficiario->numManzana?></td><td><?php echo $beneficiario->numVivienda ?></td><td></td><td><?php echo $beneficiario->cantMercadosAsignados;$acum+=$beneficiario->cantMercadosAsignados ?></td>
                </tr>
                <?php endforeach;?>
            </table>
        <div align="right">
            <span><b>TOTAL DE MERCADOS ENTREGADOS:</b> <?php echo $acum ?></span>
        </div>

    <page_footer>

    </page_footer>
</page>

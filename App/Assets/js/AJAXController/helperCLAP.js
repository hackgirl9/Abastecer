$(document).ready(function(){
    $("select[name=parroquia]").on('change',function(){
        var parroquia=$('select[name=parroquia]').val();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data:{parroquia:parroquia},
            url:"index.php?controller=AjaxHelper&action=getCLAP",

            beforeSend:function () {
                $("#idClap").html("<option disabled>Cargando...</option>");
            },
            success:function (data) {
                var acum="<option disabled selected>Elige un CLAP</option>";
                //compruebo si viene vacio el array de objetos

                if(data[0] === null){
                    acum="<option disabled selected>No hay CLAP</option>";
                }else{//si no viene vacio lo recorro
                    data.forEach(function(clap,index){
                        acum += '<option value=' + clap.idClap + '>' + clap.nombreClap+ '</option>';
                    });
                }

                //finalmente suplanto el contenido del select
                $("#idClap").html(acum);
                $('select').formSelect();
            },
            error:function (err) {
                console.log(err);
            }
        });
    });
});
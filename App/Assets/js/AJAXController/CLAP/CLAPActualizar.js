$(document).ready(function(){
    function getIdClapByUrl() {
        var variables = {};
        var arreglos = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            variables[key] = value;
        });
        return variables;
    }

    var idClap = getIdClapByUrl()['idClap'];
    $.ajax({
        method: "GET",
        dataType: "json",
        data:{ idClap: idClap },
        url: "index.php?controller=CLAP&action=getClapById",
        success: function(data){
            console.log(data);
            $("#codigoClap").val(data.codigoClap);
            $("#codigoSala").val(data.codigoSala);
            $("#nombreClap").val(data.nombreClap);
            $("#rifClap").val(data.rifClap);
            $("#parroquia option[value='" + data.parroquia + "']").prop("selected",true);
            $("#emailClap").val(data.emailClap);
            $("#tlfClap").val(data.tlfClap);
            $("#nombreComunidad").val(data.nombreComunidad);
            $("#limiteNorteComunidad").val(data.limiteNorteComunidad);
            $("#limiteSurComunidad").val(data.limiteSurComunidad);
            $("#limiteEsteComunidad").val(data.limiteEsteComunidad);
            $("#limiteOesteComunidad").val(data.limiteOesteComunidad);
            $("#nombreConsejoComunal").val(data.nombreConsejoComunal);
            $("#rifConsejoComunal").val(data.rifConsejoComunal);
            $("#zonaSilencio option[value='" + data.zonaSilencio + "']").prop("selected", true);
            $("#cantManzaneros").val(data.cantManzaneros);
            $("#eje").val(data.eje);
            $("#revisadoEnlace option[value='" + data.revisadoEnlace + "']").prop("selected", true);
            $("#cantViviendas").val(data.cantViviendas);
            $("#cantFamilias").val(data.cantFamilias);
            $("#estado option[value='" + data.estado + "']").prop("selected", true);
            // var idEnlace = $("#idEnlace").val();
            $("#idEmpresa option[value='" + data.idEmpresa + "']").prop("selected", true);
        },
        error: function(err){
            console.log(err);
        }
    });
});
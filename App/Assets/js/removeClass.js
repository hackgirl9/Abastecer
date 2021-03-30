$(document).ready(function(){
    if($("#test tr").length) { //Comprobar que exista la tabla de registro
        if($('#test tr').length >= 3){//si existe la table y tienes mas de 3 registro les quitamos la clase fixed footer
            $("#footer").removeClass("fixed-footer");
        } 
        else if($('#test tr').length < 2){//si existe la table pero lo registro son menores que 2 le añadimos la clase fixed footer
            $("#footer").addClass("fixed-footer");
        }
    } 
    else{
        $("#footer").removeClass("fixed-footer");//si no existe la table de registro le quitamos la clase fixed-footer
    }
});

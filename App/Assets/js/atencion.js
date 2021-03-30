$(document).ready(function (){
    var elements = $("#test ul").length;
    var band = false;
    if(elements <= 3){
        $(".collapsible-header").click(function(events){
            if(band){
                $("#footer").addClass("fixed-footer");
                band = false;
            } 
            else{
                $("#footer").removeClass("fixed-footer");
                band = true;
            }
        });
    }
    else{
        $("#footer").removeClass("fixed-footer");
    }
});
$(document).ready(function(){
    $(".clap-report").click(function(){
        var idClap = $(this).val();
        $.ajax({
            method: "GET",
            dataType: "json",
            data: { idClap: idClap },
            url: ""
        });
    });
});
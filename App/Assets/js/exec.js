$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.collapsible').collapsible();
    $('.modal').modal();
    $('.dropdown-button').dropdown();
    $('select').formSelect();
    $('.tabs').tabs();
    $('.tooltipped').tooltip();

    // M.textareaAutoResize($('#observacion'));
    
    $('.datepicker').datepicker({
        format:'dd/mm/yyyy', // Configure the date format
        yearRange:100,
        showClearBtn:false,
        i18n:{
            cancel:'Cerrar',
            clear:'Reiniciar',
            done:'Hecho',
            months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
            weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
            weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
        },
        /* Labels and Dropdowns */
        /* labelMonthSelect: 'Selecciona un mes',
        labelYearSelect: 'Selecciona un año',
        labelMonthNext: 'Mes siguiente', 
        labelMonthPrev: 'Mes anterior', */
       /*  selectMonths: true, */ // Creates a dropdown to control month
        /* Date Range */
        /* max: true,
        selectYears: 60, */ // Creates a dropdown of 15 years to control year
        /* Language config */
       /*  monthsFull:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
        monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        weekdaysFull: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
        weekdaysLetter: ['D', 'L', 'M', 'M', 'J', 'V', 'S'],
        today: 'Hoy',
        clear: 'Reiniciar',
        close: 'Cerrar',
        closeOnSelect: false // Close upon selecting a date, */
    });
    // Notificaciones
    //notificationes;
    $.ajax({
        dataType:'json',
        type:'POST',
        url:"index.php?controller=Atencion&action=generarNotification",

        success:function (data) {
            if(data!==0){
                $('#notification').text(data).addClass('new badge');
            }else{
                $('#notification').text("").removeClass('new badge');
            }

        },
        error:function () {
            console.log("Error");
        }
    });
});
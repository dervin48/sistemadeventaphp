    /*=============================================
    =            Sidebar Menu           =
    =============================================*/
    

    
    $('.sidebar-menu').tree()

    $(".tablas").DataTable({

        "language":{

            "sProcessing":       "Procesando...",
            "sLengthMenu":       "Mostar _MENU_ registros",
            "sZeroRecords":      "No se encontraron resultados",
            "sEmptyTable":       "Ningún dato disponible en esta tabla",
            "sInfo":             "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":        "Mostrando resgistros del 0 al 0 de un total de 0",
            "sInfoPostFix":      "(filtrado de un total de _MAX_ registros)",
            "sSearch":           "Buscar:",
            "sUrl":              "",
            "sInfoThousands":    ",",
            "sLoadingRecords":   "Cargando..."
            "oPaginate":  {
            "sFirst":   "Primero",
            "sLast":    "Ultimo",
            "sNext":    "Siguiente",
            "sPrevious":"Anterior"
                 
            },
            "oAria":{
                "sSortAscending":   ":Activar para ordenar la columna de manera ascendente",
                "sSortDescending":  ":Activar para ordenar la columna e manera descendente"
            } 
         }

    });
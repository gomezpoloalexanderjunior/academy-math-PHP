<!DOCTYPE html>
<html lang="en">
<html >
    <head> 
 
        <link href='../list/main.css'>
        <link href='../timegrid/main.css'>  
        <link href='../core/main.css' rel='stylesheet' />
        <link href='../daygrid/main.css' rel='stylesheet' />
        <link href="../css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>Horario</title> 
        <script >
         document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

                var calendar = new FullCalendar.Calendar(calendarEl, {
                    /* Para que comience en un dia y es determinado es una propiedad
                     defaultDate:new Date(2019,8,1),*/
                    plugins: ['dayGrid', 'interaction', 'timeGrid', 'list'],

                    header: {
                        left: 'prev,next today Miboton',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    customButtons: {
                        Miboton: {
                            text: "Boton",
                            click: function () {
                                alert("HOLA MUNDO");
                                $('#modal').modal();
                            }
                        }
                    },
                    dateClick: function (info) {
                       $('#Titulo').modal();
                        $('#txtFechac').val(info.dateStr);
                         

                    },
                    eventSources:[{
                        events:[
                        {
                            title:'Conjunto2',
                            start:'2020-06-18',
                            color:'#FF0F0',
                            textoColor:'#FFFFFF',
                            all_day:false
                        },
                        {
                            title:'Vectores',
                            start:'2020-06-11',
                            color:'#FF0F0',
                            textoColor:'#FFFFFF',
                            all_day:false
                        }
                    ]
                    }],
                    eventClick:function(calEvent,jsEvent,view){
                        $('#txtTema').html(calEvent.title);
                        $('#txtFechac').html(calEvent.start);
                        $('#txtTextoColor').html(calEvent.textoColor);
                        $('#txtColor').html(calEvent.Color);
                        $('#Titulo').modal();

                     }
          });       
            calendar.setOption('locale', 'Es');
         calendar.render();
     });

        </script> 
    </head>
    <body class="bg-dark text-light">  
        <header class="container"  >
            <div  id="calendar"></div>
            <div class="modal"  id="Titulo" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-dark">
                        <div class="modal-header">
                            <h5 class="modal-title" id="TemaEvento">Nuevo Horario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body ">
                                <form  >
                                    <table>
                                        <thead>
                                
                                        </thead>
                                        <tbody >
                                            <tr>
                                                <td> Tema</td>  
                                                <td> <input class="form-control" type="text"  name="txtTitulo" id="txtTema"></td>
                                            </tr>
                                            <tr class="col ">
                                                <td>  Fecha</td>  	
                                                <td>  <input class=" form-control " type="text"  name="txtFechac" id="txtFechac"></td>
                                            </tr>
                                            
                                            <tr class="col ">
                                                <td> Descripcion</td>  	
                                                <td><input class=" form-control " type="text"  name="txtDescripcion" id="txtDescripcion"></td>
                                            </tr>
                                            <tr class="col ">
                                                <td>Texto</td>  
                                                <td ><input class="form-control" type="color" name="txtColor" id="txtTextoColor" ></td>
                                            </tr>
                                            <tr class="col ">
                                                <td>color</td>  
                                                <td ><input class="form-control" type="color" name="txtColor" id="txtColor" ></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form> 	  
                        </div>
                        <div class="modal-footer" >
                            <button class="btn btn-success"  id="btnAgregar"    type="button" >Agregar</button>
                            <button  class="btn btn-warning" id="btnModificar"  type="button" >Modificar</button>
                            <button  class="btn btn-danger"  id="btnBorrar"     type="button" >Borrar</button>
                            <button class="btn btn-default"  id="btnCancelar"   type="button"  data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>   
    <script src='../core/main.js'></script>
    <script src='../interaction/main.js'></script>
    <script src='../daygrid/main.js'></script>
    <script src='../list/main.js'></script>
    <script src='../timegrid/main.js'></script>   
    <script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
</html>
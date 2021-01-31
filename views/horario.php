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
        
    </head>
    <body class=" bg-dark">
        <div class="container ">
            <div class="text-light" id="calendar"></div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
       // document.ready(function(){
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
                                    start:'2021-02-01',
                                    descripcion:'Aritmetica',
                                    color:'black',
                                    textoColor:'yellow',
                                    //all_day:false
                                },
                                {
                                    title:'Vectores',
                                    start:'2021-02-05',
                                    descripcion:'Fisica',
                                    color:'#FF0F0',
                                    textoColor:'#FFFFFF',
                                    //all_day:false
                                }
                            ],  
                        }],
                        eventClick:function(calEvent){
                        /*  document.getElementById('txtTema').value=calEvent.title;
                        document.getElementById('txtFechac').value=calEvent.start;
                            document.getElementById('txtCurso').value=calEvent.descripcion;
                            document.getElementById('txtTextoColor').value=calEvent.textColor;
                            document.getElementById('txtColor').value=calEvent.color;
                        
                            console.log(calEvent.title);
                            $('#txtTema').val(calEvent.title);
                            $('#txtFechac').val(calEvent.start);
                            $('#txtCurso').val(calEvent.descripcion);
                            $('#txtTextoColor').val(calEvent.textoColor);
                            $('#txtColor').val(calEvent.Color); */
                            $('#Titulo').modal();
                        }
            });       
                calendar.setOption('locale', 'Es');
            
            calendar.render();
        });

     </script>   
        <header class="bg-dark text-light">
            <div class="container">
            
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
                                                <td> <div class="form-control" type="text"  name="txtTema" id="txtTema"></div></td>
                                            </tr>
                                            <tr class="col ">
                                                <td>  Fecha</td>  	
                                                <td>  <input class=" form-control " type="text"  name="txtFechac" id="txtFechac"></td>
                                            </tr>
                                            
                                            <tr class="col ">
                                                <td> Curso</td>  	
                                                <td>
                                                    <select class="form-control"  name="txtCurso" id ="txtCurso">
                                                        <option value="">SELECT</option>
                                                        <option value="">Aritmetica</option>                    
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="col ">
                                                <td>Texto</td>  
                                                <td ><input class="form-control" type="color" name="txtTextoColor" id="txtTextoColor" ></td>
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
    </div>
    </body>   
    <script src='../core/main.js'></script>
    <script src='../interaction/main.js'></script>
    <script src='../daygrid/main.js'></script>
    <script src='../list/main.js'></script>
    <script src='../timegrid/main.js'></script>   
    <!---<script src="../js/jquery-3.4.1.min.js" type="text/javascript"></script>----->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../js/bootstrap.js" type="text/javascript"></script>
</html>
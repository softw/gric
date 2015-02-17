  
  $(document).on("ready",function(){
        $(".verProducto").on("click",function(e){
            e.preventDefault();
            var id = $(this).attr("title");
            $.ajax({
                    url:"js/ajax.php",  
                    type:"POST",
                    dataType:"json",
                    data:{id_producto:id},
                    success: function(resp){

                        var datos=resp[1];
                        var m=resp.length;
                        for(var x=0; x<m; x=x+1){
                            var datos=resp[x];
 
                          $("#resultado"+id).append("<table id='table-gral' class='table table-bordered table-hover'>"+ 
                                        "<tr>"+
                                         "   <th>Producto No</th>"+
                                           " <td>"+datos['numero']+"</td>"+
                                          "  <th>Duración</th>"+
                                           " <th>Fecha Inicio</th>"+
                                            "<th>Fecha Final</th> "+              
                                        "</tr>"+

                                        "<tr>"+
                                           " <td colspan='2'>"+datos['producto']+" </td>"+
                                           "<td>"+datos['duracion']+"</td>"+
                                           "<td>"+datos['inicio']+"</td>"+
                                           "<td>"+datos['final']+"</td>"+
                                        "</tr>"+

                                    "</table>");
                            
                        }

                    }
                });
            });
    });




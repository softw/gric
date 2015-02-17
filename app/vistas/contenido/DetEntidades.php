<?php ob_start() ;?>

<h3>Entidades</h3>    
 <article id="entidades" class="detalles">
        <h3>Entidad solicitante</h3>
        <a href="editarentidad">Editar</a>
        <table id="table-enti" class="table table-hover table-bordered" >
            <tr align="center">
              <th colspan="4">Informacion básica</th>
            </tr>
            <tr>
            <tr>
              <td>Entidad</td>
              <td colspan="3">Sena</td>
            </tr>
            <tr>
             <td>Nit</td>
              <td>281578</td>
              <td>Digito de verificación</td>
               <td>12</td>
            </tr>
            <tr>
               <td>Pais</td>
               <td>Colombia</td>
               <td>Ciudad</td>
               <td>Cucuta</td>
            </tr>
            <tr>
               <td>Direccion</td>
               <td colspan="3">cll 13 #30-66</td>
               </tr>
            <tr>
               <td>Telefóno</td>
               <td>310256951</td>
                <td>Fax</td>
                <td>320456821</td>
            </tr>
            <tr>
                <td>Página web</td>
                <td colspan="3">www.sena.edu.co</td>
            </tr>
            <tr>
                 <td>Email</td>
                 <td colspan="3">servicioalcliente@sena.edu.co</td>
                 </tr>
                 <tr align="center">
                 <th colspan="4">Representante legal</th>
            </tr>
            <tr>
                 <td>Nombre</td>
                <td colspan="3">Juan Martin del Potro</td>
            </tr>
            <tr>
                <td>Tipo Identificacion</td>
                <td>cc</td>
                <td>Numero Identificacion</td>
                <td>56325963</td>
            </tr>
        </table> 
        <h3>Ejecutor principal</h3> 
        <a href="editarentidad">Editar</a>
        <table id="table-enti" class="table table-bordered table-hover">
            <tr align="center">
              <th colspan="4">Informacion básica</th>
            </tr>
            <tr>
            <tr>
              <td>Entidad</td>
              <td colspan="3">Sena</td>
            </tr>
            <tr>
             <td>Nit</td>
              <td>281578</td>
              <td>Digito de verificación</td>
               <td>12</td>
            </tr>
            <tr>
               <td>Pais</td>
               <td>Colombia</td>
               <td>Ciudad</td>
               <td>Cucuta</td>
            </tr>
            <tr>
               <td>Direccion</td>
               <td colspan="3">cll 13 #30-66</td>
               </tr>
            <tr>
               <td>Telefóno</td>
               <td>310256951</td>
                <td>Fax</td>
                <td>320456821</td>
            </tr>
            <tr>
                <td>Página web</td>
                <td colspan="3">www.sena.edu.co</td>
            </tr>
            <tr>
                 <td>Email</td>
                 <td colspan="3">servicioalcliente@sena.edu.co</td>
                 </tr>
                 <tr align="center">
                 <th colspan="4">Representante legal</th>
            </tr>
            <tr>
                 <td>Nombre</td>
                <td colspan="3">Juan Martin del Potro</td>
            </tr>
            <tr>
                <td>Tipo Identificacion</td>
                <td>cc</td>
                <td>Numero Identificacion</td>
                <td>56325963</td>
            </tr>
        </table> 
    </article><!--fin entidades-->                      
            
   
<?php $contenido = ob_get_clean() ;
  include'/../plantillas/base.php';
<?php ob_start() ;?>

<h3>Cronograma</h3> 
<article id="cronograma" class="detalles">
 
    <table id="table-cronograma" class="table table-bordered" >
        <tr>
            <th width="50">Número</th>
            <th width="300">Actividad</th>
            <th>Fecha inicio</th>
            <th>Fecha final</th>
            <th width="50">Tiempo total</th>
        </tr>
        <?php if($params['actividades']==FALSE): ?>
        <tr>
            <td>No</td>
            <td>Hay</td>
            <td>Datos</td>
            <td>Para</td>
            <td>Mostrar</td>
       </tr>
       <?php else: ?>
       <?php foreach ($params['actividades'] as $actividad): ?>
        <tr>
            <td><?php echo $actividad['numero'] ?></td>
            <td><?php echo $actividad['actividad'] ?></td>
            <td><?php echo $actividad['fecha_inicio'] ?></td>
            <td><?php echo $actividad['fecha_final'] ?></td>
            <td><?php echo $actividad['duracion'] ?></td>
       </tr>
       <?php endforeach;
              endif;?>
       <?php if($esAdmin): ?>
      <form action="index.php?ctl=Procesar&form=actividad&cat=i" method="POST" >
        <tr>
            <td><input class="input-sm"type="text" name="txtNumero" placeholder="agregar "></td>
            <td><input class="input-sm" type="text" name="txtActividad" placeholder="agregar "></td>
            <td><input class="input-sm"type="date" name="txtInicio" placeholder="aaa/mm/dd "></td>
            <td><input class="input-sm"type="date" name="txtFin" placeholder="aaaa/mm/dd "></td>
            <td><input class="input-sm" type="text" name="txtDuracion" placeholder="agregar"></td>
       </tr>
       <tr>
           <td colspan="5"><input type="submit" value="Guardar"></td>
       </tr>
      </form>
       <?php endif;?>
       
</table>
</article><!--fin art-cronograma-->
                      
            
   
<?php $contenido = ob_get_clean() ;
  include'/../plantillas/base.php';


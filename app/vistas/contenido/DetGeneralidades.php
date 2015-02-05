<?php ob_start() ;?>


<h3>Generalidades</h3> 
<?php foreach ($params['generalidades'] as $proyecto):?>
<article id="generalidades" class="detalles">
                	
    <?php if($esAdmin==true):?>
      <a href="index.php?ctl=Generalidades&cat=detalles&editar=TRUE&id=<?php echo $proyecto['id'] ?>&titulo=<?php echo $proyecto['titulo']; ?>">Editar</a>
    <?php  endif ?>
    <table id="table-gral" class="table table-bordered table-hover" > 

        <tr>
            <th>Titulo</th>
            <td colspan="3"><?php echo $proyecto['titulo'] ?> </td>
        </tr>

        <tr>
            <th>Descripcion</th>
            <td colspan="3"><?php echo $proyecto['descripcion'] ?> </td>
        </tr>

        <tr>
            <th>Convocatoria</th>
            <td><?php echo $proyecto['convocatoria'] ?> </td>
            <th>Programa</th>
            <td><?php echo $proyecto['programa'] ?></td>
        </tr>

        <tr>
            <th>Tipo de financiacion</th>
            <td><?php echo $proyecto['tipo_f'] ?></td>
            <th>Duracion en meses</th>
            <td><?php echo $proyecto['duracion'] ?></td>
        </tr>

        <tr>
            <th>Lugar de ejecucion</th>
            <td><?php echo $proyecto['lugar'] ?></td>
            <th>Beneficiarios campesinos o trabajadores</th>
            <td><?php echo $proyecto['ben_camp'] ?></td>
        </tr>

         <tr>
            <th>Fecha creación</th>
            <td><?php echo $proyecto['fecha_publicacion'] ?> </td>
            <th>Ultima actualizacion</th>
            <td><?php echo $proyecto['ultima_actualizacion'] ?> </td>
        </tr>

    </table><!--fin table-gral-->
</article><!--idgeneralidades-->
<?php endforeach;?>
<?php $contenido = ob_get_clean() ;
  include'/../plantillas/base.php';



<?php ob_start() ;?>

        <h3>Resultados</h3>    
        <?php if($esAdmin): ?>
            <a href="index.php?ctl=Nuevo&form=resultado&clave=resultado">Agregar Resultado</a>
        <?php endif; ?>
        

<?php if($parametros['resultados']!=FALSE) :foreach ($parametros['resultados'] as $resultado):?>
<article id="resultados" class="detalles">
        <?php if($esAdmin): ?>
            <a href="index.php?ctl=Nuevo&form=producto&id_resultado=<?php echo $resultado['id'] ?>">Agregar un producto de este resultado</a>
        <?php endif; ?>          	
    <table id="table-gral" class="table table-bordered table-hover" > 

        <tr>
            <th>Número</th>
            <th colspan="2">Resultado</th>
                
        </tr>

        <tr>
           <td><?php echo $resultado['numero'] ?> </td>
           <td colspan="2"><?php echo $resultado['resultado'] ?> </td>
        </tr>

        <tr>
            <th>Indicador</th>
            <th>Meta</th>
            <th>Fuente de verificacion</th>
        </tr>

        <tr>
            <td><?php echo $resultado['indicador'] ?></td>
            <td><?php echo $resultado['fuente'] ?></td> 
            <td><?php echo $resultado['meta'] ?></td>
        </tr>

    </table>
 <?php if($productos['productos']!=FALSE) :foreach ($productos['productos'] as $producto):?>   
     <table id="table-gral" class="table table-bordered table-hover" > 

        <tr>
            <th>Producto No</th>
            <td><?php echo $producto['numero'] ?></td>
            <th>Duración</th>
            <th>Fecha Inicio</th>
            <th>Fecha Final</th>               
        </tr>

        <tr>
            <td colspan="2"><?php echo $producto['producto'] ?> </td>
           <td><?php echo $producto['duracion'] ?> </td>
           <td><?php echo $producto['inicio'] ?> </td>
           <td><?php echo $producto['final'] ?> </td>
        </tr>

    </table>
 <?php endforeach; endif; ?>
  
</article><!--idgeneralidades-->
<?php  endforeach; endif;?>

<?php $contenido = ob_get_clean() ;
  include'/../plantillas/base.php';   

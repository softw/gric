 <?php ob_start();
 $productoNumero=0;
 ?>

<h3>Resultados</h3>    
<?php if($esAdmin): ?>
    <a href="index.php?ctl=Nuevo&form=resultado&clave=resultado">Agregar Resultado</a>
<?php endif; ?>
        

<?php if($parametros['resultados']!=FALSE) :foreach ($parametros['resultados'] as $resultado):?>
    <article id="resultados" class="detalles">
        <?php if($esAdmin): ?>
            <a href="index.php?ctl=Nuevo&form=producto&id_resultado=<?php echo $resultado['id'] ?>">Agregar un producto de este resultado</a>
        <?php endif; ?>   
        <div class="resultados">

           <table id="table-gral" class="table table-bordered table-hover" > 
                <tr>
                    <th width="50">Número</th>
                    <td><?php echo $resultado['numero'] ?></td>
                    <th>Resultado</th>
                    <td colspan="2"><?php echo $resultado['resultado'] ?> </td>

                </tr>

                <tr>
                    <th colspan="2">Indicador</th>
                    <th>Meta</th>
                    <th>Fuente de verificacion</th>
                </tr>

                <tr>
                    <td colspan="2"><?php echo $resultado['indicador'] ?></td>
                    <td><?php echo $resultado['fuente'] ?></td> 
                    <td><?php echo $resultado['meta'] ?></td>
                </tr>
            </table>
            <a id="enlace" class="verProducto" href="#" title="<?php echo $resultado['id'] ?>">ver productos</a>
        </div>            
            <div class="productos" id="resultado<?php echo $resultado['id']?>" >
            
        </div>
    </article>
            
<?php endforeach; endif; ?>          
  
  
 
  
</article><!--idgeneralidades-->

<?php $contenido = ob_get_clean() ;
  include'/../plantillas/base.php';   

<?php ob_start() ;?>

<h3>Impactos</h3>  
<?php if($esAdmin): ?>
<a href="index.php?ctl=Nuevo&form=impacto">Agregar</a>
<?php endif;?>
        <?php if($parametros['impactos']!=FALSE):foreach($parametros['impactos'] as $impacto):?>
        
                <article  class="detalles">

                    <table id="showImpactos" class="table table-bordered table-hover">
                        <caption>Impacto tal de tantos</caption>
                        <tr>
                            <th width="200">Configuración de impacto</th>
                             <td colspan="5">
                                <?php if(!empty($impacto['configuracion'])):echo $impacto['configuracion'];endif; ?>         
                            </td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                             <td colspan="5">
                                <?php if(!empty($impacto['descripcion'])):echo $impacto['descripcion'];endif; ?>         
                            </td>
                        </tr>
                        <tr>
                            <th>Año base</th>
                             <td>
                                <?php if(!empty($impacto['ano_base'])):echo $impacto['ano_base'];endif; ?>         
                            </td>
                            <th width="180">Medición base</th>
                            <td colspan="3">
                                <?php if(!empty($impacto['medicion_base'])):echo $impacto['medicion_base'];endif; ?>         
                            </td>
                        </tr>
                         <tr>
                            <th>Año medicion</th>
                             <td>
                                <?php if(!empty($impacto['ano_medicion'])):echo $impacto['ano_medicion'];endif; ?>         
                            </td>
                            <th>Impacto esperado</th>
                             <td>
                                <?php if(!empty($impacto['impacto_esperado'])):echo $impacto['impacto_esperado'];endif; ?>         
                            </td>
                            <th>Variación</th>
                             <td>
                                <?php if(!empty($impacto['variacion'])):echo $impacto['variacion'];endif; ?>         
                            </td>
                        </tr>
                        <tr>
                            <th>Descriptivo</th>
                            <td colspan="5">
                                <?php if(!empty($impacto['descriptivo'])):echo $impacto['descriptivo'];endif; ?>         
                            </td>
                        </tr>
                        <tr>
                            <th>Supuestos</th>
                            <td colspan="5">
                                <?php if(!empty($impacto['supuestos'])):echo $impacto['supuestos'];endif; ?>         
                            </td>
                        </tr>
  
                    </table> 
                </article>
        <?php endforeach; else:?>
                <article class="detalles">
                    <p>No hay datos</p>
                </article>

        <?php endif;?>
               
       
   
<?php $contenido = ob_get_clean() ;
  include'/../plantillas/base.php';
                  
            
   


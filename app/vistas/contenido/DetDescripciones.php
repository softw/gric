<?php ob_start() ;?>

        <h3>Descripciones</h3>    
                      
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Objetivo general</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['obj_general'])):?>
                            <a href="index.php?ctl=Editar&id=obj_general&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                       <td colspan="2">
                       <?php if(!empty($proyecto['obj_general'])):
                           echo $proyecto['obj_general'];
                        elseif($esAdmin == TRUE): ?>
                           <a href="index.php?ctl=Detalles&cat=descripciones&id_des=obj_general&id=<?php echo $_SESSION['id_proyecto'] ?>&titulo=<?php echo $titulo ?>&crear=TRUE">Agregar objetivo general</a>
                        <?php else: echo "sin datos"; endif;?>
                        </td>  
                    </tr>
                </table>
            </article>
            
            <?php if(!empty($proyecto['obj_general'])):?>                               
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Objetivos especificos</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['obj_especificos'])):?>
                            <a href="index.php?ctl=Editar&id=obj_especificos&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                       <td colspan="2">
                        <?php if(!empty($proyecto['obj_especificos'])):
                            echo $proyecto['obj_especificos'];
                        elseif($esAdmin==TRUE ):?>
                            <a href="index.php?ctl=Detalles&cat=generalidades&titulo=<?php echo $titulo ?>&crear=true">Agregar objetivos especificos</a>  
                        <?php endif;  ?>
                        </td>  
                    </tr>
                </table>
            </article>
            
             <?php //una descripcion ?>        
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Descripcion de la necesidad</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['necesidad'])):?>
                            <a href="index.php?ctl=Editar&id=necesidad&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                       <td colspan="2">
                       <?php if(!empty($proyecto['necesidad'])): 
                            echo $proyecto['necesidad'];
                        elseif($esAdmin==TRUE):?>
                            <a href="index.php?ctl=Crear&id=necesidad&cat=descripciones&titulo=<?php echo $titulo ?>">Agregar</a>'
                        <?php endif;  ?>
                        </td>  
                    </tr>
                </table>
            </article>
            
             <?php //una descripcion ?>        
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Centros de formación</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['centros'])):?>
                            <a href="index.php?ctl=Editar&id=centros&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                       <td colspan="2">
                       <?php if(!empty($proyecto['centros'])):
                            echo $proyecto['centros'];
                        else: if($esAdmin==TRUE ):?>
                            <a href="index.php?ctl=Crear&id=centros&cat=descripciones&titulo=<?php echo $titulo ?>">Agregar</a>
                        <?php endif;endif; ?>
                        </td>  
                    </tr>
                </table>
            </article>
            
             <?php //una descripcion ?>        
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Justificación técnica de la propuesta</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['justificacion'])):?>
                            <a href="index.php?ctl=Editar&id=justificacion&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <?php if(!empty($proyecto['justificacion'])): 
                            echo $proyecto['justificacion'];
                        else: if($esAdmin):?>
                            <a href="index.php?ctl=Crear&id=justificacion&cat=descripciones&titulo=<?php echo $titulo ?>">Agregar</a>
                        <?php endif; endif;?>
                        </td>  
                    </tr>
                </table>
            </article>
            
             <?php //una descripcion ?>        
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Identificación de componentes de innovación</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['identificacion'])):?>
                            <a href="index.php?ctl=Editar&id=identificacion&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                       <td colspan="2">
                        <?php if(!empty($proyecto['identificacion'])): 
                            echo $proyecto['identificacion'];
                        else: if($esAdmin ): ?>
                            <a href="index.php?ctl=Crear&id=identificacion&cat=descripciones&titulo=<?php echo $titulo ?>">Agregar</a>
                        <?php endif; endif; ?>
                        </td>  
                    </tr>
                </table>
            </article>
            
             <?php //una descripcion ?>        
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Resultados esperados</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['resultados'])):?>
                            <a href="index.php?ctl=Editar&id=resultados&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <?php if(!empty($proyecto['resultados'])): 
                            echo $proyecto['resultados'];
                        else: if($esAdmin):?>
                            <a href="index.php?ctl=Crear&id=resultados&cat=descripciones&titulo=<?php echo $titulo ?>">Agregar</a>
                        <?php endif;endif; ?>
                        </td>  
                    </tr>
                </table>
            </article>
            
             <?php //una descripcion ?>        
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Mecanismos de divulgación al sector privado</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['mecanismos'])):?>
                            <a href="index.php?ctl=Editar&id=mecanismos&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                       <td colspan="2">
                        <?php if(!empty($proyecto['mecanismos'])): 
                            echo $proyecto['mecanismos'];
                        else: if($esAdmin ): ?>
                           <a href="index.php?ctl=Crear&id=mecanismos&cat=descripciones&titulo=<?php echo $titulo ?>">Agregar</a>
                        <?php endif; endif; ?>
                        </td>  
                    </tr>
                </table>
            </article>
            
             <?php //una descripcion ?>        
            <article class="detalles">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Relación de la propuesta</th>
                        <th>
                        <?php if($esAdmin==TRUE&&!empty($proyecto['relacion'])):?>
                            <a href="index.php?ctl=Editar&id=relacion&cat=descripciones&titulo=<?php echo $titulo ?>">Editar</a>
                        <?php endif; ?> 
                        </th>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <?php if(!empty($proyecto['relacion'])): 
                            echo $proyecto['relacion'];
                        else: if($esAdmin ):?>
                            <a href="index.php?ctl=Crear&id=relacion&cat=descripciones&titulo=<?php echo $titulo ?>">Agregar</a>
                        <?php endif; endif; ?>
                        </td>  
                    </tr>
                </table>
            </article>
 
<?php endif;?>
   
 <?php $contenido = ob_get_clean() ;
 
 include '/../layout/base.php';

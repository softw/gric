<?php ob_start() ;?>

        <h3>Personas</h3>  
        <?php if($esAdmin==TRUE): ?>
            <a href="index.php?ctl=Nuevo&form=personas&id=<?php echo $_SESSION['id_proyecto']?>&token=<?php echo $uri ?> ">Agregar Persona</a>
        <?php endif ?>
        <?php if($params['personas']!=FALSE):
           foreach($params['personas'] as $persona):?>
        
                <article  class="detalles">

                    <table id="table-personas" class="table table-bordered table-hover">
                        <caption><h5>Persona <?php echo $num_persona ?></h5></caption>
                        <tr>
                            <th width="200">Entidad</th>
                            <td colspan="3">
                            <?php   if(!empty($persona['entidad'])):
                                        echo $persona['entidad'];
                                    endif;
                            ?>
                            </td>
                       
                        </tr>
                        <tr>
                            <th>Rol en el proyecto</th>
                            <td>
                            <?php   if(!empty($persona['rol_proyecto'])):
                                        echo $persona['rol_proyecto'];
                                    endif;
                            ?>
                            </td>
                            <th width="250">Dedicación horas semanales</th>
                           <td>
                               <?php   if(!empty($persona['dedicacion_horas'])):
                                        echo $persona['dedicacion_horas'];
                                    endif;
                            ?>
                           </td>
                        </tr>
                        <tr>
                            <th>Primer apellido</th>
                            <td>
                            <?php   if(!empty($persona['primer_apellido'])):
                                        echo $persona['primer_apellido'];
                                    endif;
                            ?>
                            </td>
                            <th>Segundo apellido</th>
                            <td>
                            <?php   if(!empty($persona['segundo_apellido'])):
                                        echo $persona['segundo_apellido'];
                                    endif;
                            ?>
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Nombres</th>
                            <td>
                            <?php   if(!empty($persona['nombres'])):
                                        echo $persona['nombres'];
                                    endif;
                            ?>
                            </td>
                            <th>Género</th>
                            <td>
                            <?php   if(!empty($persona['genero'])):
                                        echo $persona['genero'];
                                    endif;
                            ?>
                            </td>
                        </tr>
                        <tr>
                           
                        </tr>
                        <tr>
                           <th>Fecha de nacimiento</th>
                           <td>
                               <?php   if(!empty($persona['fecha_nacimiento'])):
                                        echo $persona['fecha_nacimiento'];
                                    endif;
                            ?>
                           </td>
                            <th>País</th>
                           <td>
                               <?php   if(!empty($persona['pais'])):
                                        echo $persona['pais'];
                                    endif;
                            ?>
                           </td>
                        </tr>
                        
                        <tr>
                           <th>Correo electrónico</th>
                           <td>
                               <?php   if(!empty($persona['email'])):
                                        echo $persona['email'];
                                    endif;
                            ?>
                           </td>
                        </tr>
                        <tr>
                           <th>Tipo de identificación</th>
                           <td>
                               <?php   if(!empty($persona['tipo_identificacion'])):
                                        echo $persona['tipo_identificacion'];
                                    endif;
                            ?>
                           </td>
                            <th>Número</th>
                           <td>
                               <?php   if(!empty($persona['numero_identificacion'])):
                                        echo $persona['numero_identificacion'];
                                    endif;
                            ?>
                           </td>
                        </tr>
                       
                        <tr>
                            <th colspan="4">Responsabilidades</th>
                          
                        </tr>
                        <tr>
                            <td colspan="4">
                               <?php   if(!empty($persona['responsabilidades'])):
                                        echo $persona['responsabilidades'];
                                    endif;
                            ?>
                           </td>
                        </tr>
                        <tr>
                          
                        </tr>
                        <tr>
                            <th colspan="4">Titulos y certificaciones</th>
                           
                        </tr>
                        <tr>
                            <td colspan="4">
                               <?php   if(!empty($persona['titulos_certificaciones'])):
                                        echo $persona['titulos_certificaciones'];
                                    endif;
                            ?>
                           </td>
                        </tr>
                        <tr>
                            <th colspan="4">Experiencia empresarial en el área temática</th>
                           
                        </tr>
                        <tr>
                            <td colspan="4">
                               <?php   if(!empty($persona['experiencia_empresarial'])):
                                        echo $persona['experiencia_empresarial'];
                                    endif;
                            ?>
                           </td>
                        </tr>
                        <tr>
                            <th colspan="4">Experiencia docente en el área temática</th>
                           
                        </tr>
                        <tr>
                            <td colspan="4">
                               <?php   if(!empty($persona['experiencia_docente'])):
                                        echo $persona['experiencia_docente'];
                                    endif;
                            ?>
                           </td>
                        </tr>
                        <tr>
                            <th colspan="4">Resumen de la hoja de vida</th>
                           
                        </tr>
                        <tr>
                            <td colspan="4"><?php   if(!empty($persona['resumen_hoja_vida'])):
                                        echo $persona['resumen_hoja_vida'];
                                    endif;?>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="4">Referencias que acreditan idoneidad en el objeto de la capacitación</th>
                            
                        </tr>
                        <tr>
                           <td colspan="4">
                               <?php   if(!empty($persona['referencias'])):
                                        echo $persona['referencias'];
                                    endif;
                            ?>
                           </td> 
                        </tr>
                    </table><!--fin table-personas-->
                    
                    <table class="table table-bordered table-hover">
                        <caption>Datos de la oficina o lugar de trabajo</caption>
 
                        <tr>
                            <th width="200">Dirección de oficina</th>
                            <td>
                                <?php   if(!empty($persona['direccion_oficina'])):
                                        echo $persona['direccion_oficina'];
                                    endif;
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td>
                                <?php   if(!empty($persona['telefono'])):
                                        echo $persona['telefono'];
                                    endif;
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Cargo</th>
                            <td>
                                <?php   if(!empty($persona['cargo'])):
                                        echo $persona['cargo'];
                                    endif;
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Dependencia</th>
                            <td>
                                <?php   if(!empty($persona['dependencia'])):
                                        echo $persona['dependencia'];
                                    endif;
                            ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Ciudad donde labora</th>
                            <td>
                                <?php   if(!empty($persona['ciudad_labora'])):
                                        echo $persona['ciudad_labora'];
                                    endif;
                            ?>
                            </td>
                        </tr>
                    </table>
                </article><!--fin #personas-->
<?php endforeach; ?>
                   <table class="table table-bordered table-hover">
                    	<caption>Tipo de personal</caption>
                        <tr>
                            <th>Tipo</th>
                            <th>Numero</th>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table> 
                
        <?php else:  ?>
                <article class="detalles">
                    <p>No hay datos</p>
                </article>
         <?php endif ?>   
   
<?php $contenido = ob_get_clean() ;
  include'/../plantillas/base.php';

<?php ob_start(); ?>

<div class="contenedorCentral">
    <article>
        
        <form action="index.php?ctl=Procesar&form=producto&id_resultado=<?php echo $id_resultado ?>" method="POST" autocomplete="FALSE">
            <fieldset><legend>Agregar Producto</legend>

               <div class="form-group">
                    <label for="numero">Número</label>
                    <select id="numero" name="numero">
                        <option value="P01">P01</option>
                        <option value="P02">P02</option>
                        <option value="P03">P03</option>
                    </select>
               </div>
                
                <div class="form-group">
                    <label for="producto">Producto</label>
                    <input class="input" type="text" name="txtProducto" id="producto" > 
                   
                </div>
                
                <div class="form-group">
                    <label for="duracion">Duración</label>
                    <input type="number" name="txtDuracion" min="1" max="30" >
                     <select id="unidad" name="unidad">
                        <option value="1">Dias</option>
                        <option value="2">Semanas</option>
                        <option value="3">Meses</option>
                        <option value="4">Años</option>
                    </select>
                    
                </div>
                
                <div class="form-group">
                    <label for="inicio">Fecha de inicio</label>
                    <input type="date" name="fecha_inicio" id="inicio">
                    <label for="final">Fecha final</label>
                    <input type="date" name="fecha_final" id="final">
                </div>

                <div class="form-group">
                    <div class="form-group-medio">
       
                        <input class="btn" type="submit" value="Guardar"> 
                    </div>
                    <div class="form-group-medio">
                        <a  class="btn" href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Cancelar</a>
                    </div>  
                </div>
            </fieldset>
        </form>
    </article><!--editargeneralidades-->
</div>
 <?php $contenido= ob_get_clean();
include'/../plantillas/base.php';


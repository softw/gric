<?php ob_start(); ?>

<div class="contenedorCentral">
    <article>
        
        <form action="index.php?ctl=Procesar&form=actividad&cat=i" method="POST" >
            <fieldset><legend>Nueva Actividad</legend>

               <div class="form-group">
                    <div class="form-group-medio">
                        <label for="numero">Número</label>
                        <input  class="input" type="text" name="txtNumero" id="numero" maxlength="150" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="actividad">Actividad</label>
                        <input  class="input" type="text" name="txtActividad" id="actividad" required>
                    </div>
               </div>
                
                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="inicio">Fecha de inicio</label>
                        <input  class="input" type="date" name="txtInicio" id="inicio" required>
                    </div> 
                     <div class="form-group-medio">
                        <label for="fin">Fecha de finalización</label>
                        <input   class="input" type="date" name="txtFin" id="fin" required>
                    </div>                  
                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="duracion">Duración total</label>
                        <input  class="input" type="number" name="txtDuracion" id="duracion"> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <input class="btn" type="submit" value="Enviar"> 
                    </div>
                    <div class="form-group-medio">
                        <a class="btn" href="<?php echo $_SERVER['HTTP_REFERER'] ?>">Cancelar</a>
                    </div>  
                </div>
            </fieldset>
        </form>
    </article><!--editargeneralidades-->
</div>
 <?php $contenido= ob_get_clean();
include'/../plantillas/base.php';

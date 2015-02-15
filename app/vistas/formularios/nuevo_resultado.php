<?php ob_start(); ?>

<div class="contenedorCentral">
    <article>
        
        <form action="index.php?ctl=Procesar&form=resultado&clave=resultado" method="POST" >
            <fieldset><legend>Agregar resultado</legend>

               <div class="form-group">
                    <label for="numero">Número</label>
                    <input  class="input" type="text" name="txtNumero" id="numero" maxlength="150" required>
               </div>
                
                <div class="form-group">
                    <label for="resultado">Resultado</label>
                    <textarea cols="90" rows="5" name="txaResultado" id="resultado"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="indicador">Indicador</label>
                    <textarea cols="90" rows="5" name="txaIndicador" id="indicador"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="fuente">Fuente de verificación</label>
                    <textarea cols="90" rows="5" name="txaFuente" id="fuente"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="meta">Meta</label>
                    <textarea cols="90" rows="5" name="txaMeta" id="meta"></textarea>
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


<?php ob_start(); ?>

<div class="contenedorCentral">
    <article>
        
        <form action="index.php?ctl=Procesar&form=impacto" method="POST" >
            <fieldset><legend>Agregar impacto</legend>

               <div class="form-group">
                    <label for="configuracion">Configuración de impacto</label>
                    <input  class="input" type="text" name="txtConfiguracion" id="configuracion" maxlength="150" required>
               </div>
                
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea cols="90" rows="3" name="txaDescripcion" id="descripcion"></textarea>
                </div>
                
                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="anoBase">Año base</label>
                        <input  class="input" type="number" name="txtAnoBase" id="anoBase" maxlength="150" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="medicion">Medición base</label>
                        <input  class="input" type="number" name="txtMedicion" id="medicion" maxlength="150" required>
                    </div>
                       
                </div> 
                
                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="anoMedicion">Año de medición</label>
                        <input  class="input" type="number" name="txtAnoMedicion" id="anoMedicion" maxlength="150" required>
                    </div> 
                    <div class="form-group-medio">
                        <label for="impacto">Impacto esperado</label>
                        <input  class="input" type="number" name="txtImpacto" id="impacto" maxlength="150" required>     
                    </div> 
                    
                </div>
                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="variacion">Variación</label>
                        <input  class="input" type="text" name="txtVariacion" id="variacion" maxlength="150" required>     
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="descriptivo">Descriptivo</label>
                    <textarea cols="90" rows="2" name="txaDescriptivo" id="descriptivo"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="supuestos">Supuestos</label>
                    <textarea cols="90" rows="2" name="txaSupuestos" id="supuestos"></textarea>
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


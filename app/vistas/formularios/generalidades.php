<?php ob_start(); ?>

<div class="contenedorCentral">
    <article>
        
        <form action="index.php?ctl=Procesar&id=generalidades&action=<?php echo $action ?>" method="POST" >
            <fieldset>
                <legend>
                <?php if($action=="insert"): ?>
                    Crear proyecto
                <?php else: ?>
                   Editar datos del proyecto
               <?php endif ?>  
                </legend>

               <div class="form-group">
                    <label for="titulo">Titulo del proyecto</label>
                    <input  class="input" type="text" name="txtTitulo" id="titulo" maxlength="150" required>
               </div>

                <div class="form-group">
                   <div class="form-group-medio">
                        <label for="convocatoria">Convocatoria</label>
                        <input  class="input" type="text" name="txtConvocatoria" id="convocatoria" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="programa">Programa</label>
                        <input  class="input" type="text" name="txtPrograma" id="programa" required>
                    </div>  
                </div>

                <div class="form-group">

                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="tipofinanciacion">Tipo de financiacion</label>
                        <input   class="input" type="text" name="txtTipo" id="tipofinanciacion" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="duracion">Duración en meses</label>
                        <input  class="input" type="text" name="txtDuracion" id="duracion"> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="lugar">Lugar de ejecución</label>
                    <input   class="input" type="text" name="txtLugar" id="lugar" required>
                </div>

                <div class="form-group">
                    <label for="beneficia">¿Beneficia campesinos o trabajadores?</label>
                    <select name="beneficia" id="beneficia">
                        <option value="si">Si</option>
                        <option value="no">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="descripcion">Incluya una corta descripcion de su proyecto</label>
                    <textarea  cols="90" rows="5" name="txaDescripcion" id="descripcion" required></textarea>
                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <input type="hidden" name="action" value="nuevo_proyecto">
                        <input class="btn" type="submit" value="Enviar"> 
                    </div>
                    <div class="form-group-medio">
                        <a  class="btn" href="index.php?ctl=Listado&buscar=t">Cancelar</a>
                    </div>  
                </div>
            </fieldset>
        </form>
    </article><!--editargeneralidades-->
</div>
 <?php $contenido= ob_get_clean();
 include '/../layout/base.php';

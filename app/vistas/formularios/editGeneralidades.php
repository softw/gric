<?php ob_start();

?>

<div class="contenedorCentral">
    <article  class="detalles">
<?php foreach ($params['generalidades'] as $proyecto):?>
        <form action="index.php?ctl=Validar&action=update&id=generalidades" method="POST" >
            <fieldset><legend>Editar Generalidades</legend>

               <div class="form-group">
                    <label for="titulo">Titulo del proyecto</label>
                    <input value="<?php echo $proyecto['titulo'] ?>" class="input" type="text" name="txtTitulo" id="titulo" maxlength="150" required>
               </div>

                <div class="form-group">
                   <div class="form-group-medio">
                        <label for="convocatoria">Convocatoria</label>
                        <input value="<?php echo $proyecto['convocatoria'] ?>"  class="input" type="text" name="txtConvocatoria" id="convocatoria" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="programa">Programa</label>
                        <input value="<?php echo $proyecto['programa'] ?>"  class="input" type="text" name="txtPrograma" id="programa" required>
                    </div>  
                </div>

                <div class="form-group">

                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="tipofinanciacion">Tipo de financiacion</label>
                        <input value="<?php echo $proyecto['tipo_f'] ?>"  class="input" type="text" name="txtTipo" id="tipofinanciacion" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="duracion">Duración en meses</label>
                        <input value="<?php echo $proyecto['duracion'] ?>"  class="input" type="text" name="txtDuracion" id="duracion"> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="lugar">Lugar de ejecución</label>
                    <input value="<?php echo $proyecto['lugar'] ?>"  class="input" type="text" name="txtLugar" id="lugar" required>
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
                    <textarea  cols="90" rows="5" name="txaDescripcion" id="descripcion" required><?php echo $proyecto['descripcion'] ?></textarea>
                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <input type="hidden" name="id_proyecto" value="<?php echo $proyecto['id'] ?>">
                        <input type="hidden" name="action" value="editar_generalidades">
                        <input class="btn" type="submit" value="Enviar"> 
                    </div>
                    <div class="form-group-medio">
                        <a class="btn" href="index.php?ctl=Detalles&cat=gen&id=<?php echo $proyecto['id'] ?>">Cancelar</a>
                    </div>  
                </div>
            </fieldset>
        </form>
        <?php        endforeach;?>
                </article><!--editargeneralidades-->
</div>
 <?php $contenido= ob_get_clean();
 include '/../plantillas/base.php';

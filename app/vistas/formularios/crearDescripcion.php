<?php ob_start(); ?>

<div class="contenedorCentral">
    <article>

        <form id="formDescripciones" action="index.php?ctl=Validar&action=<?php echo $action ?>&cat=descripciones&id=<?php echo $id ?>" method="POST" >
            <?php if($id=="necesidad"): ?>
            <div class="form-group">
                <label for="descripcion">Descripcion de la necesidad</label>
                <textarea cols="90" rows="10" name="txaDescripcion" id="descripcion"></textarea>
            </div>
            <?php endif; ?>
             <?php if($id=="obj_general"): ?>
             <div class="form-group">
                 <label for="objgeneral">Objetivo general de la propuesta</label>
                 <textarea cols="90" rows="10" name="txa_obj_general" id="objgeneral"></textarea>
            </div>
            <?php endif; ?>
            <?php if($id=="obj_especificos"): ?>
             <div class="form-group">
                <label for="objespecifico">Objetivos especificos de la propuesta</label>
                <textarea cols="90" rows="10" name="txa_obj_especifico" id="objespecifico"></textarea>
            </div>
            <?php endif; ?>
             <?php if($id=="centros"): ?>
             <div class="form-group">
                <label for="centros">Centros de formación,población y programas</label>
                <textarea cols="90" rows="10" name="txaCentros" id="centros"></textarea>
            </div>
            <?php endif; ?>
             <?php if($id=="justificacion"): ?>
            <div class="form-group">
                <label for="justificacion">Justificación técnica de la propuesta</label>
                <textarea cols="90" rows="10" name="txaJustificacion" id="justificacion"></textarea>
            </div>
    <?php endif; ?>
<?php if($id=="identificacion"): ?>
            <div class="form-group">
                <label for="identificacion">Identificación de componentes de innovación</label>
                <textarea cols="90" rows="10" name="txaIdentificacion" id="identificacion"></textarea>
            </div>
    <?php endif; ?>
<?php if($id=="resultados"): ?>
            <div class="form-group">
                <label for="resultados">Resultados esperados</label>
                <textarea cols="90" rows="10" name="txaResultados" id="resultados"></textarea>
            </div>
    <?php endif; ?>
<?php if($id=="mecanismos"): ?>
            <div class="form-group">
                <label for="mecanismos">Mecanismos de divulgación al sector produtivo </label>
                <textarea cols="90" rows="10" name="txaMecanismos" id="mecanismos"></textarea>
            </div>
    <?php endif; ?>
<?php if($id=="relacion"): ?>
            <div class="form-group">
                <label for="relacion">Relación de la propuesta</label>
                <textarea cols="90" rows="10" name="txaRelacion" id="relacion"></textarea>
            </div>
<?php endif;?>
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="new_proyect_descripciones">
                <input class="btn" type="submit" value="Enviar"> 

            </div>
        </form>
    </article>
</div>
 <?php $contenido= ob_get_clean();
include '/../layout/base.php' ;
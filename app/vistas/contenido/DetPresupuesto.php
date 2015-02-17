<?php ob_start() ;?>

<h3>Presupuesto</h3>
 <article id="presupuesto" class="detalles">
                	
    <table class="table table-bordered table-hover" >
        <tr>
            <th rowspan="2">Acción de aprendizaje</th>
            <th rowspan="2">Rubro</th>
            <th rowspan="2">Descripcion</th>
            <th rowspan="2">Financiado</th>
            <th rowspan="2">%</th>
            <th colspan="4">Contrapartida</th>
            <th rowspan="2">Total</th>
        </tr>
        <tr>
            <td>Especie</td>
            <td>%</td>
            <td>Dinero</td>
            <td>%</td>
        </tr>
        <tr>
            <?php if($esAdmin): ?>
        <form class="form-control">
            <td><input type="text" name="accion" placeholder="agregar"></td>
            <td><input type="text" name="rubro" placeholder="agregar"></td>
            <td><input type="text" name="descripcion" placeholder="agregar"></td>
            <td><input class="input-md"type="number" name="financiado" placeholder="agregar"></td>
            <td><input class="input-micro" type="number" name="f%" ></td>
            <td><input class="input-pk"type="number" name="especie" ></td>
            <td><input class="input-micro" type="number" name="especie%" ></td>
            <td><input class="input-pk" type="number" name="dinero" ></td>
            <td><input class="input-micro" type="number" name="dinero%" ></td>
            <td><input class="input-md" type="number" name="total" placeholder="agregar"></td>
            <input type="submit" value="Guardar">
        </form>
                
                <?php elseif($parametros['presupuesto']==FALSE): ?>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
         <?php endif; ?>
    </table>
</article><!--fin #presupuesto-->
                      
            
   
<?php $contenido = ob_get_clean() ;
  include'/../plantillas/base.php';

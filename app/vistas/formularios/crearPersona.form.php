<?php ob_start(); ?>

<div class="contenedorCentral">
    <article>
        
        <form action="index.php?ctl=Procesar&form=personas&cat=i" method="POST" >
            <fieldset>
                <legend> Datos de la oficina o lugar de trabajo</legend>
                 <div class="form-group">
                    <label for="direccion">Dirección de la oficina</label>
                    <input  class="input" type="text" name="txtDireccion" id="direccion" maxlength="150" required>
                </div>
                
                <div class="form-group">                   
                    <div class="form-group-medio">
                        <label for="ciudad">Ciudad donde labora</label>
                        <input class="input" type="text" name="txtCiudad" id="ciudad"> 
                    </div>
                    <div class="form-group-medio">
                        <label for="telefono">Teléfono</label>
                        <input class="input" type="tel" name="txtTelefono" id="telefono" required>
                    </div>
                </div>
                
                 <div class="form-group">
                    <div class="form-group-medio">
                        <label for="cargo">Cargo</label>
                        <input class="input" type="text" name="txtCargo" id="cargo" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="dependencia">Dependencia</label>
                        <input class="input" type="text" name="txtDependencia" id="dependencia"> 
                    </div>
                </div>
                
            </fieldset>
            <fieldset>
                <legend>Datos personales</legend>

               <div class="form-group">
                    <label for="entidad">Entidad</label>
                    <input  class="input" type="text" name="txtEntidad" id="entidad" maxlength="150" required>
               </div>

                <div class="form-group">
                   <div class="form-group-medio">
                        <label for="rol">Rol en el proyecto</label>
                        <input  class="input" type="text" name="txtRol" id="rol" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="dedicacion">Dedicación en horas semanales</label>
                        <input  class="input" type="text" name="txtDedicacion" id="dedicacion" required>
                    </div>  
                </div>

                 <div class="form-group">
                    <div class="form-group-medio">
                        <label for="primer">Primer Apellido</label>
                        <input   class="input" type="text" name="txtPrimer" id="primer" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="segundo">Segundo Apellido</label>
                        <input class="input" type="text" name="txtSegundo" id="segundo"> 
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="nombres">Nombres</label>
                        <input class="input" type="text" name="txtNombres" id="nombres" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="sexo">sexo</label>
                        <select name="sexo" id="sexo">
                        <option value="m">Masculino</option>
                        <option value="f">Femenino</option>
                    </select>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="form-group-medio">
                        <label for="fecha">Fecha nacimiento</label>
                        <input class="input" type="date" name="dtFecha" id="fecha" required>
                    </div>
                    <div class="form-group-medio">
                        <label for="pais">Pais de nacimiento</label>
                        <input class="input" type="text" name="txtPais" id="pais"> 
                    </div>
                </div>

                 <div class="form-group">
                    <div class="form-group-medio">
                        <label for="tipoId">Tipo de identificación</label>
                        <select name="tipoId" id="tipoId">
                        <option value="cc">C.C</option>
                        <option value="ce">C.E</option>
                        <option value="ti">T.I</option>
                        <option value="ps">PP</option>
                    </select>
                    </div>
                    <div class="form-group-medio">
                        <label for="numero">Número</label>
                        <input class="input" type="text" name="txtNumero" id="numero"> 
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Correo Eléctronico</label>
                    <input class="input" type="email" name="email" id="email" >
                </div>

                <div class="form-group">
                    <label for="responsabilidades">Responsabilidades en el proyecto</label>
                    <textarea  cols="90" rows="5" name="txaResponsabilidades" id="responsabilidades" ></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="titulos">Titulos y certificaciones</label>
                    <textarea  cols="90" rows="5" name="txaTitulos" id="titulos" ></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="expEmpresarial">Experiencia empresarial en el área temática</label>
                    <textarea  cols="90" rows="5" name="txaExpEmpresarial" id="expEmpresarial" ></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="expDocente">Experiencia docente en el área temática</label>
                    <textarea  cols="90" rows="5" name="txaExpDocente" id="expDocente" ></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="resumen">Resumen de la hoja de vida</label>
                    <textarea  cols="90" rows="5" name="txaResumen" id="resumen" ></textarea>
                </div>
                
                 <div class="form-group">
                    <label for="referencias">Referencias que acreditan idoneidad en el objeto de la capacitación</label>
                    <textarea  cols="90" rows="5" name="txaReferencias" id="referencias" ></textarea>
                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <input class="btn" type="submit" value="Enviar"> 
                    </div>
                    <div class="form-group-medio">
                        <a  class="btn" href="<?php echo $uri ?>">Cancelar</a//pendiente por definir
                    </div>  
                </div>
            </fieldset>
            
        </form>
                </article><!--editargeneralidades-->
</div>
 <?php $contenido= ob_get_clean();
include'/../plantillas/base.php';


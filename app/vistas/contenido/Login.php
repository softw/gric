 <?php ob_start() ;

 //...............contenedor principal................-->?>

<div class="contenedorCentral">
    <div class="registro">
        <form action="index.php?ctl=Procesar&form=nuevo_usuario&cat=i" method="post">
            <fieldset><legend>Registrarse</legend>

                <div class="form-group">
                    <p>Recuerda que para poder utilizar esta plataforma necesitas un email del sena</p>
                </div>


                <div class="form-group"> 
                    <?php if(isset($validado)&&$validado['nombre']==FALSE): ?>
                    <p class="error">El nombre no tiene el formato correcto</p>
                    <?php endif;?>
                    <label for="nombre">Nombre</label>
                    <input class="input" type="text" name="txtNombre" id="nombre" required
                    <?php if(isset($form_registro['nombre'])): ?>value="<?php echo $form_registro['nombre'];endif?>">
                </div>

                <div class="form-group">
                    <div class="form-group-medio">
                        <?php if(isset($validado)&&$validado['pApellido']==FALSE): ?>
                        <p class="error">El apellido no tiene el formato correcto</p>
                        <?php endif;?>
                        <label for="pApellido">Primer apellido</label>
                        <input class="input" type="text" name="txtPapellido" id="pApellido" required
                        <?php if(isset($form_registro['pApellido'])): ?>value="<?php echo $form_registro['pApellido'];endif?>">
                    </div>
                    
                    <div class="form-group-medio">
                        <?php if(isset($validado)&&$validado['sApellido']==FALSE): ?>
                        <p class="error">El apellido no tiene el formato correcto</p>
                        <?php endif;?>
                        <label for="sApellido">Segundo apellido</label>
                        <input class="input" type="text" name="txtSapellido" id="sApellido" required
                        <?php if(isset($form_registro['sApellido'])): ?>value="<?php echo $form_registro['sApellido'];endif?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="form-group-medio">
                        <label for="td">Tipo Documento</label>
                        <select name="selTd" id="td">
                            <option value="cc">CC</option>
                            <option value="ti">TI</option>
                            <option value="ce">CE</option>
                            <option value="pp">PP</option>
                        </select>
                    </div>
                    
                    <div class="form-group-medio">
                        <?php if(isset($validado)&&$validado['numero']==FALSE): ?>
                        <p class="error">El numero de documento no tiene el formato correcto</p>
                        <?php endif;?>
                        <label for="numero">Número</label>
                        <input class="input" name="txtNumero" id="numero" required
                        <?php if(isset($form_registro['numero'])): ?>value="<?php echo $form_registro['numero'];endif?>">      
                    </div>
                </div>
                
                <div class="form-group">
                    <?php if(isset($validado)&&$validado['email']==FALSE): ?>
                    <p class="error">El email no tiene el formato correcto</p>
                    <?php endif;?>
                    <label for="email">email</label>
                    <input class="input" type="email" name="txtEmail" id="email" required
                    <?php if(isset($form_registro['email'])): ?>value="<?php echo $form_registro['email'];endif?>">
                </div>
                
                <div class="form-group">
                    <label for="password">password</label>
                    <input class="input" type="password" name="txtPassword" id="password" required>
                </div>

                <div class="form-group">
                    <input class="btn" type="submit" value="Registrarse">
                </div>
                
            </fieldset>
        </form>
    </div>

    <div class="login">
        <form action="index.php?ctl=Procesar&form=login&cat=s" method="POST">
            <fieldset><legend>Iniciar sesión</legend>
                <div class="form-group">
                    <?php if(isset($_GET['error']) && $_GET['error']=="ei"): ?>
                    <p class="error">Parece que escribiste mal tu correo</p>
                    <?php endif; 
                    if(isset($_GET['error']) && $_GET['error'] == "ee"):?>
                    <p class="error">El usuario no existe en la base de datos</p>
                    <?php endif; ?>
                    <input class="input" type="email" name="txtEmail"
                    <?php if(isset($form_login['email'])): ?> value="<?php echo $form_login['email']?>"> 
                    <?php else:?> placeholder="Email" > <?php endif ?>
                </div>
                
                <div class="form-group">
                    <?php if(isset($form_login['password_incorrecto'])): ?>
                    <p class="error">La contraseña no coincide</p>
                    <?php endif; ?>
                    <input class="input" type="password" name="txtPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="btn" type="submit" value="Ingresar">
                </div>


            </fieldset>

        </form>
    </div>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include '/../plantillas/base.php' ;


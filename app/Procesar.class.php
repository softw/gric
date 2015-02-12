<?php

class Procesar
{
    public static function form_login()
    {

     $formulario_login=[];
     $formulario_login['valido']= FALSE;
     $formulario_login['email']= htmlentities(addslashes($_POST['txtEmail'])); 
     $formulario_login['password']= md5(sha1($_POST['txtPassword']));
     
     //validacion del formulario
     $formulario_login_validado=  Validar::form_login($formulario_login['email']);
        if($formulario_login_validado['valido'])
        {
            //comprobamos si existe el email ingresado en la bd
            if(Modelo::email_existe($formulario_login['email']))
                {
                  //comprobamos si el email coincide con el pass
                    if(Modelo::validar_password($formulario_login['email'],$formulario_login['password']))
                        {
                             //si todo esta en orden
                             $formulario_login['ctl']="Inicio";
                        }else{
                            //si el password no coincide
                            $formulario_login['ctl']="Login";
                            $formulario_login['password_incorrecto']="El password no coincide";
                        }
                
                    }else{
                            //el email no existe en la bd
                        $formulario_login['ctl']="Login";
                        $formulario_login['email_no_existe']="El email no existe en la base de datos";
                           
                        }        
        }else{
            //el email no corresponde con el formato requerido
            $formulario_login['ctl']="Login";
            $formulario_login['email_mal_formato']="Verifica tu email";
        }
        
    return $formulario_login;
    }//fin formulario login
    

    public static function form_nuevo_usuario()
    {
        $form_nuevo_usuario=[];
        $form_nuevo_usuario['nombre']=       htmlentities(addslashes($_POST['txtNombre']));
        $form_nuevo_usuario['pApellido']= htmlentities(addslashes($_POST['txtPapellido']));
        $form_nuevo_usuario['sApellido']=     htmlentities(addslashes($_POST['txtSapellido']));
        $form_nuevo_usuario['tDocumento']=         htmlentities(addslashes($_POST['selTd']));
        $form_nuevo_usuario['nDocumento']=     htmlentities(addslashes($_POST['txtNumero']));
        $form_nuevo_usuario['email']=        htmlentities(addslashes($_POST['txtEmail']));
        $form_nuevo_usuario['password']=    md5(sha1($_POST['txtPassword']));
       
       // $formulario_validado= Validar::form_nuevo_usuario($form_nuevo_usuario); validar despues 
        $formulario_validado['valido']=TRUE;
        if($formulario_validado['valido'])
        {
            //si todo el formulario es correcto
            if(Modelo::insertar_usuario($form_nuevo_usuario['email'], $form_nuevo_usuario['password']))
            {
                //si se inserta el nuevo registro en la bd
                $form_nuevo_usuario['ctl']="Login";
                $form_nuevo_usuario['msj']="Inicia sesion con tu nueva cuenta";
            }else
            {
                $form_nuevo_usuario['ctl']="Inicio";
                $form_nuevo_usuario['error_msj']="Error desconocido";
            }
             
        }else
        {
            //si hubieron errores en el formulario
            $form_nuevo_usuario['ctl']="Login";
            $form_nuevo_usuario['errores']=$formulario_validado;
            //los errores estan el el array $formulario_validado
        }
    
        return $form_nuevo_usuario;
    }//fin form_nuevo_usuario
    
    public static function form_nuevo_proyecto()
    {
        $form_nuevo_proyecto=[];
        $form_nuevo_proyecto['valido'] =FALSE;
        $form_nuevo_proyecto['titulo']=       htmlentities(addslashes($_POST['txtTitulo']));
        $form_nuevo_proyecto['convocatoria']= htmlentities(addslashes($_POST['txtConvocatoria']));
        $form_nuevo_proyecto['programa']=     htmlentities(addslashes($_POST['txtPrograma']));
        $form_nuevo_proyecto['tipo_f']=         htmlentities(addslashes($_POST['txtTipo']));
        $form_nuevo_proyecto['duracion']=     htmlentities(addslashes($_POST['txtDuracion']));
        $form_nuevo_proyecto['lugar']=        htmlentities(addslashes($_POST['txtLugar']));
        $form_nuevo_proyecto['ben_camp']=    htmlentities(addslashes($_POST['beneficia']));
        $form_nuevo_proyecto['descripcion']=       htmlentities(addslashes($_POST['txaDescripcion']));
        $form_nuevo_proyecto['id_usuario']= $_SESSION['id_usuario'];

        //la validacion para despues 
        // $formulario_valido= Validar::form_nuevo_proyecto($form_nuevo_proyecto);
        $formulario_valido['valido']= TRUE;

        if($formulario_valido['valido'])
        {
           $resultado=Modelo::insertar_generalidades($form_nuevo_proyecto['id_usuario'],$form_nuevo_proyecto['titulo'], $form_nuevo_proyecto['convocatoria'], $form_nuevo_proyecto['programa'], $form_nuevo_proyecto['tipo_f'], $form_nuevo_proyecto['duracion'], $form_nuevo_proyecto['lugar'], $form_nuevo_proyecto['ben_camp'], $form_nuevo_proyecto['descripcion']);
          if($resultado==FALSE)
           {//si no se inserto nada en la bd
               $form_nuevo_proyecto['error']="desconocido";             
           }else
           {//si se realiza la insercion en la bd
               $form_nuevo_proyecto['ctl']="Detalles";
               $form_nuevo_proyecto['id_proyecto']=$resultado;             
           }
            
        }else
        {//si el formulario tiene campos invalidos
            $form_nuevo_proyecto['ctl']="Nuevo_proyecto";
        }
        return $form_nuevo_proyecto;
    }//fin form_nuevo_proyecto
    
    public static function form_descripcion($clave)
    {
        //aqui estan todas las descripciones del proyecto
        $form_descripcion=[];
        $form_descripcion['valido'] =FALSE;
        $form_descripcion['clave']=$clave;
        $form_descripcion['valor']= htmlentities(addslashes($_POST['txtDescripcion']));

        //la validacion para despues 
        // $formulario_valido= Validar::form_nuevo_proyecto($form_nuevo_proyecto);
        $formulario_valido['valido']= TRUE;

        if($formulario_valido['valido'])
        {
            if($clave=="obj_general")
            {
                $resultado= Modelo::insertar_descripcion($clave, $form_descripcion['valor'], $_SESSION['id_proyecto']);
            }else
            {
                $resultado= Modelo:: actualizar_descripcion($clave, $form_descripcion['valor'], $_SESSION['id_proyecto']);
            }
          if($resultado==FALSE)
           {//si no se inserto nada en la bd
               $form_descripcion['error']="desconocido";             
           }else
           {//si se realiza la insercion en la bd
               $form_descripcion['ctl']="Detalles";
               $form_descripcion['cat']="descripciones";             
           }
            
        }else
        {//si el formulario tiene campos invalidos
            $form_descripcion['ctl']="Nuevo";
        }
        return $form_descripcion;
        
    }
    
    public static function form_persona()
    {
        $form_persona=[];
        $form_persona['valido'] =FALSE;
        $form_persona['direccion']=  htmlentities(addslashes($_POST['txtDireccion']));
        $form_persona['ciudad']=     htmlentities(addslashes($_POST['txtCiudad']));
        $form_persona['telefono']=   htmlentities(addslashes($_POST['txtTelefono']));
        $form_persona['cargo']=      htmlentities(addslashes($_POST['txtCargo']));
        $form_persona['dependencia']=htmlentities(addslashes($_POST['txtDependencia']));       
        $form_persona['entidad']=    htmlentities(addslashes($_POST['txtEntidad']));
        
        $form_persona['rol']=        htmlentities(addslashes($_POST['txtRol']));
        $form_persona['dedicacion']= htmlentities(addslashes($_POST['txtDedicacion']));
        
        $form_persona['pApellido']=  htmlentities(addslashes($_POST['txtPrimer']));
        $form_persona['sApellido']=     htmlentities(addslashes($_POST['txtSegundo']));
        $form_persona['nombres']=   htmlentities(addslashes($_POST['txtNombres']));
        $form_persona['sexo']=      htmlentities(addslashes($_POST['sexo']));
        $form_persona['fechaNa']=htmlentities(addslashes($_POST['dtFecha'])); 
        $form_persona['paisNa']=    htmlentities(addslashes($_POST['txtPais']));
        $form_persona['tipoId']=        htmlentities(addslashes($_POST['tipoId']));
        $form_persona['numeroId']= htmlentities(addslashes($_POST['txtNumero']));
        $form_persona['email']=   htmlentities(addslashes($_POST['email']));
        $form_persona['titulos']=htmlentities(addslashes($_POST['txaTitulos'])); 
         
        $form_persona['respon']=      htmlentities(addslashes($_POST['txaResponsabilidades']));      
        $form_persona['expEmpresarial']=    htmlentities(addslashes($_POST['txaExpEmpresarial']));
        $form_persona['expDocente']=        htmlentities(addslashes($_POST['txaExpDocente']));
        $form_persona['resumen']= htmlentities(addslashes($_POST['txaResumen']));
        $form_persona['referencias']= htmlentities(addslashes($_POST['txaReferencias']));
        
       

        //la validacion para despues 
        // $formulario_valido= Validar::form_persona($form_persona);
        $formulario_valido['valido']= TRUE;

        if($formulario_valido['valido'])
        {
           $resultado=Modelo::insertar_persona($_SESSION['id_proyecto'], $form_persona['direccion'], $form_persona['ciudad'], $form_persona['telefono'], $form_persona['cargo'], $form_persona['dependencia'], $form_persona['entidad'], $form_persona['rol'], $form_persona['dedicacion'], $form_persona['pApellido'], $form_persona['sApellido'], $form_persona['nombres'], $form_persona['sexo'], $form_persona['fechaNa'], $form_persona['paisNa'], $form_persona['tipoId'], $form_persona['numeroId'], $form_persona['email'], $form_persona['respon'], $form_persona['titulos'], $form_persona['expEmpresarial'], $form_persona['expDocente'], $form_persona['resumen'], $form_persona['referencias']);
          if($resultado==FALSE)
           {//si no se inserto nada en la bd
               $form_persona['ok']=FALSE;             
           }else
           {//si se realiza la insercion en la bd
               $form_persona['ok']=TRUE;
               $form_persona['id_proyecto']=$resultado;             
           }
            
        }else
        {//si el formulario tiene campos invalidos
            $form_persona['ok']=FALSE;
        }
        return $form_persona;
        
    }
}




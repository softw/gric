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
}




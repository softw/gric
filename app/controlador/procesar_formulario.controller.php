<?php
require '/../Validar.class.php';
function procesar_form_nuevo_proyecto()//metodo para insertar un proyecto nuevo en la bd primero se valida
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
        Modelo::insertar_generalidades($form_nuevo_proyecto['id_usuario'],$form_nuevo_proyecto['titulo'], $form_nuevo_proyecto['convocatoria'], $form_nuevo_proyecto['programa'], $form_nuevo_proyecto['tipo_f'], $form_nuevo_proyecto['duracion'], $form_nuevo_proyecto['lugar'], $form_nuevo_proyecto['ben_camp'], $form_nuevo_proyecto['descripcion']);
        header('location: index.php?ctl=Listado&buscar=m');
    }else
    {
        header('location:index.php?ctl=Nuevo_proyecto');
    }
       
}//fin metodo para insertar nuevo proyecto

function procesar_form_nuevo_usuario()
{
    $form_nuevo_usuario=[];
    $form_nuevo_usuario['valido'] =FALSE;
    $form_nuevo_usuario['nombre']=       htmlentities(addslashes($_POST['txtNombre']));
    $form_nuevo_usuario['pApellido']= htmlentities(addslashes($_POST['txtConvocatoria']));
    $form_nuevo_usuario['sApellido']=     htmlentities(addslashes($_POST['txtPrograma']));
    $form_nuevo_usuario['tDocumento']=         htmlentities(addslashes($_POST['txtTipo']));
    $form_nuevo_usuario['nDocumento']=     htmlentities(addslashes($_POST['txtDuracion']));
    $form_nuevo_usuario['email']=        htmlentities(addslashes($_POST['txtEmail']));
    $form_nuevo_usuario['password']=    md5(sha1($_POST['txtPassword']));
   //la validacion para despues 
   // $formulario_valido= Validar::form_nuevo_usuario($form_nuevo_usuario);
    $formulario_valido['valido']= TRUE;
    
    if($formulario_valido['valido'])
    {
        Modelo::insertarUsuario($form_nuevo_usuario['email'], $form_nuevo_usuario['password']);
         require 'login.controller.php';
    }else
    {
        header('location:index.php?ctl=login&error=');
    }
    
}

 function procesar_form_login()
{
     $formulario_login=[];
     $formulario_login['valido']= FALSE;
     $formulario_login['email']= htmlentities(addslashes($_POST['txtEmail'])); 
     $formulario_login['password']= md5(sha1($_POST['txtPassword']));
     //validacion del formulario
     $formulario_valido=  Validar::form_login($formulario_login['email']);
        if($formulario_valido['valido'])
        {
            //comprobamos si existe el email ingresado en la bd
            if(Modelo::email_existe($formulario_login['email']))
                {
                  //comprobamos si el email coincide con el pass
                    if(Modelo::validar_password($formulario_login['email'],$formulario_login['password']))
                        {
                             header('location:index.php?ctl=Inicio');
                        }else{
                            //si el password no coincide
                            header('location:index.php?ctl=Login&form=login&error=pi');
                        }
                
                    }else{
                            //el email no existe en la bd
                            header('location:index.php?ctl=Login&form=login&error=ee');
                        }        
        }else{
            //el email no corresponde con el formato requerido
            header('location:index.php?ctl=Login&form=login&error=ei');//ei = email invalido
        }
        
    
}

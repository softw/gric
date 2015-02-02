<?php

require '/../Validar.class.php';
$id=  htmlentities($_GET['id']);
$action= htmlentities($_GET['action']);
$validado=array();
switch ($id)
{ 
    case "login":
        $form_login=array();      
        $email=  htmlentities(addslashes($_POST['txtEmail']));
        $password= md5(sha1($_POST['txtPassword']));
        $validado=Validar::form_login($email);
        if($validado['valido'])
        {
            procesar_form_login($email,$password);
        }
        else           
        {            
            $form_login['email_invalido']=TRUE;
            require 'login.controller.php';           
        }
        break;
        
    case "registro":
        $form_registro=array();
        $form_registro['nombre']=  htmlentities(addslashes($_POST['txtNombre']));
        $form_registro['pApellido']=  htmlentities(addslashes($_POST['txtPapellido']));
        $form_registro['sApellido']=  htmlentities(addslashes($_POST['txtSapellido']));
        $form_registro['numero']=  htmlentities(addslashes($_POST['txtNumero']));
        $form_registro['email']=  htmlentities(addslashes($_POST['txtEmail']));
        
        $validado=Validar::form_registro($form_registro);
        if($validado['valido'])
        {
            
        }
        else
        {
            require 'login.controller.php';
        }
        break;
    case "generalidades":
        $form_generalidades=array();
        $form_generalidades['titulo']=  htmlentities(addslashes($_POST['txtTitulo']));
        $form_generalidades['convocatoria']=  htmlentities(addslashes($_POST['txtConvocatoria']));
        $form_generalidades['programa']=  htmlentities(addslashes($_POST['txtPrograma']));
        $form_generalidades['tipo_f']=  htmlentities(addslashes($_POST['txtTipo']));
        $form_generalidades['duracion']=  htmlentities(addslashes($_POST['txtDuracion']));
        $form_generalidades['lugar']=  htmlentities(addslashes($_POST['txtLugar']));
        $form_generalidades['ben_camp']=  htmlentities(addslashes($_POST['beneficia']));
        $form_generalidades['descripcion']=  htmlentities(addslashes($_POST['txaDescripcion']));
        
        $validado = Validar::form_nuevo_proyecto($form_generalidades);
        if($validado['valido'])
        {
            
        }
        else 
        {
            require 'generalidades.controller.php';
        }
        
}

function procesar_form_login($email,$pass)
{
    if(Modelo::email_existe($email))
    {
        if(Modelo::validar_password($email, $pass))
        {
            header('location:index.php?ctl=Inicio');
        }else
        {
            $form_login['password_incorrecto']=TRUE;
            require 'login.php';
        }
                
    }else
    {
        $form_login['email_no_existe']=TRUE;
        require 'login.php';
    }        
}

function procesar_form_registro()
{
    
}
<?php
require '/../Validar.class.php';
function nuevo_proyecto($categoria)//metodo para insertar un proyecto nuevo en la bd primero se valida
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

function nuevo_usuario($categoria)
{
    $form_nuevo_usuario=[];
    $form_nuevo_usuario['valido'] =FALSE;
    $form_nuevo_usuario['nombre']=       htmlentities(addslashes($_POST['txtNombre']));
    $form_nuevo_usuario['pApellido']= htmlentities(addslashes($_POST['txtConvocatoria']));
    $form_nuevo_usuario['sApellido']=     htmlentities(addslashes($_POST['txtPrograma']));
    $form_nuevo_usuario['tDocumento']=         htmlentities(addslashes($_POST['txtTipo']));
    $form_nuevo_usuario['nDocumento']=     htmlentities(addslashes($_POST['txtDuracion']));
    $form_nuevo_usuario['email']=        htmlentities(addslashes($_POST['txtEmail']));
    $form_nuevo_usuario['password']=    htmlentities(addslashes($_POST['txtPassword']));
   //la validacion para despues 
   // $formulario_valido= Validar::form_nuevo_usuario($form_nuevo_usuario);
    $formulario_valido['valido']= TRUE;
    
    if($formulario_valido['valido'])
    {
        Modelo::insertarUsuario($form_nuevo_usuario['email'], $form_nuevo_usuario['password']);
         require 'login.controller.php';
    }else
    {
        header('location:index.php?ctl=');
    }
    
}

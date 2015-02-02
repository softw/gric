<?php

//comprobar credenciales para ver la pagina
if(!isset($_GET['id'])|| !isset($_SESSION['usuario']))
{
    header('location:index.php?ctl=404');
}

$id_proyecto=  htmlentities(addslashes($_GET['id']));
$titulo=  trim($_GET['titulo']);
$esAdmin=FALSE;
$m=new Modelo();
$params = ['generalidades' =>$m->listarGeneralidades($id_proyecto)];

foreach ($params['generalidades'] as $proyecto){
    $_SESSION['id_proyecto']=$proyecto['id'];
    $_SESSION['id_admin']=$proyecto['id_usuario'];
}

if($_SESSION['id_usuario']==$_SESSION['id_admin']){
    $esAdmin=true;
}

if(isset($_GET['editar'])&&$_GET['editar']==TRUE || isset($form_generalidades))
{
    $GLOBALS['ruta']=$titulo."/editar generalidades";
    $GLOBALS['titulo']="Editar Generalidades";
    require ('/../vistas/formularios/editGeneralidades.php');
}
else
{
    $GLOBALS['ruta']=$titulo."/Generalidades";
    $GLOBALS['titulo']="Detalles Generales";
    require ('/../vistas/contenido/DetGeneralidades.php'); 
}
            
    

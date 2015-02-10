<?php
 // index.php
 
session_start();
 // carga del modelo y los controladores
 require '/../app/Validar.class.php';
 require '/../app/Procesar.class.php';
require "/../app/Conexion.class.php";
 require "/../app/Modelo.class.php";
 require "/../app/Controller.class.php";
 require "/../app/detalles.class.php";
 
 // enrutamiento
$map = [
    'Inicio'      =>  ['controller'=>'Controller', 'action'=>'crear_p_inicio'],
    'About'       =>  ['controller'=>'Controller', 'action'=>'crear_p_about'],
    'Listado'     =>  ['controller'=>'Controller', 'action'=>'crear_p_listado'],
    'Login'       =>  ['controller'=>'Controller', 'action'=>'crear_p_login_registro'],
    'Perfil'      =>  ['controller'=>'Controller', 'action'=>'crear_p_perfil'], 
    'Nuevo'       =>  ['controller'=>'Controller', 'action'=>'crear_p_formularios_insert'],
    'Editar'      =>  ['controller'=>'Controller', 'action'=>'crear_p_formularios_update'],
    '404'         =>  ['controller'=>'Controller', 'action'=>'crear_p_error'],
    'Nuevo_proyecto'=> ['controller'=>'Controller','action'=>'crear_p_nuevo_proyecto'],
    'Procesar'    =>  ['controller'=>'Controller', 'action'=>'procesar_formulario'],/*procesa todos los formularios*/
    'Detalles'    =>  ['controller'=>'Controller', 'action'=>'crear_p_detalles']
];

 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = htmlentities(addslashes($_GET['ctl']));
     } else {
         header('Status: 404 Not Found,');
         header('location:index.php?ctl=404');
         exit;
     }
 } else {
     $ruta = 'Inicio';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

     header('Status: 404 Not Found');
     header('location:index.php?ctl=404');
  
 }


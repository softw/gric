<?php
 
 // index.php
session_start();
 // carga del modelo y los controladores
 //require '/../app/Validaciones.class.php';
 //require '/../app/Procesar.class.php';
require "/../app/Conexion.class.php";
 require "/../app/Modelo.class.php";
 require "/../app/Controller.class.php";
 
 // enrutamiento
$map = [
    'Inicio'      =>  ['controller'=>'Controller', 'action'=>'crear_p_inicio'],
    'About'       =>  ['controller'=>'Controller', 'action'=>'crear_p_about'],
    'Listado'     =>  ['controller'=>'Controller', 'action'=>'crear_p_listado'],
    'Login'       =>  ['controller'=>'Controller', 'action'=>'crear_p_login_registro'],
    'Perfil'      =>  ['controller'=>'Controller', 'action'=>'crear_p_perfil'], 
    'Form_crear'  =>  ['controller'=>'Controller', 'action'=>'crear'],
    'Form_editar' =>  ['controller'=>'Controller', 'action'=>'editar'],
    'Generalidades'=> ['controller'=>'Controller', 'action'=>'crear_p_generalidades'],
    'Descripciones'=> ['controller'=>'Controller', 'action'=>'crear_p_descripciones'],
    'Personas'    =>  ['controller'=>'Controller', 'action'=>'crear_p_personas'],
    'Cronograma'  =>  ['controller'=>'Controller', 'action'=>'crear_p_cronograma'],
    'Resultados'  =>  ['controller'=>'Controller', 'action'=>'detalles'],
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


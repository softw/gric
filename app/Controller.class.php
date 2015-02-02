<?php

class Controller
{
    public function crear_p_error()
    {
        require 'controlador/error404.controller.php';
    }
    
    public function crear_p_inicio()
    {
        require 'controlador/inicio.controller.php'; 
    }
    
    public function crear_p_about()
    {
        require 'controlador/about.controller.php';       
    }
    
    public function crear_p_login_registro()
    {
        require 'controlador/login.controller.php';
    }
    
    public function crear_p_listado()
    {
        require 'controlador/listado.controller.php';
    }
    
    public function validar_formulario()
    {
        require 'controlador/validar.controller.php';
               
    }
    
    public function crear_p_generalidades()
    {
        require 'controlador/generalidades.controller.php';
    }
    
    public function crear_p_nuevo_proyecto()
    {
        require 'controlador/nuevo_proyecto.controller.php';
    }
     
    public function procesar_form()
    {
        require 'controlador/procesar_formulario.php';
    }
}

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
    
    public function crear_p_detalles()
    {
        $cat=  htmlentities(addslashes($_GET['cat']));
        $id= htmlentities(addslashes($_GET['id']));
        $titulo=  trim($_GET['titulo']);
        switch ($cat)
        {
            case "generalidades":
                require 'controlador/generalidades.controller.php';
                break;
        }
        
    }
    
    public function crear_p_generalidades()
    {
        require 'controlador/generalidades.controller.php';
    }
    
    public function crear_p_nuevo_proyecto()
    {
        require 'controlador/nuevo_proyecto.controller.php';
    }
     
    public function procesar_formulario()
    {   
        require 'controlador/procesar_formulario.controller.php';
        //form= tipo de formulario
        //cat= si es update, insert o select
        //definir el tipo de formulario para llamar al metodo correspondiente
        $formulario= htmlentities(addslashes($_GET['form']));
        $categoria= htmlentities(addslashes($_GET['cat']));
        
        switch ($formulario)
        {
            case "nuevo_proyecto":
                $metodo= procesar_form_nuevo_proyecto($categoria);
                break;
            case "nuevo_usuario":
                $metodo= procesar_form_nuevo_usuario($categoria);
                break;
            case "login":
                $metodo= procesar_form_login();
                break;
        }
      
        
    }
}


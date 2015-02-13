<?php

    //comprobar credenciales para ver la pagina
    if(!isset($_GET['id'])|| !isset($_SESSION['usuario']) || !isset($_GET['cat']))
    {
        header('location:index.php?ctl=404');
    }
    
   $categoria=  htmlentities(addslashes($_GET['cat']));
   $id_proyecto= htmlentities(addslashes($_GET['id']));
   
   $esAdmin= Modelo::es_admin($id_proyecto, $_SESSION['id_usuario']);
   
   switch ($categoria)
    {
        case "generalidades":
            $params = ['generalidades' => Modelo::listar_generalidades($id_proyecto)];

            foreach ($params['generalidades'] as $proyecto)
            {
                $_SESSION['titulo_proyecto']= $proyecto['titulo'];
                $_SESSION['id_proyecto']= $proyecto['id'];
            }
            $GLOBALS['ruta']=$_SESSION['titulo_proyecto']."/Generalidades";
            $GLOBALS['titulo']="Detalles Generales";
            require ('/../vistas/contenido/DetGeneralidades.php'); 
            break;
            
        case "descripciones":
            $params = ['descripciones' => Modelo::listar_descripciones($id_proyecto)];
           
            $GLOBALS['ruta']=$_SESSION['titulo_proyecto']."/descripciones";
            $GLOBALS['titulo']="Descripciones";
            require ('/../vistas/contenido/DetDescripciones.php');
            break;
        
        case "personas":
            $params = ['personas' => Modelo::listar_personas($id_proyecto)];
            $GLOBALS['ruta']=$_SESSION['titulo_proyecto']."/personas";
            $GLOBALS['titulo']="Personas";
            
            require ('/../vistas/contenido/DetPersonas.php');
            break;
        
        case "entidades":
            $GLOBALS['ruta']=$_SESSION['titulo_proyecto']."/entidades";
            $GLOBALS['titulo']="Entidades";
            require ('/../vistas/contenido/DetEntidades.php');
            break;
        
        case "presupuesto":
            $GLOBALS['ruta']=$_SESSION['titulo_proyecto']."/presupuesto";
            $GLOBALS['titulo']="Presupuesto";
            require ('/../vistas/contenido/DetPresupuesto.php');
            break;
        
        case "cronograma":
            $params = ['actividades' => Modelo::listar_actividades($id_proyecto)];
            $GLOBALS['ruta']=$_SESSION['titulo_proyecto']."/cronograma";
            $GLOBALS['titulo']="Cronograma";
            require ('/../vistas/contenido/DetCronograma.php');
            break;
        
        case "resultados":
            $GLOBALS['ruta']=$_SESSION['titulo_proyecto']."/resultados";
            $GLOBALS['titulo']="Resultados";
            require ('/../vistas/contenido/DetResultados.php');
            break;
        
        case "impactos":
            $GLOBALS['ruta']=$_SESSION['titulo_proyecto']."/impactos";
            $GLOBALS['titulo']="Impactos";
            require ('/../vistas/contenido/DetImpactos.php');
            break;
    }
        
    


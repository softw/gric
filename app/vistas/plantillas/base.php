<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $GLOBALS['titulo'] ?></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/jquery-1.10.2.min.js"></script>
        <script src="js/main.js"></script>
</head>

<body>               
        
    
	<header>
            <?php if(isset($_SESSION['usuario'])): ?>
            <nav>
                <div class="opcionesUsuario">
                    <p><?php echo $_SESSION['usuario'] ?><a href="index.php?ctl=Inicio&salir=true">Cerrar sesión</a></p>		
                </div>	
            </nav>
            <?php endif ?>
            <div class="imgHeader">
                    <img id="headerlogosena" src="imagenes/headerlogosena.png" alt="logo del sena" />
            </div>
	</header>

	<nav>
            <?php if(isset($_SESSION['usuario'])):?>
            <div id="menuUsuario" class="menu">
                <a href="index.php">Inicio</a>
		<a href="index.php?ctl=Listado&buscar=t">Proyectos</a>
		<a href="index.php?ctl=Nuevo_proyecto">Nuevo proyecto</a>
		<a href="index.php?ctl=Perfil">Perfil</a>
            </div>
            <?php else:?>
            <div id="menuPagina" class="menu">
		<a href="index.php?ctl=Inicio">Inicio</a>
		<a href="index.php?ctl=About">Sobre nosotros</a>
		<a href="index.php?ctl=Listado&buscar=t">Proyectos</a>
		<a href="index.php?ctl=Login">Registrarse</a>
		<a href="index.php?ctl=Login">Iniciar sesión</a>
            </div>           
            <?php  endif ?>	
	</nav>
    
	<section>
            <p class="ruta"><?php echo $GLOBALS['ruta']; ?></p>
            <?php if(isset($_GET['ctl'])&&$_GET['ctl']=="Detalles"): ?>  
            <nav id="menuProyecto" class="menuVertical">
                <a href="index.php?ctl=Detalles&cat=generalidades&id=<?php echo $_SESSION['id_proyecto'] ?>">Generalidades</a>
                <a href="index.php?ctl=Detalles&cat=descripciones&id=<?php echo $_SESSION['id_proyecto'] ?>">Descripciones</a>
                <a href="index.php?ctl=Detalles&cat=personas&id=<?php echo $_SESSION['id_proyecto'] ?>">Personas</a>
                <a href="index.php?ctl=Detalles&cat=entidades&id=<?php echo $_SESSION['id_proyecto'] ?>">Entidades</a>
                <a href="index.php?ctl=Detalles&cat=presupuesto&id=<?php echo $_SESSION['id_proyecto'] ?>">Presupuesto</a>
                <a href="index.php?ctl=Detalles&cat=cronograma&id=<?php echo $_SESSION['id_proyecto'] ?>">Cronograma</a>
                <a href="index.php?ctl=Detalles&cat=resultados&id=<?php echo $_SESSION['id_proyecto'] ?>">Resultados</a>
                <a href="index.php?ctl=Detalles&cat=impactos&id=<?php echo $_SESSION['id_proyecto'] ?>">Impactos</a>        
            </nav>
            <div class="contenedorSecu">

		<?php echo $contenido ?>

            </div><!--contenedorSecu-->
            <?php else:
                     echo $contenido;
                endif ?>  
   
	</section>
    
	<footer>
            <div class="copyright">
		Todos los derechos reservados
            </div>
	</footer>
    </body>
</html>
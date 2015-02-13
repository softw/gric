 <?php ob_start() ;

 //...............contenedor principal................-->?>

<div class="contenedorCentral">
    
    <?php   if(isset($_SESSION['id_usuario'])):?>
    <article class="btn-toolbar">
        <a class=" btn-link" href="index.php?ctl=Listado&buscar=t">Todos los proyectos</a>
        <a class=" btn-link" href="index.php?ctl=Listado&buscar=m">Mis proyectos</a>
    </article>
    <?php endif;?>
    
    <?php foreach ($params['proyectos'] as $proyecto):?>
    <article class="proyecto">
        <div class="titulop">
            <h2><?php echo $proyecto['titulo'] ?></h2>
            <h3>
                <a href="index.php?ctl=Detalles&cat=generalidades&id=<?php echo $proyecto['id'] ?>">Descripción</a>
            </h3>
        </div>
        <div class="descripion">
            <p><?php echo $proyecto['descripcion']?></p>
        </div>
        <div class="datap">
            <p>Responsable: <?php echo $proyecto['id_usuario']  ?>  </p>
            <p>Fecha de publicación:  <?php echo $proyecto['fecha_publicacion']  ?>  </p>
        </div>
    </article>
    <?php endforeach;?> 			
			
</div><!--contenedorCentral-->
  
<?php $contenido = ob_get_clean();

    include '/../plantillas/base.php';





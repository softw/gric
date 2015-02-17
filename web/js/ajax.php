<?php

class Ajax{
    
    public $dbh = null;
    
    public function  ajax(){
       try {
 
            $this->dbh = new PDO('mysql:host=localhost;dbname=proyecto_monitorias_sena', 'root', 'root');
           
 
        } catch (PDOException $e) {
 
            print "Error!: " . $e->getMessage();
            die();
        }
   }
   
   public function cargar_datos($sql){
    try
        {
            
          $conexion=$this->dbh->prepare($sql);
          $conexion->execute();
         
            
            if($conexion->rowCount()>0)
            {
                while($datos = $conexion->fetch())
                {
                    $productos[]=$datos;
                }
                echo  json_encode($productos);
            }else
            {
                echo json_encode("mal");
            }
        } 
    catch (Exception $e)
        {
            echo json_encode($e);
        } 
       
   }
   
    
}

$objeto = new Ajax();

if(isset($_POST["id_producto"])){
    $id_resultado=$_POST['id_producto'];
     $sql = "SELECT * FROM productos WHERE id_resultado='$id_resultado'";
     $objeto->cargar_datos($sql);
     
}

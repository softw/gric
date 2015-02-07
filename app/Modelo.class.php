<?php

/* 
 *ALL RIGHTS RESERVED
 */

class Modelo
{
    
    private $tproyectos=array();
    private $mproyectos=array();
    private $generalidades=array();
    private $beneficiarios=array();

    /*#########################################
     * consultas en la base de datos  
     ########################################*/
    
    /*####################
   * SELECT
   */
    
    
    public static function email_existe($email)//verifica se existe el usuario en la bd
    {
          try {  
            
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM usuarios WHERE email ='$email' ";
            $query = $dbh->prepare($sql);        
            $query->execute();
            $dbh = null;
            //si existe el usuario
            if($query->rowCount() === 1):
                 return TRUE;
            else:
                return FALSE;
            endif;            
        }
        catch(PDOException $e){   
            print "Error!: " . $e->getMessage();  
        }             
    }
    
    public static function validar_titulo($titulo){
         try {  
            
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM proyecto_generalidades WHERE titulo ='$titulo' ";
            $query = $dbh->prepare($sql);        
            $query->execute();
            $dbh = null;
            //si existe el titulo
            if($query->rowCount() === 1):
                 return TRUE;
            else:
                return FALSE;
            endif;            
        }
        catch(PDOException $e){   
            print "Error!: " . $e->getMessage();  
        } 
    }
   
    

        //verifica si la contraseña coincide con el usuario en la bd e inicia la sesion si es verdadero
    public static function validar_password($email,$password)
    {
        try {  
            
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM usuarios WHERE email ='$email' AND password='$password' ";
            $query = $dbh->prepare($sql);        
            $query->execute();
            $dbh = null;
            //si existe el usuario
            if($query->rowCount() === 1):
                 $fila  = $query->fetch();
                 $_SESSION['usuario'] = $fila['email'];
                 $_SESSION['id_usuario']=$fila['id'];
                 return TRUE;
            else:
                return FALSE;
            endif;            
        }
        catch(PDOException $e){   
            print "Error!: " . $e->getMessage();  
        }   
        
    }//FIN VALIDARpassword()
    
 
   
    
     public function listarTProyectos()
    {
        try
        {   
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT id,id_usuario,titulo,descripcion,fecha_publicacion FROM proyecto_generalidades ORDER BY fecha_publicacion DESC";
            $query=$dbh->prepare($sql);
            
           // $query=$this->conexion->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg = $query->fetch())
                {
                    $this->tproyectos[]=$reg;
                }
                return $this->tproyectos;
            }
            
        } catch (Exception $e)
            {
                print "ERROR!: ".$e->getMessage();
            }
    }//fin listarTProyectos()
    
     public function listarMproyectos($id_usuario)
    {
        try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT id,id_usuario,titulo,descripcion,fecha_publicacion FROM proyecto_generalidades WHERE id_usuario=$id_usuario ORDER BY fecha_publicacion DESC";
            $query=$dbh->prepare($sql);
           // $query->bindParam('id',$_SESSION['id_usuario']);
            $query->execute();
            $dbh=null;
            
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $this->mproyectos[]=$reg;
                }
                return $this->mproyectos;
            }
            
       } catch (Exception $e)
            {
                print "ERROR!: ".$e->getMessage();
            }   
    }//fin listarMproyectos()
    
    
    
    public function listarGeneralidades($id_proyecto)
    {
        try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM proyecto_generalidades WHERE id= $id_proyecto ";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $this->generalidades[]=$reg;
                }
                return $this->generalidades;
            }
        } 
        catch (Exception $e)
        {
                print "ERROR!: ".$e->getMessage();
        }  
       
        
    }//fin listarGeneralidades()
    
     public function listarDescripciones($id_proyecto)
    {
        try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM proyecto_descripciones WHERE id_proyecto=$id_proyecto";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $this->descripciones[]=$reg;
                }
                return $this->descripciones;
            }
        } 
        catch (Exception $e)
        {
                print "ERROR!: ".$e->getMessage();
        }  
       
        
    }//fin listarGeneralidades()
    
    public function listarPersonas($id_proyecto)
    {
         try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM personas/proyecto WHERE id_proyecto=$id_proyecto";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $this->personas[]=$reg;
                }
                return $this->personas;
            }
        } 
        catch (Exception $e)
        {
                print "ERROR!: ".$e->getMessage();
        }  
        
    }//FIN LISTAR PERSONAS
    
    
    
    
     public function getBeneficiarios($id_proyecto)
    {
        try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM beneficiarios WHERE id_proyecto=$id_proyecto";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $this->beneficiarios[]=$reg;
                }
                return $this->beneficiarios;
            }
        } 
        catch (Exception $e)
        {
                print "ERROR!: ".$e->getMessage();
        }  
        
    }//fin getBeneficiarios
    
    /*#############################
     * UPDATE
     */
    
    public function update_generalidades($id_proyecto,$titulo,$convocatoria,$programa,$tipo_f,$duracion,$lugar,$ben_camp,$descripcion)
    {
         try
        {
            $conexion = Conexion::singleton_conexion();
            $sql="UPDATE proyecto_generalidades SET titulo='$titulo',descripcion='$descripcion',convocatoria='$convocatoria',programa='$programa',tipo_f='$tipo_f',duracion='$duracion',lugar='$lugar',ben_camp='$ben_camp'";
            $sql.= "WHERE id=$id_proyecto";            
            $query =$conexion->prepare($sql);
            $filasafectadas=$query->execute();
            $conexion= null;
            if($filasafectadas > 0):
               return true;            
            else : 
                return false;
            endif;    
        } 
        catch (Exception $e) 
        {
            print "Error!: " . $e->getMessage();
        }
        
    }//fin metodo update_generalidades
    
    public function updateProyectoDescripciones($clave,$valor,$id_proyecto)//$clave es el nombre del campo en la bd, valor es el nombre del input
    {
        try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="UPDATE proyecto_descripciones SET $clave='$valor'";
            $sql.= "WHERE id_proyecto=$id_proyecto";            
            $query =$conexion->prepare($sql);
            $filasafectadas=$query->execute();
            $conexion= null;
            if($filasafectadas > 0): return true;           
            else: return false;            endif;
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $ex->getMessage();
        }
        
    }
    
    
    
    /*###########################
    /INSERT
    */
    
    
    public static function insertarUsuario($email,$password)
    {
        try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "INSERT INTO usuarios(email,password) VALUES('$email','$password')";           
            $query =$dbh->prepare($sql);
            $filasafectadas=$query->execute();
            $dbh= null;
            if($filasafectadas>0)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $e)
        {
            print "Error!: " . $e->getMessage();
        }
  
    }//FIN INSERTARUSUARIO()
    
    
    
    public static function insertar_generalidades($id_usuario,$titulo,$convocatoria,$programa,$tipo_f,$duracion,$lugar,$ben_camp,$descripcion)
    {
        try
        {
            $conexion = Conexion::singleton_conexion();
            $sql="INSERT INTO proyecto_generalidades(id,id_usuario,titulo,descripcion,convocatoria,programa,tipo_f,duracion,lugar,ben_camp,fecha_publicacion)";
            $sql.= "VALUES (NULL,$id_usuario,'$titulo','$descripcion','$convocatoria','$programa','$tipo_f',$duracion,'$lugar','$ben_camp',CURRENT_TIMESTAMP)";            
            $query =$conexion->prepare($sql);
            $filasafectadas=$query->execute();
            $conexion= null;
            if($filasafectadas > 0):            
               return true;                       
            else :           
                return false;
            endif;
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $ex->getMessage();
        }
        
    }//fin insertarProyectoGeneralidades()
    
       public function agregarProyectoDescripciones($objGeneral,$id_proyecto)//$clave es el nombre del campo en la bd, valor es el nombre del input
    {
        try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="INSERT INTO proyecto_descripciones(id_proyecto, obj_general) VALUES($id_proyecto,'$objGeneral')";           
            $query =$conexion->prepare($sql);
            $filasafectadas=$query->execute();
            $conexion= null;
            if($filasafectadas > 0): return true;           
                else: return false;           
            endif;
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $ex->getMessage();
        }
        
    }
    
}

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
    
    public static function es_admin($id_proyecto, $id_usuario)
    {
        try {  
            
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT titulo FROM proyecto_generalidades WHERE id ='$id_proyecto' and id_usuario=$id_usuario ";
            $query = $dbh->prepare($sql);        
            $query->execute();
            $dbh = null;
            if($query->rowCount() === 1)
            {
                return TRUE;
            }   
            else
            {
                return FALSE;
            }
        }
        catch(PDOException $e){   
            print "Error!: " . $e->getMessage();  
        }   
        
    }
    
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
    
    
    
    public static function listar_generalidades($id_proyecto)
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
                    $generalidades[]=$reg;
                }
                return $generalidades;
            }
        } 
        catch (Exception $e)
        {
                print "ERROR!: ".$e->getMessage();
        }  
       
        
    }//fin listarGeneralidades()
    
     public static function listar_descripciones($id_proyecto)
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
                    $descripciones[]=$reg;
                }
                return $descripciones;
            }
            else{
                return FALSE;
            }
           
        } 
        catch (Exception $e)
        {
                print "ERROR!: ".$e->getMessage();
        }  
       
        
    }//fin listar_descripciones()
    
    public static function listar_personas($id_proyecto)
    {
         try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM personas WHERE id_proyecto=$id_proyecto";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $personas[]=$reg;
                }
                return $personas;
            }
            else 
            {
                return FALSE; 
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
    
  
    
     public static function actualizar_descripcion($clave,$valor,$id_proyecto)
    {
        try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="UPDATE proyecto_descripciones SET $clave = '$valor' WHERE id_proyecto = $id_proyecto";          
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
    
    
    
    /*###########################
    /INSERT
    */
    
    
    public static function insertar_usuario($email,$password)
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
             
            if($filasafectadas > 0)
            {
                $sql="SELECT id from proyecto_generalidades order by id DESC LIMIT 1";
                $query = $conexion->prepare($sql);
                $query->execute();
                $dbh=null;
                 while($reg =$query->fetch())
                {
                    $ultimo_id[]=$reg;
                }
                $id=$ultimo_id[0];
                return $id;
               
            }else
            {
                $conexion= null;
                return FALSE;
            }
           
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
    
    public static function insertar_descripcion($clave,$valor,$id_proyecto)
    {
        try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="INSERT INTO proyecto_descripciones(id_proyecto, $clave) VALUES ($id_proyecto,'$valor')";           
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
    
    public static function insertar_persona($id_proyecto,$direccion,$ciudad,$telefono,$cargo,$dependencia,$entidad,$rol,$dedicacion,$pApellido,$sApellido,$nombres,$sexo,$fechaNa,$paisNa,$tipoId,$numeroId,$email,$respon,$titulos,$expEmpresarial,$expDocente,$resumen,$referencias)
    {
         try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="INSERT INTO personas(id_proyecto,rol_proyecto,entidad,nombres,primer_apellido,segundo_apellido,genero,fecha_nacimiento,pais,email,tipo_identificacion,numero_identificacion,responsabilidades,dedicacion_horas,titulos_certificaciones,experiencia_empresarial,experiencia_docente,resumen_hoja_vida,referencias,direccion_oficina,telefono,cargo,dependencia,ciudad_labora)";           
            $sql.="VALUES ($id_proyecto,$rol,$entidad,$nombres,$pApellido,$sApellido,$sexo,$fechaNa,$paisNa,$email,$tipoId,$numeroId,$respon,$dedicacion,$titulos,$expEmpresarial,$expDocente,$resumen,$referencias,$direccion,$telefono,$cargo,$dependencia,$ciudad)";
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

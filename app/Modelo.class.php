<?php

/* 
 *ALL RIGHTS RESERVED
 */
/*indice
 * 
 */

class Modelo
{  
    /*####################
   * validaciones
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
        
    }
    
    /*#########################################################
     * Usuarios
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
  
    }
    
    
 
   
    /*###########################################################
     * listar proyectos
     */
    
     public static function listar_t_proyectos()
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
                    $tproyectos[]=$reg;
                }
                return $tproyectos;
            }
            
        } catch (Exception $e)
            {
                print "ERROR!: ".$e->getMessage();
            }
    }
    
     public static function listar_m_proyectos($id_usuario)
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
                    $mproyectos[]=$reg;
                }
                return $mproyectos;
            }
            
       } catch (Exception $e)
            {
                print "ERROR!: ".$e->getMessage();
            }   
    }
    
    
   /*##############################################################
    * detalles generalidades
    */ 
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
        
    }
    
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
            
    }
    
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
    
    
    
    
    /*#####################################################
     * detalles descripciones
     */
    
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
            { while($reg =$query->fetch())
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
    
    
    /*##################################################
     * detalles personas
     */
    
    
   public static function insertar_persona_basico($id_proyecto,$rol,$entidad,$nombres,$pApellido,$sApellido,$sexo,$fechaNa,$paisNa,$email,$tipoId,$numeroId,$respon,$dedicacion)/*14 items*/
    {
        try{
            
            $conexion = Conexion::singleton_conexion();
            
          //INSERT INTO `personas`(`id`, `id_proyecto`, `rol_proyecto`, `entidad`, `nombres`, `primer_apellido`, `segundo_apellido`, `genero`, `fecha_nacimiento`, `pais`, `email`, `tipo_identificacion`, `numero_identificacion`, `responsabilidades`, `dedicacion_horas`, `titulos_certificaciones`, `experiencia_empresarial`, `experiencia_docente`, `resumen_hoja_vida`, `referencias`, `direccion_oficina`, `telefono`, `cargo`, `dependencia`, `ciudad_labora`)
           //       VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9],[value-10],[value-11],[value-12],[value-13],[value-14],[value-15],[value-16],[value-17],[value-18],[value-19],[value-20],[value-21],[value-22],[value-23],[value-24],[value-25])
            
            $sql="INSERT INTO personas(id,id_proyecto,rol_proyecto,entidad,nombres,primer_apellido,segundo_apellido,genero,fecha_nacimiento,pais,email,tipo_identificacion,numero_identificacion,responsabilidades,dedicacion_horas) VALUES (NULL,'$id_proyecto','$rol','$entidad','$nombres','$pApellido','$sApellido','$sexo','$fechaNa','$paisNa','$email','$tipoId','$numeroId','$respon','$dedicacion')";
            $query =$conexion->prepare($sql);
            $filasafectadas= $query->execute();
         
            if($filasafectadas > 0): return TRUE;           
              else: return FALSE;           
            endif;
        
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $ex->getMessage();
        } 
    }
    
    public static function insertar_persona_entidad()
    {
        
    }
    
    public static function insertar_persona_profesional()
    {
        
    }
    
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
    
    
    /*####################################################
     * detalles actividades
     */
    
    public static function listar_actividades($id_proyecto)
    {
        try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM actividades WHERE id_proyecto=$id_proyecto";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $actividades[]=$reg;
                }
                return $actividades;
            }else
            {
                return FALSE;
            }
        } 
        catch (Exception $e)
        {
            print "ERROR!: ".$e->getMessage();
        } 
        
    }
    
     public static function insertar_actividad($id_proyecto,$numero,$actividad,$fecha_inicio,$fecha_final,$duracion)
    {
        try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="INSERT INTO actividades (id,id_proyecto,numero,actividad,fecha_inicio,fecha_final,duracion) ";
            $sql.= "VALUES (NULL,$id_proyecto,'$numero','$actividad',$fecha_inicio,$fecha_final,$duracion)";           
            $query =$conexion->prepare($sql);
            $filasafectadas=$query->execute();
            $conexion= null;
            if($filasafectadas > 0): return TRUE;           
                else: return FALSE;           
            endif;
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $ex->getMessage();
        } 
        
    }
    
    
    /*##################################################
     * detalles resultados
     */
    
    public static function listar_resultados($id_proyecto)
    {
        try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM resultados WHERE id_proyecto=$id_proyecto";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $resultados[]=$reg;
                }
                return $resultados;
            }else
            {
                return FALSE;
            }
        } 
        catch (Exception $e)
        {
            print "ERROR!: ".$e->getMessage();
        } 
        
    }
    
    public static function insertar_resultador($id_proyecto,$numero,$resultado,$indicador,$fuente,$meta)
    {
         try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="INSERT INTO resultados (id,id_proyecto,numero,resultado,indicador,fuente,meta) ";
            $sql.= "VALUES (NULL,$id_proyecto,'$numero','$resultado','$indicador','$fuente','$meta')";           
            $query =$conexion->prepare($sql);
            $filasafectadas=$query->execute();
            $conexion= null;
            if($filasafectadas > 0): return TRUE;           
                else: return FALSE;           
            endif;
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $ex->getMessage();
        } 
        
    }
    
    /*##############################################
     * detalles resultados productos
     */
    public static function listar_productos($id_resultado)
    {
            try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM productos WHERE id_resultado=$id_resultado";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $productos[]=$reg;
                }
                return $productos;
            }else
            {
                return FALSE;
            }
        } 
        catch (Exception $e)
        {
            print "ERROR!: ".$e->getMessage();
        } 
        
    }
    
    public static function insertar_producto($id_resultado,$producto,$numero,$unidad,$duracion,$inicio,$final)
    {
         try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="INSERT INTO productos (id,id_resultado,producto,numero,unidad,duracion,inicio,final) ";
            $sql.= "VALUES (NULL,$id_resultado,'$producto','$numero','$unidad','$duracion','$inicio','$final')";           
            $query =$conexion->prepare($sql);
            $filasafectadas=$query->execute();
            $conexion= null;
            if($filasafectadas > 0): return TRUE;           
                else: return FALSE;           
            endif;
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $ex->getMessage();
        } 
        
    }


    /*##############################################
     * detalles beneficiarios
     */
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
 
    
   
    
    
    
     
    

    
   
    
    
    
    //######################### 
    // detalles impactos
    
    
    public static function insertar_impacto($id_proyecto,$configuracion,$descripcion,$ano_base,$medicion_base,$ano_medicion,$impacto,$variacion,$descriptivo,$supuestos)
    {
        try{
            
            $conexion = Conexion::singleton_conexion();
            $sql="INSERT INTO impactos (id_proyecto,configuracion,descripcion,ano_base,medicion_base,ano_medicion,impacto_esperado,variacion,descriptivo,supuestos) ";
            $sql.= "VALUES ($id_proyecto,'$configuracion','$descripcion',$ano_base,$medicion_base,$ano_medicion,$impacto,'$variacion','$descriptivo','$supuestos')";           
            $query =$conexion->prepare($sql);
            $filasafectadas=$query->execute();
            $conexion= null;
            if($filasafectadas > 0): return TRUE;           
                else: return FALSE;           
            endif;
        } 
        catch (Exception $ex) 
        {
            print "Error!: " . $ex->getMessage();
        } 
        
    }
    
     public static function listar_impactos($id_proyecto)
    {
        try
        {
            $dbh = Conexion::singleton_conexion();
            $sql = "SELECT * FROM impactos WHERE id_proyecto=$id_proyecto";
            $query=$dbh->prepare($sql);
            $query->execute();
            $dbh=null;
            if($query->rowCount()>0)
            {
                while($reg =$query->fetch())
                {
                    $impactos[]=$reg;
                }
                return $impactos;
            }else
            {
                return FALSE;
            }
        } 
        catch (Exception $e)
        {
            print "ERROR!: ".$e->getMessage();
        } 
        
    }
    
    public static function actualizar_impacto($id_proyecto,$id_impacto)
    {
        
    }
    
}

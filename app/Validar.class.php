<?php

class Validar
{   
    public static function is_email_sena($email)//valida que el email tenga el formato correcto
    {   
        if(filter_var($email, FILTER_VALIDATE_EMAIL)):
            $Sintaxis='#^[\w.-]+@misena.edu.co#';
            if(preg_match($Sintaxis,$email)):
             return TRUE;
            else:
                return FALSE;
            endif;
        else:
            return FALSE;
        endif;
    }
    
    public static function form_login($email)
    {  
        $resultado=array();
        $resultado['valido']=FALSE;
        $resultado['email']=self:: is_email_sena($email);
        if($resultado['email'])
        {
            $resultado['valido']=TRUE;
        }
         return $resultado;        
    }
  
    public static function form_nuevo_usuario($form_registro)
    {
        $resultado['valido']=FALSE;
        $resultado['nombre']= is_string($form_registro['nombre']);
        $resultado['pApellido']= is_string($form_registro['pApellido']);
        $resultado['sApellido']= is_string($form_registro['sApellido']);
        $resultado['numero']= is_numeric($form_registro['nDocumento']);
        $resultado['email']=self:: is_email_sena($form_registro['email']);
      
        if($resultado['nombre']&&$resultado['pApellido']&&
                $resultado['sApellido']&&$resultado['numero']&&$resultado['email']){
            $resultado['valido']=TRUE;
        } 
      
        return $resultado;    
    }
    
  
  
    
    public static function form_nuevo_proyecto($form_nuevo_proyecto){
        
        $resultado['valido']=FALSE;
        $resultado['titulo']= is_string($form_nuevo_proyecto['titulo']);
        $resultado['convocatoria']= is_string($form_nuevo_proyecto['convocatoria']);
        $resultado['programa']= is_string($form_nuevo_proyecto['programa']);
        $resultado['tipo']= is_string($form_nuevo_proyecto['tipo_f']);
        $resultado['duracion']= is_int($form_nuevo_proyecto['duracion']);
        $resultado['lugar']= is_string($form_nuevo_proyecto['lugar']);
        $resultado['descripcion']= is_string($form_nuevo_proyecto['descripcion']);
      
        if($resultado['titulo']&&$resultado['convocatoria']&& $resultado['programa']&&
                $resultado['tipo']&&$resultado['duracion']&&$resultado['lugar']&&$resultado['descripcion'])
        {
            $resultado['valido']=TRUE;
        } 
      
        return $resultado; 
    }
    
    public static function form_descripciones($id,$titulo)
    {
        $item=  htmlentities(addslashes($_POST["txa_".$id]));
         if(is_int($item))
         {
             Procesar::form_descripciones($id,$item);
         }
        else
        {
            header("location:index.php?ctl=Crear&cat=descripciones&id=$id&titulo=$titulo");
        }
    }
    
  
}



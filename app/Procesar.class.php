<?php

class Procesar
{
    public static function form_login()
    {

     $formulario_login=[];
     $formulario_login['valido']= FALSE;
     $formulario_login['email']= htmlentities(addslashes($_POST['txtEmail'])); 
     $formulario_login['password']= md5(sha1($_POST['txtPassword']));
     
     //validacion del formulario
     $formulario_login_validado=  Validar::form_login($formulario_login['email']);
        if($formulario_login_validado['valido'])
        {
            //comprobamos si existe el email ingresado en la bd
            if(Modelo::email_existe($formulario_login['email']))
                {
                  //comprobamos si el email coincide con el pass
                    if(Modelo::validar_password($formulario_login['email'],$formulario_login['password']))
                        {
                             //si todo esta en orden
                             $formulario_login['ctl']="Inicio";
                        }else{
                            //si el password no coincide
                            $formulario_login['ctl']="Login";
                            $formulario_login['password_incorrecto']="El password no coincide";
                        }
                
                    }else{
                            //el email no existe en la bd
                        $formulario_login['ctl']="Login";
                        $formulario_login['email_no_existe']="El email no existe en la base de datos";
                           
                        }        
        }else{
            //el email no corresponde con el formato requerido
            $formulario_login['ctl']="Login";
            $formulario_login['email_mal_formato']="Verifica tu email";
        }
        
    return $formulario_login;
    }//fin formulario login
    

    public static function form_nuevo_usuario()
    {
        $form_nuevo_usuario=[];
        $form_nuevo_usuario['nombre']=       htmlentities(addslashes($_POST['txtNombre']));
        $form_nuevo_usuario['pApellido']= htmlentities(addslashes($_POST['txtPapellido']));
        $form_nuevo_usuario['sApellido']=     htmlentities(addslashes($_POST['txtSapellido']));
        $form_nuevo_usuario['tDocumento']=         htmlentities(addslashes($_POST['selTd']));
        $form_nuevo_usuario['nDocumento']=     htmlentities(addslashes($_POST['txtNumero']));
        $form_nuevo_usuario['email']=        htmlentities(addslashes($_POST['txtEmail']));
        $form_nuevo_usuario['password']=    md5(sha1($_POST['txtPassword']));
       
       // $formulario_validado= Validar::form_nuevo_usuario($form_nuevo_usuario); validar despues 
        $formulario_validado['valido']=TRUE;
        if($formulario_validado['valido'])
        {
            //si todo el formulario es correcto
            if(Modelo::insertar_usuario($form_nuevo_usuario['email'], $form_nuevo_usuario['password']))
            {
                //si se inserta el nuevo registro en la bd
                $form_nuevo_usuario['ctl']="Login";
                $form_nuevo_usuario['msj']="Inicia sesion con tu nueva cuenta";
            }else
            {
                $form_nuevo_usuario['ctl']="Inicio";
                $form_nuevo_usuario['error_msj']="Error desconocido";
            }
             
        }else
        {
            //si hubieron errores en el formulario
            $form_nuevo_usuario['ctl']="Login";
            $form_nuevo_usuario['errores']=$formulario_validado;
            //los errores estan el el array $formulario_validado
        }
    
        return $form_nuevo_usuario;
    }//fin form_nuevo_usuario
    
    public static function form_nuevo_proyecto()
    {
        $form_nuevo_proyecto=[];
        $form_nuevo_proyecto['valido'] =FALSE;
        $form_nuevo_proyecto['titulo']=       htmlentities(addslashes($_POST['txtTitulo']));
        $form_nuevo_proyecto['convocatoria']= htmlentities(addslashes($_POST['txtConvocatoria']));
        $form_nuevo_proyecto['programa']=     htmlentities(addslashes($_POST['txtPrograma']));
        $form_nuevo_proyecto['tipo_f']=         htmlentities(addslashes($_POST['txtTipo']));
        $form_nuevo_proyecto['duracion']=     htmlentities(addslashes($_POST['txtDuracion']));
        $form_nuevo_proyecto['lugar']=        htmlentities(addslashes($_POST['txtLugar']));
        $form_nuevo_proyecto['ben_camp']=    htmlentities(addslashes($_POST['beneficia']));
        $form_nuevo_proyecto['descripcion']=       htmlentities(addslashes($_POST['txaDescripcion']));
        $form_nuevo_proyecto['id_usuario']= $_SESSION['id_usuario'];

        //la validacion para despues 
        // $formulario_valido= Validar::form_nuevo_proyecto($form_nuevo_proyecto);
        $formulario_valido['valido']= TRUE;

        if($formulario_valido['valido'])
        {
           $resultado=Modelo::insertar_generalidades($form_nuevo_proyecto['id_usuario'],$form_nuevo_proyecto['titulo'], $form_nuevo_proyecto['convocatoria'], $form_nuevo_proyecto['programa'], $form_nuevo_proyecto['tipo_f'], $form_nuevo_proyecto['duracion'], $form_nuevo_proyecto['lugar'], $form_nuevo_proyecto['ben_camp'], $form_nuevo_proyecto['descripcion']);
          if($resultado==FALSE)
           {//si no se inserto nada en la bd
               $form_nuevo_proyecto['error']="desconocido";             
           }else
           {//si se realiza la insercion en la bd
               $form_nuevo_proyecto['ctl']="Detalles";
               $form_nuevo_proyecto['id_proyecto']=$resultado;             
           }
            
        }else
        {//si el formulario tiene campos invalidos
            $form_nuevo_proyecto['ctl']="Nuevo_proyecto";
        }
        return $form_nuevo_proyecto;
    }//fin form_nuevo_proyecto
    
    public static function form_descripcion($clave)
    {
        //aqui estan todas las descripciones del proyecto
        $form_descripcion=[];
        $form_descripcion['valido'] =FALSE;
        $form_descripcion['clave']=$clave;
        $form_descripcion['valor']= htmlentities(addslashes($_POST['txtDescripcion']));

        //la validacion para despues 
        // $formulario_valido= Validar::form_nuevo_proyecto($form_nuevo_proyecto);
        $formulario_valido['valido']= TRUE;

        if($formulario_valido['valido'])
        {
            if($clave=="obj_general")
            {
                $resultado= Modelo::insertar_descripcion($clave, $form_descripcion['valor'], $_SESSION['id_proyecto']);
            }else
            {
                $resultado= Modelo:: actualizar_descripcion($clave, $form_descripcion['valor'], $_SESSION['id_proyecto']);
            }
          if($resultado==FALSE)
           {//si no se inserto nada en la bd
               $form_descripcion['error']="desconocido";             
           }else
           {//si se realiza la insercion en la bd
               $form_descripcion['ctl']="Detalles";
               $form_descripcion['cat']="descripciones";             
           }
            
        }else
        {//si el formulario tiene campos invalidos
            $form_descripcion['ctl']="Nuevo";
        }
        return $form_descripcion;
        
    }
    
    public static function form_persona_basico()
    {
        /*13 items*/
        $form_persona['entidad']=    htmlentities(addslashes($_POST['txtEntidad']));
        $form_persona['rol']=        htmlentities(addslashes($_POST['txtRol']));
        $form_persona['dedicacion']= htmlentities(addslashes($_POST['txtDedicacion']));
        $form_persona['pApellido']=  htmlentities(addslashes($_POST['txtPrimer']));
        $form_persona['sApellido']=     htmlentities(addslashes($_POST['txtSegundo']));
        $form_persona['nombres']=   htmlentities(addslashes($_POST['txtNombres']));
        $form_persona['sexo']=      htmlentities(addslashes($_POST['sexo']));
        $form_persona['fechaNa']=htmlentities(addslashes($_POST['dtFecha'])); 
        $form_persona['paisNa']=    htmlentities(addslashes($_POST['txtPais']));
        $form_persona['tipoId']=        htmlentities(addslashes($_POST['tipoId']));
        $form_persona['numeroId']= htmlentities(addslashes($_POST['txtNumero']));
        $form_persona['email']=   htmlentities(addslashes($_POST['email']));
        $form_persona['respon']=      htmlentities(addslashes($_POST['txaResponsabilidades']));
            
        //la validacion para despues 
        // $formulario_valido= Validar::form_persona($form_persona);
        $formulario_valido['valido']= TRUE;

        if($formulario_valido['valido'])
        {
           $resultado=Modelo::insertar_persona_basico($_SESSION['id_proyecto'], $form_persona['rol'], $form_persona['entidad'], $form_persona['nombres'],$form_persona['pApellido'], $form_persona['sApellido'], $form_persona['sexo'], $form_persona['fechaNa'],$form_persona['paisNa'], $form_persona['email'], $form_persona['tipoId'], $form_persona['numeroId'], $form_persona['respon'], $form_persona['dedicacion']);
            
          if($resultado==FALSE)
           {//si no se inserto nada en la bd
              
              $form_persona['ok']=FALSE;             
           }else
           {//si se realiza la insercion en la bd
               
               $form_persona['ok']=TRUE;             
           }
            
        }else
        {//si el formulario tiene campos invalidos
            $form_persona['ok']=FALSE;
        }
        return $form_persona;
             
    }//fin form_persona_basico################################################################
    
    public static function form_persona_entidad()
    {
        $form_persona=[];
        $form_persona['valido'] =FALSE;
        $form_persona['direccion']=  htmlentities(addslashes($_POST['txtDireccion']));
        $form_persona['ciudad']=     htmlentities(addslashes($_POST['txtCiudad']));
        $form_persona['telefono']=   htmlentities(addslashes($_POST['txtTelefono']));
        $form_persona['cargo']=      htmlentities(addslashes($_POST['txtCargo']));
        $form_persona['dependencia']=htmlentities(addslashes($_POST['txtDependencia']));
       $resultado=Modelo::insertar_persona_basico($_SESSION['id_proyecto'], $form_persona['direccion'], $form_persona['ciudad'], $form_persona['telefono'], $form_persona['cargo'], $form_persona['dependencia'], $form_persona['entidad'], $form_persona['rol'], $form_persona['dedicacion'], $form_persona['pApellido'], $form_persona['sApellido'], $form_persona['nombres'], $form_persona['sexo'], $form_persona['fechaNa'], $form_persona['paisNa'], $form_persona['tipoId'], $form_persona['numeroId'], $form_persona['email'], $form_persona['respon'], $form_persona['titulos'], $form_persona['expEmpresarial'], $form_persona['expDocente'], $form_persona['resumen'], $form_persona['referencias']);

    }
    
    public static function form_persona_profesional()
    {
        $form_persona['titulos']=htmlentities(addslashes($_POST['txaTitulos']));       
        $form_persona['expEmpresarial']=    htmlentities(addslashes($_POST['txaExpEmpresarial']));
        $form_persona['expDocente']=        htmlentities(addslashes($_POST['txaExpDocente']));
        $form_persona['resumen']= htmlentities(addslashes($_POST['txaResumen']));
        $form_persona['referencias']= htmlentities(addslashes($_POST['txaReferencias']));
        
    }
    
    public static function form_actividad()
    {
        $form_actividad=[];
        $form_actividad['valido'] =FALSE;
        $form_actividad['numero']=  htmlentities(addslashes($_POST['txtNumero']));
        $form_actividad['actividad']=     htmlentities(addslashes($_POST['txtActividad']));
        $form_actividad['fecha_inicio']=   htmlentities(addslashes($_POST['txtInicio']));
        $form_actividad['fecha_final']=      htmlentities(addslashes($_POST['txtFin']));
        $form_actividad['duracion']=htmlentities(addslashes($_POST['txtDuracion']));
        
        //aqui va la validacion
        
        $resultado= Modelo::insertar_actividad($_SESSION['id_proyecto'], $form_actividad['numero'], $form_actividad['actividad'], $form_actividad['fecha_inicio'],$form_actividad['fecha_final'], $form_actividad['duracion']);
         if($resultado==FALSE)
           {//si no se inserto nada en la bd
               $form_actividad['ok']=FALSE;             
           }else
           {//si se realiza la insercion en la bd
               $form_actividad['ok']=TRUE;             
           }
           return $form_actividad;
    }
    
    public static function form_resultado_resultado()
    {
        $form_resultador=[];
        $form_resultador['valido']   =FALSE;
        $form_resultador['numero']   =  htmlentities(addslashes($_POST['txtNumero']));
        $form_resultador['resultado']=  htmlentities(addslashes($_POST['txaResultado']));
        $form_resultador['indicador']=  htmlentities(addslashes($_POST['txaIndicador']));
        $form_resultador['fuente']   =  htmlentities(addslashes($_POST['txaFuente']));
        $form_resultador['meta']     =  htmlentities(addslashes($_POST['txaMeta']));
        
        //aqui va la validacion
        $resultado= Modelo::insertar_resultador($_SESSION['id_proyecto'], $form_resultador['numero'], $form_resultador['resultado'], $form_resultador['indicador'], $form_resultador['fuente'], $form_resultador['meta']);
        if($resultado)//si se realiza la insercion en la bd
        {
            $form_resultador['ok']=TRUE;             
        }else//si no se inserto nada en la bd
        {
            $form_resultador['ok']=FALSE;             
        }
           return $form_resultador;
        
    }
    
    public static function form_producto($id_resultado)
    {
        $form_producto=[];
        $form_producto['valido']   =FALSE;
        $form_producto['numero']   =  htmlentities(addslashes($_POST['numero']));
        $form_producto['producto']=  htmlentities(addslashes($_POST['txtProducto']));
        $form_producto['duracion']=  htmlentities(addslashes($_POST['txtDuracion']));
        $form_producto['unidad']   =  htmlentities(addslashes($_POST['unidad']));
        $form_producto['inicio']=  htmlentities(addslashes($_POST['fecha_inicio']));
        $form_producto['final']=  htmlentities(addslashes($_POST['fecha_final']));
        
        //aqui va la validacion
        $resultado = Modelo:: insertar_producto($id_resultado,$form_producto['producto'], $form_producto['numero'], $form_producto['unidad'], $form_producto['duracion'], $form_producto['inicio'], $form_producto['final']);
        if($resultado)//si se realiza la insercion en la bd
        {
            $form_producto['ok']=TRUE;             
        }else//si no se inserto nada en la bd
        {
            $form_producto['ok']=FALSE;             
        }
           return $form_producto;
        
    }
    
    public static function form_resultado_rubro()
    {
        $form_resultador=[];
        $form_resultador['valido']   =FALSE;
        $form_resultador['numero']   =  htmlentities(addslashes($_POST['txtNumero']));
        $form_resultador['resultado']=  htmlentities(addslashes($_POST['txaResultado']));
        $form_resultador['indicador']=  htmlentities(addslashes($_POST['txaIndicador']));
        $form_resultador['fuente']   =  htmlentities(addslashes($_POST['txaFuente']));
        $form_resultador['meta']     =  htmlentities(addslashes($_POST['txaMeta']));
        
        //aqui va la validacion
        $resultado= Modelo::insertar_resultador($_SESSION['id_proyecto'], $form_resultador['numero'], $form_resultador['resultado'], $form_resultador['indicador'], $form_resultador['fuente'], $form_resultador['meta']);
        if($resultado)//si se realiza la insercion en la bd
        {
            $form_resultador['ok']=TRUE;             
        }else//si no se inserto nada en la bd
        {
            $form_resultador['ok']=FALSE;             
        }
           return $form_resultador;
        
    }
    
    public static function form_impacto()
    {
        $form_impacto=[];
        $form_impacto['valido']   =FALSE;
        $form_impacto['configuracion']   =  htmlentities(addslashes($_POST['txtConfiguracion']));
        $form_impacto['descripcion']=  htmlentities(addslashes($_POST['txaDescripcion']));
        $form_impacto['ano_base']=  htmlentities(addslashes($_POST['txtAnoBase']));
        $form_impacto['medicion_base']   =  htmlentities(addslashes($_POST['txtMedicion']));
        $form_impacto['ano_medicion']     =  htmlentities(addslashes($_POST['txtAnoMedicion']));
        $form_impacto['impacto_esperado']=  htmlentities(addslashes($_POST['txtImpacto']));
        $form_impacto['variacion']=  htmlentities(addslashes($_POST['txtVariacion']));
        $form_impacto['descriptivo']   =  htmlentities(addslashes($_POST['txaDescriptivo']));
        $form_impacto['supuestos']     =  htmlentities(addslashes($_POST['txaSupuestos']));
        
        //aqui va la validacion
        $resultado = Modelo::insertar_impacto($_SESSION['id_proyecto'], $form_impacto['configuracion'], $form_impacto['descripcion'], $form_impacto['ano_base'], $form_impacto['medicion_base'], $form_impacto['ano_medicion'], $form_impacto['impacto'], $form_impacto['variacion'], $form_impacto['descriptivo'], $form_impacto['supuestos']);
        if($resultado)//si se realiza la insercion en la bd
        {
            $form_impacto['ok']=TRUE;             
        }else//si no se inserto nada en la bd
        {
            $form_impacto['ok']=FALSE;             
        }
        return $form_impacto;
        
    }
}




<?php

require '../model/login.class.php';
require '../model/cliente.class.php';
require '../model/usuario.class.php';
require '../model/mandato.class.php';
require '../model/libranza.class.php';
require '../model/lsc_libranza.class.php';


class mvc_controller {

 /* METODO QUE RECIBE LA ORDEN DE BUSQUEDA, PREPARA LOS DATOS Y SE COMUNICA
 CON EL MODELO PARA REALIZAR LA CONSULTA
 INPUT
 $carrera | nombre de la carrera a buscar
 $limit | cantidad de registros a mostrar
 OUTPUT
 HTML | el resultado obtenido del modelo es procesado y convertido en codigo html para que el VIEW pueda mostrarlo 
 */
    function loguear($usuario, $password)
   {
		$login = new login();
		//carga la plantilla 

		//realiza consulta al modelo
		 $query = $login->loguear($usuario,$password);
                 
                if( $query->num_rows > 0 ) // existe -> datos correctos
                {   
                    while( $row = mysqli_fetch_assoc($query) ){ 
                        
                        $_SESSION['inicio_sesion'] = 'iniciado';
                        $_SESSION['perfil']        = $row['Id_Perfil'];
                        $perfil = $row['Id_Perfil'];
                        $_SESSION['usuario']       = $usuario;   
                        $_SESSION['identificacion'] = $row['identificacion'];
                        $_SESSION['tipoIdentificacion'] = $row['TipoIdentificacion'];
                        $identifi = $row['identificacion'];
                        $tipoIden = $row['TipoIdentificacion'];
                    }
                    $login = new login();
                    $query3 = $login->infoUsuario($perfil, $tipoIden, $identifi);
                    
                    // INICIO Evalua si es la primera vez que el usuario igresa a la aplicacion
                    if( $query3->num_rows > 0 ) // existe -> datos correctos
                    {
                        while( $row2 = mysqli_fetch_assoc($query3) ){ 
                            $_SESSION['nombreUsuario'] = $row2['nombres'] . ' ' . $row2['apellidos'];   
                            $_SESSION['primera_vez'] = $row2['primer_ingreso'];
                        }
                        
                        if( $_SESSION['perfil'] == '3' && $_SESSION['primera_vez'] == '1' ){
                            header("location:reestablecerContrasena.php"); 
                        }
                        else{
                            $login = new login();
                            $query2 = $login->cargarMenuUsuario($_SESSION['perfil']); 
                    
                            if( $query2->num_rows > 0 ) // existe -> datos correctos
                            {
                                while( $fila = $query2->fetch_array() ){
                                    $filas[] = $fila; 
                                }
                                
                                // ESPACIO PARA ACTUALIZAR LA CANTIDAD DE INGRESOS A LA APP
                                
                                // FIN ESPACIO

                                $_SESSION['menu'] =  $filas;
                            }
                            header("location:inicio.php");  
                        }
                     } 
                    // FIN Evalua
                    $pagina = "logue";
                }else
                {
                    $pagina = "<h1>Usuario o contraseña inválidos</h1>"
                            . "<a href='javascript:window.close()'> Volver atrás </a> ";
                }
		$this->view_page($pagina);
   }
   
function getListaEstadoCivil()
{
    $cliente = new cliente(); 
    return $cliente->listaEstadoCivil();
}

function getTiposIdentificacion()
{
    $cliente = new cliente(); 
    return $cliente->tiposIdentificacion();
}

function getPerfiles()
{
    $usuario = new usuario(); 
    return $usuario->getPerfiles();
}
   
function getTiposIdentificacion1()
{
         $cliente = new cliente();
         //carga la plantilla 
         $error = "";
         //realiza consulta al modelo
          try{
          $query = $cliente->tiposIdentificacion();
          
         if( $query->num_rows > 0 ) // existe -> datos correctos
         {   
            while( $fila = $query->fetch_array() ){
                $filas[] = $fila; 
            }                     
            return $filas;
         }else
         {
             return '';
         }
         
         }catch(Exception $ex){
             $pagina = "<h1>No existen resultados</h1>";   
		$this->view_page($pagina);
   }
              
}

function getClientes( $tipoIdent, $ident, $nombre)
{
         $cliente = new cliente();
         //carga la plantilla 

         //realiza consulta al modelo
          return $cliente->clientes( $tipoIdent, $ident, $nombre );
}

function getLscLibranza($IdLibranza)
{
        $lscLibranza = new lsc_libranza();
        
        //realiza consulta al modelo
         return $lscLibranza->lscLibranzas( $IdLibranza );
}

function getMandatos( $tipoIdent, $ident)
{
         $mandato = new mandato();
         //carga la plantilla 

         //realiza consulta al modelo
          return $mandato->mandatos( $tipoIdent, $ident );
}

function  getCooperativa($tipoIdenCoop, $idenCoop){
    $cooperativa = new cooperativa();
    
    //realiza consulta al modelo
    return $cooperativa->cooperativas( $tipoIdenCoop, $idenCoop);
}

function getLibranzasXMandato( $mandato_id)
{
         $libranza = new libranza();
         //carga la plantilla 

         //realiza consulta al modelo
          return $libranza->libranzasXMandato( $mandato_id );
}

function getLibranzasXCliente( $tipoIdent, $ident)
{
         $libranza = new libranza();
         //carga la plantilla 

         //realiza consulta al modelo
          return $libranza->libranzasXCliente( $tipoIdent, $ident );
}

function getLibranzasAsociar( )
{
         $libranza = new libranza();
         //carga la plantilla 

         //realiza consulta al modelo
          return $libranza->libranzasAsociar();
}

function InsertarCliente($tipoIdent,$ident,$nombre,$apellidos,$fechaNacimiento,$telefono,$fechaExpeMan,$paisExped,$deptoExped,
        $ciudadExped,$genero,$paisNaci,$deptoNaci,$ciudadNaci,$nacionalidad,$sinoNaciona,$observNaciona,$sinoReside,
        $observReside,$estadoCivil,$nivelEduca,$observNivelEdu,$tipoVivien,$observTipoVivind,$ciudadReside,
        $direccionClie,$telefonoFijo,$celular,$email,$nombrsConyg,$apelldsConyg,$numIdentfcnConyg,$tipoIdentfcnConyg,
        $fijoConyg,$ocupcn,$observOcupcn,$tipoEmprs,$NitEmpre,$Sector,$Empresa,$TelEmpresa,$DirEmpresa,$CargoEmpresa,
        $SueldoActual,$tipoContr,$fechVincEmpr,$RecursPublc,$ObsRecuPubl,$VincRecursPublc,$DeclaraRenta,$SocioEmpre,
        $PorceSoci,$RegiTribu,$Monedaextra,$TipoOpeExtra,$OtraOperExtra,$IngreFijo,$IngreVari,$otroIngre1,
        $otroIngre2,$Hipoteca,$EgreCredi,$gastoFami,$otroEngre,$TotalEgr,$Vivienda,$Vehiculos,$Inver,$otroAct,
        $TotalAct,$PasHipo,$PasTc,$otrObli,$otroPas,$TotalPas)
{
    $cliente = new cliente();  
    
    $cliente->setTipoIdentificacion( $tipoIdent );
    $cliente->setIdentificacion( $ident );
    $cliente->setNombres( $nombre );
    $cliente->setApellidos( $apellidos );
    $cliente->setDireccion( $direccion );
    $cliente->setFechaNacimiento( $fechaNacimiento );
    $cliente->setCelular( $celular );
    $cliente->setEmail( $email );
    $cliente->setNacionalidad($nacionalidad);
    $cliente->setGenero($genero);
    $cliente->setCiudadResidencia($ciudadResidencia);
    $cliente->setEstadoCivil($estadoCivil);
    $cliente->setTelFijo($telefono);
            
    return $cliente->insertarCliente();
                      
}

function InsertarLscLibranza($idLibranza, $TipoIdenProv, $IdenProv, $NomDeuLib, $TipoIdenDeud, $IdenDeud, $VlrCuota, $NumCuoLib,  $VlrLibranza)
{
    $lsc_libranza = new lsc_libranza();  
    
    $lsc_libranza->setId_libranza($idLibranza );
    $lsc_libranza->setCliente_tipoIdentificacion($TipoIdenProv);
    $lsc_libranza->setCliente_identificacion($IdenProv);
    $lsc_libranza->setNombre_Deud_Libra( $NomDeuLib );
    $lsc_libranza->setTipo_iden_Deud( $TipoIdenDeud );
    $lsc_libranza->setNume_Iden_Deud( $IdenDeud );
    $lsc_libranza->setVlr_Cuot_Libra($VlrCuota);
    $lsc_libranza->setNro_Cuot_Libra( $NumCuoLib );
    $lsc_libranza->setVlr_Fin_Libra($VlrLibranza);
	
    return $lsc_libranza->insertarLscLibranza();
                      
}


function InsertarMandato($valorMandato, $tipoIdent, $Identifica )
{
    $mandato = new mandato();  
    
    $mandato->setTipoIdentificacion( $tipoIdent );
    $mandato->setVlrMandato( $valorMandato );
    $mandato->setIdentificacion( $Identifica );
    $mandato->setEstaMandato( '1' );
    
    return $mandato->insertarMandato();
                      
}

function InsertarCoop($tipoIDCoop, $idenCoop, $siglaCoop, $raznSoclCoop,$DirCoop,$paginaCoop,$telCoop,$NomReprLCoop,$tipoIdRepre,$numeIdenRepre,$celRepreCoop, $mailReprCoop)
{
    $coop = new cooperativa();  
    
    $coop->setTipoIDCoop($tipoIDCoop);
    $coop->setNumeIdenProv($idenCoop);
    $coop->setSiglaCoop($siglaCoop);
    $coop->setRaznSoclCoop($raznSoclCoop);
    $coop->setDirCoop($DirCoop);
    $coop->setPaginaCoop($paginaCoop);
    $coop->setTelCoop($telCoop);
    $coop->setNomReprLCoop($NomReprLCoop);
    $coop->setTipoIdRepre($tipoIdRepre);
    $coop->setNumeIdenRepre($numeIdenRepre);
    $coop->setCelRepreCoop($celRepreCoop);
    $coop->setMailReprCoop($mailReprCoop);
    
    
    return $coop->insertarCoop();
                      
}

function asociarLibranza( $mandato, $idLibranza, $tipoidCooper, $provedor ){
    $libranza = new libranza();
    //carga la plantilla 

    //realiza consulta al modelo
     return $libranza->asociarMandato( $mandato, $idLibranza ,$tipoidCooper,$provedor );
}

function desAsociarLibranza( $mandato, $idLibranza, $provedor ){
    $libranza = new libranza();
    //carga la plantilla 

    //realiza consulta al modelo
     return $libranza->desAsociarMandato( $mandato, $idLibranza, $provedor );
}

/* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
 INPUT
 $html | codigo html
 OUTPUT
 HTML | codigo html 
 */
 private function view_page($html)
 {
  echo $html;
 }

 function getInfoMandato( $idmandato )
{
    $mandato = new mandato();
    //carga la plantilla 

    //realiza consulta al modelo
     return $mandato->infoMandato( $idmandato );
}

function getInfoUsuario($tipoIdent, $identifica){
    $usuario = new usuario();
    return $usuario->getInfoUsuario($tipoIdent, $identifica);
}

function InsertarUsuario($tipoIdent,$ident,$nombre,$apellidos,$password, $perfil  )
{
    $usuario = new usuario();
    
    $usuario->setTipoIdentificacion( $tipoIdent );
    $usuario->setIdentificacion( $ident );
    $usuario->setNombres( $nombre );
    $usuario->setApellidos( $apellidos );
    $usuario->setPassword( $password );
    $usuario->setperfil( $perfil );
            
    return $usuario->insertarUsuario();
                      
}

 
}



?>

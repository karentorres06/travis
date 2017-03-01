<?php
session_start();
$rol = $_GET['rol'];
include_once('detalleCollector.php');
$DemoCollectorObj = new detalleCollector();
?>


<!doctype html>

	<head>
		<?php include_once('../../../css/fuente_google.html');?>

		
        <meta charset="utf-8">
		<title>Detalle de pedido </title>
		<link rel="stylesheet" type="text/css" href="../../../css/main.css">
        <link rel="stylesheet" type="text/css" href="../../../css/pedido.css">
        <meta charset="utf-8">
	<title>Menu</title>
    <link rel="stylesheet" href="../../../css/estilotabla.css">
    </head>
    

<body>
    <header>
        <h1>Administrador</h1>
        <div class="usuario">
        <?php
        
        
         $id =2;
         $rol = $_GET['rol'];
         echo "<p>Hola " . $_SESSION['torres'] . "</p>";
		    
        ?>
        </div>
     </header>
<body>
	<div class="contenedorPrincipal">
    <?php
		
		$fecha=date("Y/m/d");
		$mensaje='';

	
	
			$_SESSION['contador']=0;
			?>
       		
			<?php
			
			    extract($_POST);
				if(isset($_POST['agregar'])){//AGREGAR
                    $mensaje='';
                    if(!isset($_POST['id_plato']) || empty($_POST['id_plato'])){
                        $mensaje="<div class='error'>No existe referencia del producto seleccionado</div>";
                    }else{
                        if(isset($_POST['cantidad']) && !empty($_POST['cantidad'])){
                                if(!isset($_SESSION['carrito'])){
                                    $_SESSION['carrito']='';
									$_SESSION['noArticulos']='';
                                }
                                $idProducto=$_POST['id_plato'];
                                $cantidad=$_POST['cantidad'];
                              
                                                
                                
                                $producto=$DemoCollectorObj->consulta2($idProducto);
                                 $carrito=$_SESSION['carrito'];
                                

                                foreach ($producto as $c){
                                	$id =$c->getid_plato();
                                           
                                	 if(isset($carrito[$id])){
                                    if($carrito[$id]['id_plato']==$c->getid_plato()){
                                        $suma=$cantidad+$carrito[$id]['cantidad'];
                                        
                                        $carrito[$id]=array('id_plato'=>$c->getid_plato(),'nombre'=>$c->getdescripcion(),'Estado'=>$c->getestado(),'precio'=>$c->getprecio(),'cantidad'=>$suma,'totalVenta'=>$suma*$c->getprecio());
                                        $_SESSION['carrito']=$carrito;
									}else{
                                        $carrito[$id]=array('id_plato'=>$c->getid_plato(),'nombre'=>$c->getdescripcion(),'Estado'=>$c->getestado(),'precio'=>$c->getprecio(),'cantidad'=>$suma,'totalVenta'=>$suma*$c->getprecio());
                                        $_SESSION['carrito']=$carrito;
                                        
                                        $carrito[$id]=array('id_plato'=>$c->getid_plato(),'nombre'=>$c->getdescripcion(),'Estado'=>$c->getestado(),'precio'=>$c->getprecio(),'cantidad'=>$cantidad,'totalVenta'=>$cantidad*$c->getprecio());
                                        $_SESSION['carrito']=$carrito;
									}
                                }else{
                                	$carrito[$id]=array('id_plato'=>$c->getid_plato(),'nombre'=>$c->getdescripcion(),'Estado'=>$c->getestado(),'precio'=>$c->getprecio(),'cantidad'=>$cantidad,'totalVenta'=>$cantidad*$c->getprecio());
                                    $_SESSION['carrito']=$carrito;
								}
                                 }
                            	$_SESSION['noArticulos'] = $cantidad + $_SESSION['noArticulos'];
							}else{
                                $mensaje="<div class='error'>Inserte una cantidad</div>";
                            }
                    }//!isset($_POST[idProducto]) || empty($_POST[idProducto])
                }
				if(isset($_GET['borrarCarrito'])){//BORRAR CARRITO
					echo "entt";
                    if($_GET['id_plato']==''){
                        $mensaje="<div class='error'>Error al eliminar el producto del carrito</div>";
                    }else{
                        $idProducto=$_GET['id_plato'];
						$cantidad=$_SESSION['carrito'][$idProducto]['cantidad'];
						$_SESSION['noArticulos']=$_SESSION['noArticulos']-$cantidad;
						unset($_SESSION['carrito'][$idProducto]);
						header("location:detallepedido.php?verCarrito=true");
                    }
                }
			?>
            <div class="titulo centrar-div centrar-texto borde-10 border-box">	
            	<h1>Detalle de pedido  </h1>
        	</div>
            <div class="contenedorForms borde-10 centrar-div border-box">
                <form  action="<?php $_SERVER['PHP_SELF']?>" name="formBuscar" method="post" class="ventasFormBuscar alinear-horizontal letraTamaño-16">		
              
                    <input type="search" name="busqueda" id="busqueda" placeholder="Ingrese el nombre o codigo " class="inputBusqueda borde-5 letraTamaño-16 bordeGris1px">
                    <input type="submit" name="buscar" value="Buscar" class="boton inputBuscar borde-5 cursorPointer letra-negrita letraTama�o-16">
                </form>
                <a href='detallepedido.php?verCarrito=true' style="color:white">
                        
                            <?php
								if(isset($_SESSION['carrito']) && $_SESSION['carrito']!='' && !isset($_POST['registrarVenta'])){
									echo $_SESSION['noArticulos'];
									
									
								}else if(isset($_POST['registrarVenta'])){
									echo "0";
								}else{
									echo "0";
								}
						    ?>
                       
                    </a>
                <form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="registrarVenta" id="registrarVenta" class="formRegistrarVenta alinear-horizontal">
                        <input type="submit" name="registrarVenta" id="registrarVenta"class='boton botonRegistrarVenta alinear-horizontal centrar-texto borde-5 letra-negrita cursorPointer letraTamaño-16' value="Registrar Pedido">
                </form>
                 <form action="readpedido.php?" method="post" name="updatepedido" id="updatepedido" class="formRegistrarVenta alinear-horizontal">
                        <input type="submit" name="updatepedido" id="updatepedido"class='boton botonRegistrarVenta alinear-horizontal centrar-texto borde-5 letra-negrita cursorPointer letraTamaño-16' value="Update Pedido">
                      
                </form>
			</div><!--contenedorForms-->
            <div class="centrar-texto centrar-div">
            	<a href="../../../pages/admin.php?rol=$rol" style="color:blue">Menu principal</a> ||  
           
            	<a href='logout.php' style="color:blue">Salir</a>
            </div>
			<div class="contenedorTablaResultados centrar-div">
				<?php
			
				var_dump ($_GET['verCarrito']);
			
                if(isset($_GET['verCarrito']) && !isset($_POST['buscar']) && !isset($_POST['registrarVenta'])){//VER CARRITO
                    if(!isset($_SESSION['carrito'])){
                        $_SESSION['carrito']='';
                    }
                    
                    $carrito=$_SESSION['carrito'];
					
                    if($_SESSION['carrito']!='' && $noCarrito!=0){
                        ?>	
                        <div class="tituloCarrito">Detalle de pedido</div>
                        <table class="tabla centrar-texto">
                            <tr><th>Nombre</th><th>Codigo</th><th>Precio</th><th>Cantidad</th><th>Total</th><th>Borrar</th></tr>
                            <?php
                            $total=0;
                                foreach($carrito as $key => $value){
                                    echo"<tr>
											<td>$value[nombre]</td>
											<td>$value[id_plato]</td>
											<td>$$value[precio]</td>
											<td>$value[cantidad]</td>
											<td>$".$value['precio']*$value['cantidad']."</td>
											<td><a href='detallepedido.php? borrarCarrito=true & id_plato=$value[id_plato]'>Borrar</a></td>
										</tr>";
                                    $total=$total+($value['precio']*$value['cantidad']);
                                }
                            ?>
                        </table><!--tabla carrito-->
                        <?php
                        echo"Total:<strong>$".$total."</strong>";
                    }else{
                        $mensaje="<div class='mensaje'>Su carrito esta vacio</div>";
                    }
                }
                
                include_once('detalleCollector.php');
                $DemoCollectorObj = new detalleCollector();
                var_dump(isset($_POST['buscar']));
                if(isset($_POST['buscar'])){//BUSCAR
                	echo "entro a buscar";
                    $mensaje='';
                    extract($_POST);
                    
                    var_dump ($busqueda);
                    if($busqueda==''){
                    	echo "no entro ";
                        $mensaje="<div class='error'>No ha ingresado su busqueda</div>";
                    }else{
                    	//$busqueda=limpiar($con,$busqueda);
                    	echo " entro a buscarggggg ";
                        $buscar=$DemoCollectorObj->consulta($busqueda);
                        echo " paso ";
                        var_dump($buscar);
                        //var_dump($buscar);
                        $num=count($buscar);
                        var_dump($num);
                        //$num=mysqli_num_rows($buscar);
                        if($num==1){
                        	echo "no encontro busqueda" ;
                        	var_dump($buscar);
                            $mensaje="<div class='error'>No se encontro busqueda relacionada</div>";
                        }else{
                        	echo "entro a buscar la tabla" ;
                ?>          
                            <table class="tabla centrar-texto">
                                <tr>
                                    <th>id_plato</th>
                                   <th>descripcion</th>
                                   <th>estado</th>
                                   <th>precio</th>
                                   <th>Imagen</th>
                                    <th>cantidad</th>
                                    <th>agregar</th>
                               </tr>
                                
                                
                              
                <?php             
                          foreach ($buscar as $c){
                                        echo "<tr>
                                                <td>".$c->getid_plato()."</td>
                                                <td>".$c->getdescripcion() ."</td>
                                                <td>". $c->getestado() ."</td>
                                                <td>$".$c->getprecio()."</td>
				                                <td>$".$c->getprecio()."</td>
				                                <td><input type='image' name='tipo_plato' src=". $c->gettipo_plato()." /></td>;
	    
                                                <td>";
                                        
                                        
                                     
                                        
                                                ?>
                                                    <form action="<?php $_SERVER['PHP_SELF']?>" method='post' name='agregar' id='agregar'>
                                                        <input type='number' name='cantidad' id='cantidad'>
                                               
                                                        <input type='submit' name='agregar' class='agregar cursorPointer borde-5 centrar-div letra-negrita' value='Agregar'>
                                                        <input type='hidden' name='id_plato' value='<?php echo $c->getid_plato();?>'>
                                                    </form>
                                                <?Php
                                          echo"</td>
                                            </tr>";
                                    }
                ?>
                            </table>
                <?php
                        }//if msqli_num_rows
                    }//if $busqueda==''
                }
				?>
            </div><!--contenedorTablaResultados-->  
            <?Php
			if(isset($_POST['registrarVenta'])){//REGISTRAR VENTAS
                    if(isset($_SESSION['carrito']) && $_SESSION['carrito']!=''){
                        $carrito=$_SESSION['carrito'];
                        foreach($carrito as $key=>$value){
                        	
                        	//var_dump ($value);
                        	
                        	$id_plato = $value['id_plato'];
                        	$nombre = $value['nombre'];
                        	$cantidad = $value['cantidad'];
                        	$precio = $value['precio'];
                        	
                        	$totalVenta = $value['totalVenta'];
                        	
                        
                        	try {
                        		$DemoCollectorObj->createpedido($id_plato,$id_plato,$nombre,$cantidad,$precio,$totalVenta);
                        		$venta = true;
                        	}catch (Exception $e){
                        		$error="<div class='error'>Error al registrar la pedido</div>";
                        		$error = $e->getMessage();
                        		echo $error;
                        	}
                        	
                        	                     
                          
                            
							
						}
                        if($venta){
							$mensaje="<div class='correcto'>Pedido registrado registrada con exito</div>";
							?>
                            <div class="ticket centrar-div">
                            	<table>
                                	<tr><td>Catering Pedidos</td></tr>
                                	<tr><td>Usuario:<?php echo "gabtmora"?></td>
                                	<td></td><td>Fecha:<?php echo $fecha;?></td></tr>
                                    <tr><td>CANT</td><td>Plato</td><td>Total</td></tr>
                                    <?php 
										$totalVenta=0;
										foreach($carrito as $key=>$value){
											echo '<tr><td>'.$value['cantidad'].'</td><td>'.$value['nombre'].'</td><td>$'.$value['totalVenta'].'</td>';
											$totalVenta=$totalVenta+$value['totalVenta'];
										}
										echo"<tr><td>Total:$$totalVenta</td></tr>";
									?>
                                </table>
                            </div>
                            <?Php
							unset($_SESSION['carrito']);
							unset($_SESSION['noArticulos']);
                        }else{
                            $mensaje="<div class='error'>Error al registrar al realizar el pedido </div>";
                        }//if $venta
                    }else{
						$mensaje="<div class='mensaje'>No tiene articulos en su Pedido</div>";
					}
                }
		?>  
            <div class="mensajes centrar-div"><?php echo $mensaje;?></div>
		
	</div>
</body>
</html>
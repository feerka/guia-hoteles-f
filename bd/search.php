<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD con PHP usando Programación Orientada a Objetos</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Clientes</b></h2></div>
                    <div class="col-sm-4">
                    <a href="index.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
                <div class="row">
                
<form method="POST" action="search.php" method="post" onSubmit="return validarForm(this)">
 
 <input type="text" placeholder="Buscar usuario"  name="palabra" id ="s">

 <input type="submit" value="Buscar" name="buscar">

</form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
						<th>E-mail</th>
                        <th>Acciones</th>
                    </tr>
                </thead>


                <?php 
                
         
				include ('database.php');
                $clientes = new Database();
                $palabra = $_POST['palabra'];
              
				$listado=$clientes->search($palabra);
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
						$id=$row->id;
						$nombres=$row->nombres." ".$row->apellidos;
						$telefono=$row->telefono;
						$direccion=$row->direccion;
						$email=$row->correo_electronico;
				?>
					<tr>
                        <td><?php echo $nombres;?></td>
                        <td><?php echo $telefono;?></td>
                        <td><?php echo $direccion;?></td>
						<td><?php echo $email;?></td>
                        <td>
						    <a href="update.php?id=<?php echo $id;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="delete.php?id=<?php echo $id;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
					}
				?>


                
                    
                    
                          
                </tbody>
            </table>
        </div>
    </div>   
    <script type="text/javascript">
    function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
            formulario.palabra.focus();  // Damos el foco al control
            alert('Debes rellenar este campo'); //Mostramos el mensaje
            return false; 
         } //devolvemos el foco  
         return true; //Si ha llegado hasta aquí, es que todo es correcto 
     }   
</script>  
</body>
</html>                      
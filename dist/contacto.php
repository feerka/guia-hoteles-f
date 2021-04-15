<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="dist/index.css">

	<title>Guia Hoteles</title>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">Hoteles</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toogle navigation"> 
			<span class="navbar-toggler-icon"></span>

		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="navbar-item"><a class="nav-link" href="./index.html">Home</a></li>
				<li class="navbar-item"><a class="nav-link" href="./about.html">Nosotros</a></li>
				<li class="navbar-item"><a class="nav-link" href="./precios.html">Precios</a></li>
				<li class="navbar-item"><a class="nav-link" href="#">Terminos y condiciones</a></li>
				<li class="navbar-item active"><a class="nav-link" href="#">Contacto</a></li>
			</ul>
		</div>
	</nav>
	<div class = "jumbotron"> 
		<h1>Hoteles</h1></div>


	<div class="container">
		<div class="table-wrapper"></div>
			<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="./index.html">Home</a> </li>
				<li class="breadcrumb-item"><a href="./about.html">Nosotros</a> </li>
				<li class="breadcrumb-item active" aria-current="page">Contacto</li>
			</ol>
			</nav>

		<?php 
		include ("database.php");
		$clientes= new Database();
		$comentarios= new Database();
		if(isset($_POST) && !empty($_POST)){
			$id = $clientes->sanitize($_POST['id']);

			$nombres = $clientes->sanitize($_POST['nombres']);
			$apellidos = $clientes->sanitize($_POST['apellidos']);
			
			$direccion = $clientes->sanitize($_POST['direccion']);
			$provincia = $clientes->sanitize($_POST['provincia']);
			$correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
			$id = $comentarios->sanitize($_POST['id']);

			$comentario = $comentarios->sanitize($_POST['comentario']);
			$res = $clientes->createClien($id, $nombres, $apellidos, $direccion,$provincia, $correo_electronico);
			$res = $comentarios->createCom($comentario,$id);
			if($res){
				$message= "Datos insertados con éxito";
				$class="alert alert-success";
			}else{
				$message="No se pudieron insertar los datos";
				$class="alert alert-danger";
			}
		
			?>
			<div class="<?php echo $class?>"><
		  <?php echo $message;?>
		
			</div>	
			<?php
				
		}
	?>
		<h1>Dejame tu comentario</h1>
		<div class="table-wrapper">
		<form method="post">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>ID:</label>
					<input type="text" name="id" id="id" class='form-control' maxlength="10" required >
				</div>
				<div class="form-group col-sm-6">
					<label for="nombre">Nombre</label>
					<input type="text" class="form-control" name="nombres" id="nombre" placeholder="Ingrese su nombre">

			</div>
			<div class="form-group col-sm-6">
                   <label for="apellido">Apellido</label>
					<input type="text" class="form-control" name="apellidos" id="apellido" placeholder="Ingrese su apellido">
			</div>
			</div>
			<div class="form-group">
                   <label for="email">Email</label>
					<input type="email" name="correo_electronico" class="form-control" id="email" placeholder="Ingrese su email">
			</div>
			<div class="form-row">
				<div class="form-group col-sm-9">
					<label for="domicilio">Domicilio</label>
					<input type="text" class="form-control" name="direccion" id="domicilio" placeholder="Ingrese su domicilio">

			</div>
			<div class="form-group col-sm-3">
                   <label for="prov">Provincia</label>
					<select id="prov" class="form-control" name = "provincia">
						<option selected>Capital Federal</option>
						<option>Buenos Aires</option>
						<option>Cordoba</option>
						<option>Santa Fe</option>
						<option>Mendoza</option>
					</select>
			</div>
			</div>
			<div class="form-group">
				<label for="comentario">Comentario</label>
				<textarea class="form-control" name="comentario" id="comentario" rows="10"></textarea>
			</div>
			<div class="form-group">
				<div class="form-check">
					<input class="form-check-input" type="checkbox" id="gridcheck">
					<label class="form-check-label" for="gridcheck">Quiero que se contacten</label>
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Enviar</button>

		</form>

	</div>
</div>
<footer>
	<div class="row">
		<div class="col-sm-4 d-flex flex-column">
			<a href="https://www.facebook.com/">Facebook</a>
			<a href="https://www.Instagram.com/">Instagram</a>
			<a href="https://www.Twitter.com/">Twitter</a>
			<a href="https://www.google.com">Google</a>
		</div>
		<div class="col-sm-4">
			<address>
				<h3>Oficina central</h3>
				<p><span class="oi oi-home footer-adress-icon"></span>Tucuman 834, CABA, Argentina  </p>
				<p><span class="oi oi-phone footer-adress-icon"></span>+54911123456</p>
				<p><span class="oi oi-inbox footer-adress-icon"></span>contacto@guiahoteles.com</p>
			</address>
		</div>
		<div class="col-sm-4 d-flex flex-column align-items-end">
			<a href="https://www.facebook.com/">Nosotros </a>
			<a href="https://www.Instagram.com/">Precios</a>
			<a href="https://www.Twitter.com/">Terminos y condiciones</a>
			<a href="https://www.google.com">Contacto</a>
		</div>
	</div>
</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- build:js js/index.js -->
			<script src="node_modules/jquery/dist/jquery.min.js"></script>
			<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
			<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
			<script src="js/index.js"></script>
			<!--enbuild-->
</body>
</html>
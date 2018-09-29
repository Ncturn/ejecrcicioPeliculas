<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	<title>Blog</title>
</head>
<body>
	<header>
		<div class="contenedor">
			<div class="logo izquierda">
				<p><a href="index.php">Movies Latino</a></p>
			</div>
			<div class="derecha">
				<form name="busqueda" class="buscar" action="#" method="GET" >
					<input type="text" name="busqueda" placeholder="Buscar">
					<button type="submit" class="icono fa fa-search"></button>
				</form>

				<nav class="menu">
					<ul>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="">Login</a></li>
						<li><a href="">Registro <i class="icono fa fa-envelope"></i></a></li>
																		
					</ul>
				</nav>
			</div>
		</div>
	</header>	
	<div class="contenedor" id="contenedor">
		@yield('content')
	</div>


<footer>
		<p class="copyright">Copyright 2015 - 2016 Manuel Morales</p>
</footer>
</body>
</html>
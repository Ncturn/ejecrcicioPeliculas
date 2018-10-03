//Ruta apuntar imagenes imagenes
var rutaImagenes ="http://localhost/IA/imagenes/";

//funcion para solicitar las peliculas ordenadas a la API
function getPeliculas(){

    fetch('http://localhost/apirest/Public/api/peliculas/orden')
    .then(datos=>datos.json())
    .then(datos=>{
        var resultado = document.getElementById('contenedor');
        resultado.innerHTML='';
        for(let dato of datos){
            resultado.innerHTML+=`
                <div class="post">
                    <article>
                        <div class="thumb">
                        <div class="info">
                            <h3>${dato.titulo}</h3>
                            <p class="fecha">${dato.fecha}<p>
                        </div>
                            <a href="single.php?id=${dato.id}">
                                <img class="desvanecer" src="${rutaImagenes}${dato.poster}" alt="">
                            </a>
                        </div>
                    </article>
                </div>
            `;
        }
    })
}

//Funcion para obtener peliculas del menu de administrador
function getPeliculasAdmin(){
    fetch('http://localhost/apirest/Public/api/peliculas/orden')
    .then(datos=>datos.json())
    .then(datos=>{
        var resultado = document.getElementById('panelControl');
        resultado.innerHTML='';
        for(let dato of datos){
            resultado.innerHTML+=`
            <div class="post edicion" >
			<article>
				<h2 class="titulo">${dato.id}.- ${dato.titulo}</h2>
				<a href="#">Editar</a>
				<a href="single.php?id=${dato.id}">ver</a>
				<a href="#">Borrar</a>
			</article>
		</div>
            `;
        }
    })
}

//funcion para obtener comentarios por pelicula de la API
function getComentarios(idPelicula){

    fetch('http://localhost/apirest/Public/api/usuarios/comentarios/'+idPelicula)
    .then(datos=>datos.json())
    .then(datos=>{
        var resultado = document.getElementById('comentarios');
        resultado.innerHTML='';
        if(datos.comentario != 'false')
        for(let dato of datos){
            resultado.innerHTML+=`
            <h3>${dato.nombre}</h3>
            <p>	${dato.comentario}</p><br/>
            `;
        }
        else
        resultado.innerHTML+=`
        <h3>0 Comentarios</h3>
        `;
    })
}

//funcion para obtener pelicula por su ID
function getPeliculaID(idPelicula){
    fetch('http://localhost/apirest/Public/api/peliculas/'+idPelicula)
    .then(datos=>datos.json())
    .then(datos=>{
        var resultado = document.getElementById('contenedor');
        resultado.innerHTML='';
        for(let dato of datos){
            resultado.innerHTML+=`
            <div class="post detalle">
                <article>
                    <h2 class="titulo">${dato.titulo}</h2>
                    <p class="fecha">${dato.fecha}</p>
                    <div class="thumb">
                            <img src="${rutaImagenes}${dato.poster}" alt="">
                    </div>
                    <p class="resena">Sinopsis<br/>${dato.sinopsis}
                    <br/><br/>Reseña<br/>${dato.resena}
                    </p>
                    
                </article>  
            </div>
            `;
        }
    })
}


//Funcion para validar usuario con la base de datos
function getUsuario(email,pass){
    var url = 'http://localhost/apirest/Public/api/usuarios/login';
    var data = {'correo': email, 'contrasena': pass};
    fetch(url, {
    method: 'POST', 
    body: JSON.stringify(data), 
    headers:{
        'Content-Type': 'application/json'
    }
    })
    .then(datos => datos.json())
    .then(datos=>{
        var resultado = document.getElementById('error');
        resultado.innerHTML='';
            if(datos.nombre == 'false'){
            resultado.innerHTML+=`<p >Correo o contraseña incorrectos</p>`;}
            else{
                crearSesion(datos);
            }
    })

    
}

//Funcion para registrar usuario
function postUsuario(nombre,correo,contrasena){
    var url = 'http://localhost/apirest/Public/api/usuarios/alta';
    var data = {'nombre': nombre, 'correo': correo,'contrasena': contrasena};
    fetch(url, {
    method: 'POST', 
    body: JSON.stringify(data), 
    headers:{
        'Content-Type': 'application/json'
    }
    })
    .then(datos => datos.json())
    .then(datos=>{
       
    })
    alert('Registro correcto');
}

//Funcion para capturar los datos del usuario y llamar funcion de registro
function enviarUsuario(){
    var formulario = document.getElementById('formUsuario');
    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        var datos = new FormData(formulario);
        document.forms['formUsuario'].submit();
        postUsuario(datos.get('nombre'),datos.get('correo'),datos.get('contrasena'));
    })
}

//Funcion para registrar comentario
function postComentario(idPelicula, nombre, comentario){
    var url = 'http://localhost/apirest/Public/api/usuarios/comentar';
    var data = {'idPelicula': idPelicula, 'nombre': nombre,'comentario': comentario};
    fetch(url, {
    method: 'POST', 
    body: JSON.stringify(data), 
    headers:{
        'Content-Type': 'application/json'
    }
    })
    .then(datos => datos.json())
    .then(datos=>{
        var resultado = document.getElementById('comentarios');
        resultado.innerHTML='';
            if(datos.comentario == 'false'){
            resultado.innerHTML+=`<p >Correo o contraseña incorrectos</p>`;}
    })

    location.reload(true);
    location.reload(true);
    location.reload(true);
}


//Funcion para capturar los datos del usuario y llamar la funcion de validacion
function login(){
    var formulario = document.getElementById('login');
    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        var datos = new FormData(formulario);
        getUsuario(datos.get('correo'),datos.get('pass'));
    })
}

//funcion para crear la sesion en php
function crearSesion(datos){
    
    for(let valor of datos){
        var nombre = valor.nombre;
    }
   document.getElementById('nombre').value = nombre;
   document.forms['login'].submit();

}

//Funcion para capturar los detos de un comentario y llamar la funcion de registro
function comentar(){
    var formulario = document.getElementById('formComentario');
    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        var datos = new FormData(formulario);
        postComentario(datos.get('id_pelicula'),datos.get('nombre'),datos.get('comentario'));
    })
}

//Funcion para capturar los datos de una nueva pelicula y llamar la funcion de registro
function enviarPelicula(){
    var formulario = document.getElementById('formPelicula');
    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        var datos = new FormData(formulario);
        document.forms['formPelicula'].submit();
        var nombreImagen = document.getElementById('imagen').files[0].name;
        postPelicula(datos.get('titulo'),datos.get('sinopsis'),nombreImagen,datos.get('resena'),datos.get('fecha'));
    })
}

//Funcion para registrar una nueva pelicula en la base de datos
function postPelicula(titulo,sinopsis,poster,resena,fecha){
    var url = 'http://localhost/apirest/Public/api/peliculas/alta';
    var data = {'titulo': titulo, 'sinopsis': sinopsis,'poster': poster,'resena': resena,'fecha': fecha};
    fetch(url, {
    method: 'POST', 
    body: JSON.stringify(data), 
    headers:{
        'Content-Type': 'application/json'
    }
    })
    .then(datos => datos.json())
    .then(datos=>{
        
    })
    alert('Reseña subida correctamente');
}

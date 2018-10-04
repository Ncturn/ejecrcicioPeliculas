//Ruta apuntar imagenes imagenes
var rutaImagenes ="http://localhost:8000/storage/";

//funcion para solicitar las peliculas ordenadas a la API
function getMovies(){
    fetch('http://localhost:8000/api/v1/movies')
    .then(datos=>datos.json())
    .then(datos=>{
        var resultado = document.getElementById('api');
        resultado.innerHTML='';
        for(let dato of datos.data){
            resultado.innerHTML+=`
                <div class="col-12 align-self-center col-lg-3 mb-4">
                    <h3>${dato.title}</h3>
                    <p class="fecha">${dato.date}<p>
                    <a href="/movies/${dato.id}">
                        <img class="img-thumbnail" src="${dato.poster}" alt="">
                    </a>
                </div>
            `;
        }
    })
}

//funcion para obtener pelicula por su ID
function getMovieById(){
    var url = window.location.href;
    url = url.substring(29,url.length);
    fetch('http://localhost:8000/api/v1/movies/'+url)
    .then(datos=>datos.json())
    .then(datos=>{
        var resultado = document.getElementById('movie');
        resultado.innerHTML='';
            resultado.innerHTML+=`
            <h1 class="col-12">Titulo: ${datos.title}</h1>
            <h3 class="col-12">Fecha de estreno: ${datos.date}</h3>
            <img class="col-6 img-thumbnail" src="${datos.poster}" alt="">
            <p class="col-6">Sinopsis:<br/> ${datos.synopsis} <br/><br/>
                Reseña:<br/> ${datos.review}
            </p>
            `;
        
    })

    fetch('http://localhost:8000/api/v1/comments/'+url)
    .then(datos=>datos.json())
    .then(datos=>{
        var resultado = document.getElementById('comments');
        resultado.innerHTML='';
        if(datos != 'false')
        for(let dato of datos){
            resultado.innerHTML+=`
            <h5 class="font-weight-bold col-10">${dato.user_id}</h5>
            <p class="text-muted text-right col-2">${dato.created_at}</p>
            <p class="text-justify col-12">&nbsp;  ${dato.comment}</p>
            <br/>
            <br/>
            `;
        }
        else
            resultado.innerHTML+=`
            <h3>0 Comentarios</h3>
            `;
        var admins = document.getElementById('admins');
        admins.innerHTML+=`
            <a href="/movies/form/edit/${url}" class="btn btn-primary mr-3">Editar</a>
            <a href="http://localhost:8000" class="btn btn-danger" onclick="deleteMovie()">Eliminar</a>
        `;
        
    })

    
}

//Eliminar pelicula
function deleteMovie() {
    var url = window.location.href;
    url = url.substring(29,url.length);
    fetch('http://localhost:8000/api/v1/movies/'+url,{
        method: 'DELETE',
        })
    .then(datos=>datos.json())
    .then(datos=>{})
    alert('Pelicula elimnada¡¡');
}

//funcion para traer datos al formulario de edicion
function patchForm() {
    var url = window.location.href;
    url = url.substring(39,url.length);
    fetch('http://localhost:8000/api/v1/movies/'+url)
    .then(datos=>datos.json())
    .then(datos=>{
        var resultado = document.getElementById('inputs');
        resultado.innerHTML='';
        resultado.innerHTML+=`
        <div class="form-group">
            <label for="title">Titulo:</label>
            <input type="text" class="form-control" name="title" placeholder="Ingresa Titulo" value="${datos.title}">
        </div>
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" class="form-control" name="date" value="${datos.date}">
        </div>
        <div class="form-group">
            <label for="synopsis">Sinopsis:</label>
            <input type="text" class="form-control" name="synopsis" placeholder="Ingresa Sinopsis" value="${datos.synopsis}">
        </div>
        <div class="form-group">
            <label for="review">Reseña: </label>
            <textarea name="review" class="form-control" rows="10" placeholder="Ingresa Reseña">${datos.review}</textarea>
        </div>
        <div class="form-group">
            <label for="poster">Poster: </label>
            <input type="file" class="form-control-file" name="poster" value="${datos.poster}" id="poster">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary m-auto">Enviar</button>
        </div>
        `;
        
    })
}

//funcion para enviar datos editados

function preparePatchMovie() {
    var formulario = document.getElementById('form_movie_patch');
    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        var datos = new FormData(formulario);
        document.forms['form_movie_patch'].submit();
        document.forms['form_movie_patch'].submit();
        // var nombreImagen = document.getElementById('poster');
        if (document.getElementById('poster').files.length == 0) {
            nombreImagen = "";
        }
        else
            nombreImagen = document.getElementById('poster').files[0].name;

        patchMovie(datos.get('title'),datos.get('synopsis'),nombreImagen,datos.get('review'),datos.get('date'));
    })
    
}

function patchMovie(title,synopsis,poster,review,date) {
    var url = 'http://localhost:8000/api/v1/movies';
    var data = {'title': title, 'synopsis': synopsis,'poster': poster,'review': review,'date': date};
    fetch(url, {
    method: 'PATCH', 
    body: JSON.stringify(data), 
    headers:{
        'Content-Type': 'application/json'
    }
    })
    .then(datos => datos.json())
    .then(datos=>{
        
    })
}

function prepareMovie(){
    var formulario = document.getElementById('form_movie_post');
    formulario.addEventListener('submit', function(e){
        e.preventDefault();
        var datos = new FormData(formulario);
        document.forms['form_movie_post'].submit();
        var nombreImagen = document.getElementById('poster').files[0].name;
        postMovie(datos.get('title'),datos.get('synopsis'),nombreImagen,datos.get('review'),datos.get('date'));
    })
}

function postMovie(title,synopsis,poster,review,date){
    var url = 'http://localhost:8000/api/v1/movies';
    var data = {'title': title, 'synopsis': synopsis,'poster': poster,'review': review,'date': date};
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
}

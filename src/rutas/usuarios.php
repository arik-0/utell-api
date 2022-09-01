<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;



/*

Método HTTP	Descripción
POST	Crea un recurso nuevo.
GET	Recupera un recurso.
PUT	Actualiza un recurso existente.
DELETE	Suprime un recurso.


*/


$app->get('/api/', function(Request $request, Response $response){
    echo("Bienvenido a la API");
}); 


// GET Todos los clientes 
$app->get('/api/usuarios', function(Request $request, Response $response){
  $sql = "SELECT * FROM usuarios";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $usuarios = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($usuarios);
    }else {
      echo json_encode("No existen clientes en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->get('/api/universidades', function(Request $request, Response $response){
  $sql = "SELECT * FROM universidades";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $universidades = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($universidades);
    }else {
      echo json_encode("No existen universidades en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->get('/api/carreras', function(Request $request, Response $response){
  $sql = "SELECT * FROM carreras";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $carreras = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($carreras);
    }else {
      echo json_encode("No existen carreras en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->get('/api/sedes', function(Request $request, Response $response){
  $sql = "SELECT * FROM sedes";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $sedes = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($sedes);
    }else {
      echo json_encode("No existen sedes en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->get('/api/consultas', function(Request $request, Response $response){
  $sql = "SELECT * FROM consultas";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $consultas = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($consultas);
    }else {
      echo json_encode("No existen consultas en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->get('/api/favoritos', function(Request $request, Response $response){
  $sql = "SELECT * FROM favoritos";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $favoritos = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($favoritos);
    }else {
      echo json_encode("No existen consultas en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

$app->get('/api/paises', function(Request $request, Response $response){
  $sql = "SELECT * FROM paises";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $paises = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($paises);
    }else {
      echo json_encode("No existen consultas en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

$app->get('/api/provincias', function(Request $request, Response $response){
  $sql = "SELECT * FROM provincias";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $provincias = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($provincias);
    }else {
      echo json_encode("No existen consultas en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

$app->get('/api/ciudades', function(Request $request, Response $response){
  $sql = "SELECT * FROM ciudades";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $ciudades = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($ciudades);
    }else {
      echo json_encode("No existen consultas en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

$app->get('/api/mensajedirecto', function(Request $request, Response $response){
  $sql = "SELECT * FROM mensajedirecto";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
      $mensajedirecto = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($mensajedirecto);
    }else {
      echo json_encode("No existen consultas en la BBDD.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});

// GET Recueperar cliente por ID 
$app->get('/api/usuarios/{id}', function(Request $request, Response $response){
  // ok postman
  $id = $request->getAttribute('id');
  $sql = "SELECT * FROM usuarios WHERE idUsuario = $id";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql); 

    if ($resultado->rowCount() > 0){
      $usuario = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($usuario);
    }else {
      echo json_encode("No existen usuarios en la BBDD con este ID.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 


// POST Crear nuevo cliente 
$app->post('/api/usuarios/nuevo', function(Request $request, Response $response){
  // ok con postman
   $nombre = $request->getParam('nombre');
   $apellido = $request->getParam('apellido');
   $fNac = $request->getParam('fNac');
   $email = $request->getParam('email');
   $password = $request->getParam('password');
   $fotoPerfil = $request->getParam('fotoPerfil'); 
   $celular = $request->getParam('celular');
   $tipoPerfil = $request->getParam('tipoPerfil');
   $descripcion = $request->getParam('descripcion');
   $trayectoria = $request->getParam('trayectoria');
   $idCiudad = $request->getParam('idCiudad');     
  
  $sql = "INSERT INTO usuarios (nombre, apellido, fNac, email, password, fotoPerfil, celular, tipoPerfil, descripcion, trayectoria, idCiudad) VALUES 
          (:nombre, :apellido, :fNac, :email, :password, :fotoPerfil, :celular, :tipoPerfil, :descripcion, :trayectoria, :idCiudad)";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':apellido', $apellido);
    $resultado->bindParam(':fNac', $fNac);
    $resultado->bindParam(':email', $email);
    $resultado->bindParam(':password', $password);
    $resultado->bindParam(':fotoPerfil', $fotoPerfil);
    $resultado->bindParam(':celular', $celular);
    $resultado->bindParam(':tipoPerfil', $tipoPerfil);
    $resultado->bindParam(':descripcion', $descripcion);
    $resultado->bindParam(':trayectoria', $trayectoria);
    $resultado->bindParam(':idCiudad', $idCiudad);
    $resultado->execute();
    echo json_encode("Nuevo usuario guardado.");  

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 



// PUT Modificar cliente 
$app->put('/api/usuarios/modificar/{id}', function(Request $request, Response $response){

  $id = $request->getAttribute('id');

  $nombre = $request->getParam('nombre');
  $apellido = $request->getParam('apellido');
  $fNac = $request->getParam('fNac');
  $email = $request->getParam('email');
  $password = $request->getParam('password');
  $fotoPerfil = $request->getParam('fotoPerfil'); 
  $celular = $request->getParam('celular');
  $tipoPerfil = $request->getParam('tipoPerfil');
  $descripcion = $request->getParam('descripcion');
  $trayectoria = $request->getParam('trayectoria');
  $idCiudad = $request->getParam('idCiudad');     
  
  $sql = "UPDATE usuarios SET
          nombre = :nombre,
          apellido = :apellido,
          fNac = :fNac,
          email = :email,
          password = :password,
          fotoPerfil = :fotoPerfil,
          celular = :celular,
          tipoPerfil = :tipoPerfil,
          descripcion = :descripcion,
          trayectoria = :trayectoria,
          idCiudad = :idCiudad
        WHERE idUsuario = $id";
     
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':apellido', $apellido);
    $resultado->bindParam(':fNac', $fNac);
    $resultado->bindParam(':email', $email);
    $resultado->bindParam(':password', $password);
    $resultado->bindParam(':fotoPerfil', $fotoPerfil);
    $resultado->bindParam(':celular', $celular);
    $resultado->bindParam(':tipoPerfil', $tipoPerfil);
    $resultado->bindParam(':descripcion', $descripcion);
    $resultado->bindParam(':trayectoria', $trayectoria);
    $resultado->bindParam(':idCiudad', $idCiudad);

    $resultado->execute();
    echo json_encode("Usuario modificado.");  

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

//modificar contra xd 
// Hola arik del futuro
// no pienses en ella crack 
//todo va a estar bien
$app->put('/api/usuarios/modificarPass', function(Request $request, Response $response){

  $email = $request->getAttribute('email');
  $oldPassword = $request->getAttribute('oldPassword');
  $password = $request->getParam('password');
    
  
  $sql = "SELECT id from usuarios WHERE

          email = '$email' AND password='$oldPassword'

        ";



     
  try{
    $db = new db();
    $db = $db->conectDB();


    $resultado = $db->query($sql);

    if ($resultado->rowCount() > 0){
        $sql = "UPDATE usuarios SET
        password = :password,
      WHERE email = $email";
    }



    $resultado = $db->prepare($sql);

 
    $resultado->bindParam(':password', $password);


    $resultado->execute();
    echo json_encode("Contraseña modificada.");  

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// DELETE borar cliente 
$app->delete('/api/usuarios/delete/{id}', function(Request $request, Response $response){
   $id_Usuario = $request->getAttribute('id');
   $sql = "DELETE FROM usuarios WHERE idUsuario = $id_Usuario";
     
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
     $resultado->execute();

    if ($resultado->rowCount() > 0) {
      echo json_encode("Usuario eliminado.");  
    }else {
      echo json_encode("No existe usuario con este ID.");
    //LOL
    }

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->post('/api/login', function(Request $request, Response $response){
  // ok postman
  $email = $request->getParam('email');
  $password = $request->getParam('password');

  $sql = "SELECT nombre, apellido, idUsuario, fNac, fotoPerfil, celular, tipoPerfil, descripcion, trayectoria, idCiudad FROM usuarios WHERE email = '$email' AND  password = '$password' ";


  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql); 

    if ($resultado->rowCount() > 0){
      $usuario = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($usuario);
    }else {
      echo json_encode("Error de email y/o contraseña");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->get('/api/perfil/{id}', function(Request $request, Response $response){
  // ok postman
  $id = $request->getAttribute('id');
  $sql = "SELECT nombre, apellido, fNac, email, fotoPerfil, celular, tipoPerfil, descripcion, trayectoria FROM usuarios WHERE idUsuario = $id";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql); 

    if ($resultado->rowCount() > 0){
      $usuario = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($usuario);
    }else {
      echo json_encode("No existen usuarios en la BBDD con este ID.");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->put('/api/editarPerfil/{id}', function(Request $request, Response $response){

  $id = $request->getAttribute('id');

  $nombre = $request->getParam('nombre');
  $apellido = $request->getParam('apellido');
  $fNac = $request->getParam('fNac');
  $email = $request->getParam('email');
  $password = $request->getParam('password');
  $fotoPerfil = $request->getParam('fotoPerfil'); 
  $celular = $request->getParam('celular');
  $tipoPerfil = $request->getParam('tipoPerfil');
  $descripcion = $request->getParam('descripcion');
  $trayectoria = $request->getParam('trayectoria');
  $idCiudad = $request->getParam('idCiudad');     
  
  $sql = "UPDATE usuarios SET
          nombre = :nombre,
          apellido = :apellido,
          fNac = :fNac,
          email = :email,
          password = :password,
          fotoPerfil = :fotoPerfil,
          celular = :celular,
          tipoPerfil = :tipoPerfil,
          descripcion = :descripcion,
          trayectoria = :trayectoria,
          idCiudad = :idCiudad
        WHERE idUsuario = $id";
     
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':nombre', $nombre);
    $resultado->bindParam(':apellido', $apellido);
    $resultado->bindParam(':fNac', $fNac);
    $resultado->bindParam(':email', $email);
    $resultado->bindParam(':password', $password);
    $resultado->bindParam(':fotoPerfil', $fotoPerfil);
    $resultado->bindParam(':celular', $celular);
    $resultado->bindParam(':tipoPerfil', $tipoPerfil);
    $resultado->bindParam(':descripcion', $descripcion);
    $resultado->bindParam(':trayectoria', $trayectoria);
    $resultado->bindParam(':idCiudad', $idCiudad);

    $resultado->execute();
    echo json_encode("Usuario modificado.");  

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->post('/api/publicacion/nuevo', function(Request $request, Response $response){
  // ok con postman
   $idUsuario = $request->getParam('idUsuario');
   $fecha = $request->getParam('fecha');
   $hora = $request->getParam('hora');
   $idUniversidad = $request->getParam('idUniversidad');
   $idSede = $request->getParam('idSede');
   $idCarrera = $request->getParam('idCarrera');
   $tecto = $request->getParam('texto');
   $likes = $request->getParam('likes');

  
  $sql = "INSERT INTO publicaciones (idUsuario, fecha, hora, idUniversidad, idSede, idCarrera, texto, likes) VALUES 
          (:idUsuario, :fecha, :hora, :idUniversidad, :idSede, :idCarrera, :texto, :likes)";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':fecha', $fecha);
    $resultado->bindParam(':hora', $hora);
    $resultado->bindParam(':idUniversidad', $idUniversidad);
    $resultado->bindParam(':idSede', $idSede);
    $resultado->bindParam(':idCarrera', $idCarrera);
    $resultado->bindParam(':texto', $texto);
    $resultado->bindParam(':likes', $likes);
    
    echo json_encode("Nuevo usuario guardado.");  

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->post('/api/newPost', function(Request $request, Response $response){
  // ok postman
  $idUsuario = $request->getParam('idUsuario');
  //$fecha = $request->getParam('fecha');
  //$hora = $request->getParam('hora');
  $idUniversidad = $request->getParam('idUniversidad');
  $idSede = $request->getParam('idSede');
  $idCarrera = $request->getParam('idCarrera');
  $texto = $request->getParam('texto');
  //$likes = $request->getParam('likes');

  $sql = "INSERT INTO publicaciones (idUsuario, fecha, hora, idUniversidad, idSede, idCarrera, texto, likes) VALUES 
  (:idUsuario, CURRENT_DATE, CURRENT_TIME, :idUniversidad, :idSede, :idCarrera, :texto, 0)";


  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':idUniversidad', $idUniversidad);
    $resultado->bindParam(':idSede', $idSede);
    $resultado->bindParam(':idCarrera', $idCarrera);
    $resultado->bindParam(':texto', $texto);
    $resultado->execute();
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage()." - ".$sql.'}';
  }
}); 

$app->post('/api/nuevaUniversidad', function(Request $request, Response $response){
  // ok postman
  $email = $request->getParam('email');
  $password = $request->getParam('password');
  $nombre = $request->getParam('nombre');
   $apellido = $request->getParam('apellido');
   $fNac = $request->getParam('fNac');
   $emailUni = $request->getParam('emailUni');
   $passwordUni = $request->getParam('passwordUni');
   $fotoPerfil = $request->getParam('fotoPerfil'); 
   $celular = $request->getParam('celular');
   $tipoPerfil = 'UNIVERSIDAD';
   $descripcion = $request->getParam('descripcion');
   $trayectoria = $request->getParam('trayectoria');
   $idCiudad = $request->getParam('idCiudad');     
  $sql = "SELECT nombre, apellido FROM usuarios WHERE email = '$email' AND  password = '$password' AND tipoPerfil='ADMIN'";


  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql); 


    if ($resultado->rowCount() > 0){
      $sql = "INSERT INTO usuarios (nombre, apellido, fNac, email, password, fotoPerfil, celular, 
              tipoPerfil, descripcion, trayectoria, idCiudad) 
              VALUES 
          (:nombre, :apellido, :fNac, :emailUni, :passwordUni, :fotoPerfil, :celular, 
          :tipoPerfil, :descripcion, :trayectoria, :idCiudad)";
          $resultado = $db->prepare($sql);

           $resultado->bindParam(':nombre', $nombre);
           $resultado->bindParam(':apellido', $apellido);
           $resultado->bindParam(':fNac', $fNac);
           $resultado->bindParam(':emailUni', $emailUni);
           $resultado->bindParam(':passwordUni', $passwordUni);
           $resultado->bindParam(':fotoPerfil', $fotoPerfil);
           $resultado->bindParam(':celular', $celular);
           $resultado->bindParam(':tipoPerfil', $tipoPerfil);
           $resultado->bindParam(':descripcion', $descripcion);
           $resultado->bindParam(':trayectoria', $trayectoria);
           $resultado->bindParam(':idCiudad', $idCiudad);
           $resultado->execute();
    
           
           echo("Universidad creada");
           $resultado = null;
          $db = null;
    }else {
      echo json_encode("Error de email y/o contraseña");
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 
$app->post('/api/likePost', function(Request $request, Response $response){
  // ok postman
  $idPublicacion = $request->getParam('idPublicacion');
  $idUsuario = $request->getParam('idUsuario');
  
  $sql = "INSERT INTO likes (idUsuario, idPublicacion, fechaHora) VALUES (:idUsuario, :idPublicacion, now() ) ";
  
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
// si se hizo el insert, usar 
    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':idPublicacion', $idPublicacion);
    //$resultado->bindParam(':fechaHora', $fechaHora);

    if ($resultado->execute()) {
      $sql = "UPDATE publicaciones SET likes = likes+1  WHERE idPublicacion=$idPublicacion";
      $resultado = $db->prepare($sql);
      $resultado->execute();
    }


    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
$app->get('/api/parati', function(Request $request, Response $response){
  // ok potzman
  $idCiudad = $request->getParam('idCiudad');
  $idUsuario = $request->getParam('idUsuario');
  $inicio = $request->getParam('inicio');
  $cantidad = $request->getParam('cantidad');
  $sql = "SELECT * FROM publicaciones WHERE idCiudad = $idCiudad ORDER BY fecha DESC, hora DESC LIMIT $inicio, $cantidad";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->query($sql);
    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':idCiudad', $idCiudad);
    $resultado->bindParam(':inicio', $inicio);
    $resultado->bindParam(':cantidad', $cantidad);
    if ($resultado->rowCount() > 0){
      $carreras = $resultado->fetchAll(PDO::FETCH_OBJ);
      echo json_encode($carreras);
    }else {
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 
$app->post('/api/solicitudAmistad', function(Request $request, Response $response){
  //semi-ok postman
  $idAmigo = $request->getParam('idAmigo');
  $idUsuario = $request->getParam('idUsuario');
  //$status = "P"; //P de pendiente; A de activo; R de rechazado
  
  $sql = "INSERT INTO amigos (idUsuario , idAmigo, status) VALUES (:idUsuario , :idAmigo , 'P') ";
  
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
    $resultado->bindParam(':idAmigo', $idAmigo);
    $resultado->bindParam(':idUsuario', $idUsuario);
    //$resultado->bindParam(':status', $status);
/*
    if ($resultado->execute()) {
      $resultado = $db->prepare($sql);
      
    }*/
    $resultado->execute();
    echo("Solicitud enviada");

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
$app->put('/api/modAmistad', function(Request $request, Response $response){
  //semi-ok postman
  $idAmigo = $request->getParam('idAmigo');
  $idUsuario = $request->getParam('idUsuario');
  $status = $request->getParam('status'); //P de pendiente; A de activo; R de rechazado
  
  $sql = "UPDATE amigos SET status = :status WHERE idUsuario=:idUsuario AND idAmigo=:idAmigo";
  //UPDATE publicaciones SET likes = likes+1  WHERE idPublicacion=$idPublicacion";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
    $resultado->bindParam(':idAmigo', $idAmigo);
    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':status', $status);
      //$resultado = $db->prepare($sql);
      $resultado->execute();
      echo("Solicitud enviada");


    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
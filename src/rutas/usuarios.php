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
      echo json_encode("No existen usuario en la BBDD con este ID.");
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
    }

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 



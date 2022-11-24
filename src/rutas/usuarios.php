<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

use PHPMailer\PHPMailer\PHPMailer;


$app = new \Slim\App;



//include '../phpmailer/PHPMailerAutoload.php';

/*
require __DIR__ . '/../../phpmailer/Exception.php';
require __DIR__ . '/../../phpmailer/PHPMailer.php';
require __DIR__ . '/../../phpmailer/SMTP.php';
*/


function enviarMail($asunto, $destinatario, $cuerpo) {


    $subject = $asunto;
    $emailFrom = "utell.skolltech@gmail.com";
    $emailReply = "utell.skolltech@gmail.com";
  
    $mensaje = $cuerpo;
  
    $mail = new PHPMailer;
    $mail->CharSet = 'UTF-8';
  
    /*$mail->SMTPDebug = 2;*/ 
    $mail->Username = 'utell.skolltech@gmail.com';                 // SMTP username
    $mail->Password = 'xpbcvlyxgmihvwic';                           // SMTP password
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  
    $mail->SMTPOptions = array(
        'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true
        )
      );
  
    $email = $destinatario;
  
      $mail->setFrom($emailFrom, 'U-Tell');
      $mail->addReplyTo($emailReply, 'U-Tell');
      $mail->addAddress($email);
      // $mail->addCC('jorgephi@gmail.com');   // copia oculta
  
      $mail->Port = 25;                                    // TCP port to connect to
  
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body    =  $mensaje;
  
      if($mail->send()) {
        echo '<br/>OK: '.$email.'<hr/>';
        $mailEnviado = 1;
      } else {
        echo '<br/>ERRORRRRRRRRRR<hr/>';
        $mailEnviado = 0;
      }
  

}





/*

Método HTTP	Descripción
POST	Crea un recurso nuevo.
GET	Recupera un recurso.
PUT	Actualiza un recurso existente.
DELETE	Suprime un recurso.


*/


$app->get('/api/', function(Request $request, Response $response){
    echo("Bienvenido a la API");

    //enviarMail("asunto", "jorgephi@gmail.com", "cuerpoMail");

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
   $instagram = $request->getParam('instagram');
   $twitter = $request->getParam('twitter');
   $facebook = $request->getParam('facebook');
  $sql = "INSERT INTO usuarios (nombre, apellido, fNac, email, password, fotoPerfil, celular, tipoPerfil, descripcion, trayectoria, idCiudad, instagram, twitter, facebook)
  VALUES
          (:nombre, :apellido, :fNac, :email, :password, :fotoPerfil, :celular, :tipoPerfil, :descripcion, :trayectoria, :idCiudad, :instagram, :twitter, :facebook)
  VALUES )";
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
    $resultado->bindParam(':instagram', $instagram);
    $resultado->bindParam(':twitter', $twitter);
    $resultado->bindParam(':facebook', $facebook);
    $resultado->execute();
 
    echo json_encode($db->lastInsertId());  
 
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// PUT Modificar cliente
$app->post('/api/usuarios/modificar/{id}', function(Request $request, Response $response){
 
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
  $instagram = $request->getParam('instagram');
  $twitter = $request->getParam('twitter');
  $facebook = $request->getParam('facebook');
 
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
          instagram = :instagram
          twitter = :twitter
          facebook = :facebook
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
    $resultado->bindParam(':instagram', $instagram);
    $resultado->bindParam(':twitter', $twitter);
    $resultado->bindParam(':facebook', $facebook);
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
$app->post('/api/usuarios/modificarPass', function(Request $request, Response $response){

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
      WHERE email = ':email' ";
      $resultado = $db->prepare($sql);
      $resultado->bindParam(':password', $password);
      $resultado->bindParam(':email', $email);
      $resultado->execute();
      echo json_encode("Contraseña modificada.");  
    }
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

// DELETE borar cliente 
$app->post('/api/usuarios/delete/{id}', function(Request $request, Response $response){
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

$app->post('/api/editarPerfil/{id}', function(Request $request, Response $response){

  $id = $request->getAttribute('id');

  $nombre = $request->getParam('nombre');
  $apellido = $request->getParam('apellido');
  $fNac = $request->getParam('fNac');
  $email = $request->getParam('email');
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
          :tipoPerfil, :descripcion, :trayectoria, :idCiudad);
          INSERT INTO universidades(nombre, email, password, celular, estado) 
          VALUES(:nombre, :emailUni,:passwordUni, :celular, 'ACTIVO')";
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
$app->get('/api/...', function(Request $request, Response $response){
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
$app->post('/api/modAmistad', function(Request $request, Response $response){
  // ok postman 
  $idAmigo = $request->getParam('idAmigo');
  $idUsuario = $request->getParam('idUsuario');
  $status = $request->getParam('status'); //P de pendiente; A de activo; R de rechazado
  
  $sql = "UPDATE amigos SET status = :status WHERE idUsuario=:idUsuario AND idAmigo=:idAmigo";

  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
    $resultado->bindParam(':idAmigo', $idAmigo);
    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':status', $status);
      //$resultado = $db->prepare($sql);
      $resultado->execute();


    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
$app->post('/api/reporte/nuevo', function(Request $request, Response $response){
  // ok postman
   $idPublicacion = $request->getParam('idPublicacion');
   $idUsuario = $request->getParam('idUsuario');
   $texto = $request->getParam('texto');
   $tipo = $request->getParam('tipo');

  
  $sql = "INSERT INTO reportes (idPublicacion, idUsuario, tipo, texto,  fechaHora) VALUES 
          (:idPublicacion, :idUsuario, :tipo, :texto,  now())";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':idPublicacion', $idPublicacion);
    $resultado->bindParam(':texto', $texto);
    $resultado->bindParam(':tipo', $tipo);
    $resultado->execute();    

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 
$app->post('/api/comentario/nuevo', function(Request $request, Response $response){
  //  ok postman
   $idPublicacion = $request->getParam('idPublicacion');
   $texto = $request->getParam('texto');
   $titulo = $request->getParam('titulo');
   $idUsuario = $request->getParam('idUsuario');
  $sql = "INSERT INTO comentarios (idPublicacion, title, texto,  fechahora, idUsuario) VALUES 
          (:idPublicacion, :titulo, :texto,  now(), :idUsuario)";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':idPublicacion', $idPublicacion);
    $resultado->bindParam(':titulo', $titulo);
    $resultado->bindParam(':texto', $texto);
    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->execute();    
    echo json_encode("Guiso");  

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->post('/api/mensaje/nuevo', function(Request $request, Response $response){
  //  ok postman
   $idRemitente = $request->getParam('idRemitente');
   $idDestinatario = $request->getParam('idDestinatario');
   $texto = $request->getParam('texto');

  $sql = "INSERT INTO mensajedirecto (idRemitente, idDestinatario, texto,  fhMensaje) VALUES 
          (:idRemitente, :idDestinatario, :texto,  now())";

  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':idRemitente', $idRemitente);
    $resultado->bindParam(':idDestinatario', $idDestinatario);
    $resultado->bindParam(':texto', $texto);
    
    $resultado->execute();    


    // notificacion

    $sql = "INSERT INTO notificaciones (idUsuario, titulo, texto, fhAlta) VALUES 
        (:idDestinatario, 'Tienes una nueva notificación', :texto,  now())";
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
    $resultado->bindParam(':idDestinatario', $idDestinatario);
    $resultado->bindParam(':texto', $texto);
    $resultado->execute();

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 

$app->get('/api/mensaje/recibir', function(Request $request, Response $response){
  //  ok postman
   $idReceptor = $request->getParam('idReceptor');
   $idRemitente = $request->getParam('idRemitente');
  $sql = "SELECT * FROM mensajedirecto WHERE idRemitente=:idRemitente AND idDestinatario=:idReceptor";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
    $resultado->bindParam(':idRemitente', $idRemitente);
    $resultado->bindParam(':idReceptor', $idReceptor);
    $resultado->execute();    
    $carreras = $resultado->fetchAll(PDO::FETCH_OBJ);
    if ($resultado->rowCount() > 0){
      
      echo json_encode($carreras);
      $sql = "UPDATE notificaciones SET
      fhLectura = now()
    WHERE idUsuario = :idReceptor AND fhLectura is NULL";

$resultado = $db->prepare($sql);
$resultado->bindParam(':idReceptor', $idReceptor);
$resultado->execute();    

}else {
    }

    

    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
}); 
$app->post('/api/favoritos/agregar', function(Request $request, Response $response){
  // ok postman
  $idUsuario = $request->getParam('idUsuario');
  $idPublicacion = $request->getParam('idPublicacion');

  $sql = "INSERT INTO favoritos (idUsuario, idPublicacion, fh, estado) VALUES 
  (:idUsuario, :idPublicacion, now(), 'GUARDADO')";


  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':idPublicacion', $idPublicacion);
    
    $resultado->execute();    
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
$app->post('/api/favoritos/eliminar', function(Request $request, Response $response){
  // ok postman
  $idUsuario = $request->getParam('idUsuario');
  $idPublicacion = $request->getParam('idPublicacion');

  $sql = "DELETE FROM favoritos WHERE idUsuario=:idUsuario AND idPublicacion=:idPublicacion";

  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':idPublicacion', $idPublicacion);
    
    $resultado->execute();    
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
$app->get('/api/tuRed', function(Request $request, Response $response){
  // ok potzman
  $idUsuario = $request->getParam('idUsuario');
  $sql = "SELECT * FROM publicaciones WHERE idUsuario IN 
  (SELECT idAmigo FROM amigos WHERE status='A' AND idUsuario=:idUsuario)";
  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);    
    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->execute();

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
$app->get('/api/parati', function(Request $request, Response $response){
  // ok potzman
  $idUsuario = $request->getParam('idUsuario');

  $sql = "SELECT
  publicaciones.idPublicacion,
  publicaciones.idUsuario,
  publicaciones.fecha,
  publicaciones.hora,
  publicaciones.idUniversidad,
  publicaciones.idSede,
  publicaciones.idCarrera,
  publicaciones.texto,
  publicaciones.likes,
  publicaciones.idCiudad,
  universidades.nombre as universidad,
  usuarios.nombre,
  usuarios.apellido,
  carrerassedes.descripcion
  FROM
  publicaciones
  Inner Join universidades ON publicaciones.idUniversidad = universidades.idUniversidad
  Inner Join usuarios ON publicaciones.idUsuario = usuarios.idUsuario
  Inner Join sedes ON universidades.idUniversidad = sedes.idUniversidad AND publicaciones.idSede = sedes.idSede
  Inner Join carrerassedes ON publicaciones.idCarrera = carrerassedes.idCarrera AND publicaciones.idSede = carrerassedes.idSede
  Inner Join ciudades ON publicaciones.idCiudad = ciudades.idCiudad
  
  
  WHERE 
  publicaciones.idUniversidad IN (SELECT idUniversidad FROM preferencias WHERE idUsuario=:idUsuario)
  OR
  publicaciones.idCarrera IN (SELECT idCarrera FROM preferencias WHERE idUsuario=:idUsuario)
  OR
  publicaciones.idCiudad IN (SELECT idCiudad FROM preferencias WHERE idUsuario=:idUsuario)";


  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);    
    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->execute();
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


$app->post('/api/preferencias/nuevo', function(Request $request, Response $response){
  // ok postman
  $idUsuario = $request->getParam('idUsuario');
  $idCarrera = $request->getParam('idCarrera');
  $idUniversidad = $request->getParam('idUniversidad');
  $idCiudad = $request->getParam('idCiudad');

  $sql = "INSERT INTO preferencias (idUsuario, idCarrera, idUniversidad, idCiudad) VALUES 
  (:idUsuario, :idCarrera, :idUniversidad, :idCiudad)";


  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);

    $resultado->bindParam(':idUsuario', $idUsuario);
    $resultado->bindParam(':idCarrera', $idCarrera);
    $resultado->bindParam(':idUniversidad', $idUniversidad);
    $resultado->bindParam(':idCiudad', $idCiudad);
    
    $resultado->execute();    
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
$app->post('/api/recuperarPass', function(Request $request, Response $response){
  // ok postman 


  // en lugar de la variable email, decia idAmigo. Ya probe y anda ok!
  $email = $request->getParam('email'); 
  $codigo = rand(1111, 9999);
  $sql = "UPDATE usuarios SET codigo = :codigo WHERE email=:email";

  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
    $resultado->bindParam(':email', $email);
    $resultado->bindParam(':codigo', $codigo);
    $resultado->execute();
    echo("funca");
    enviarMail("Recuperacion de contraseña", $email, "Tu codigo de recuperacion es:".$codigo);
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
//
//enviarMail("asunto", "jorgephi@gmail.com", "cuerpoMail");
$app->post('/api/confirRec', function(Request $request, Response $response){
  // 
  $email = $request->getParam('email');
  $codigoU = $request->getParam('codigoU');
  $newPass = $request->getParam('newPass'); 
  $sql = "SELECT * FROM usuarios WHERE email=:email AND codigo=:codigo";

  try{
    $db = new db();
    $db = $db->conectDB();
    $resultado = $db->prepare($sql);
    $resultado->bindParam(':email', $email);
    $resultado->bindParam(':codigo', $codigoU);
    $resultado->bindParam(':newPass', $newPass);
    if ($resultado->rowCount() > 0){     
        $sql = "UPDATE usuarios SET password=:password WHERE email=:email";
      /*  "UPDATE usuarios SET
        password = :password,
      WHERE email = ':email' ";*/
    }else {
      echo("Error: codigo equivocado");
    }
    $resultado->execute();
    echo("funca");
    $resultado = null;
    $db = null;
  }catch(PDOException $e){
    echo '{"error" : {"text":'.$e->getMessage().'}';
  }
});
//hola jorge, quieres un globito que flota por arte de magia?
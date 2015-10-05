<html>
    <head>
        <title>prueba</title>
        <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
           <title>Bootstrap 101 Template</title>

           <!-- Bootstrap -->
          <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
          <link href="bootstrap-3.3.5-dist/css/signin.css" rel="stylesheet">

         <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
          <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
          <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
           <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="container">
        <form action="formulario.php" method="POST" class="form-signin">
            <h1 class="form-signin-heading">Hola Mundo!!!</h1>
        <label>Introduzca nombre: </label>
        <input class="form-control" type="text" name="nombre">
        <label>Introduzca Ap Paterno : </label>
        <input class="form-control" type="text" name="paterno">
        <label>Introduzca Ap Materno : </label>
        <input class="form-control" type="text" name="materno">
        <label>Introduzca Telefono: </label>
        <input class="form-control" type="text" name="telefono">
        <label>Introduzca Ciudad: </label>
        <input class="form-control" type="text" name="ciudad">
        <label>Introduzca Pais: </label>
        <input class="form-control" type="text" name="pais">
        <label>Introduzca Correo: </label>
        <input class="form-control" type="text" name="correo">
        <label>Introduzca Dirección: </label>
        <input class="form-control" type="text" name="direccion">
        <button type="submit" class="btn btn-lg btn-primary btn-block">Enviar</button>
        </form>
        </div>
        
    </body>
</html>
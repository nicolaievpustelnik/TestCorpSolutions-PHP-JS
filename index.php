<?php 
include_once 'loader.php';
if($_POST){
    $usuario = new Usuario($_POST['userName'],$_POST['email'],$_POST['password'],$_POST['passwordRepeat'],$_POST['ciudadFavorita']);
    $errores = Validador::validarDatos($usuario);

    // var_dump($errores);
    // exit;

    if(!$errores){
        $usuario->create($bd);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- bootstrap -->
    <link rel="stylesheet" href="css/master.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif&display=swap" rel="stylesheet">
    <!-- animate css -->
    <link rel="stylesheet" href="animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <title>CorpSolutions</title>
</head>


<body>
    <div class="container-fluit">
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <a class="navbar-brand col-9" href="#"><img src="./img/navCorp1.png" alt="" width="130" height="40"></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link text-white" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">FAQ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Link</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-white disabled" href="#" tabindex="-1" aria-disabled="true">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
        
        <main class="text-center">
            
            <section class="text-center">
                <h1 id="h1" class="mt-5">Regístrate</h1>
            </section>

            <div class="_registro">       

                <article id="person">
                    <ion-icon class="_iconPerson mt-4" name="person-add"></ion-icon>
                </article>

                <article class="form-group">
                    <label class="text-white col-12 _cuadro-regis">Ciudad</label>
                    <input require id="city" class="text-center _inputsearch _cuadro-regis col-3" placeholder="Ingrese la ciudad"></input>
                    <button id="getWeatherForcast" class="_serch"><ion-icon name="search"></ion-icon></button>
                    <div class="text-white ShowWeatherForcast"></div>
                </article>


                <form  action="index.php" method="POST">

                    <section class=" text-center">

                        <article class="form-group mt-3 text-center">
                            <label class="_cuadro-regis text-white" for="userName">Nombre de usuario</label>
                            <input  name="userName" type="text" value="<?php $baseJson->reincidencia('userName');?>" class="_cuadro-regis form-control col-4 text-center" id="userName" placeholder="Nombre de usuario">
                        </article>
                        <!--Impresion de error USER NAME-->
                        <?php if(isset($errores['userName'])){ ?>
                            <div class="alert alert-danger" role="alert">
                            <?= $errores['userName']; ?>
                            </div>
                        <?php } ?>
                        <!---->

                        <article class="form-group">
                            <label class="text-white _cuadro-regis" for="email">Correo electrónico</label>
                            <input  name="email" type="email" class="_cuadro-regis form-control col-4 text-center" id="email" aria-describedby="emailHelp" placeholder="Ingrese su correo" value="">
                        </article>

                        <article class="form-group">
                            <label class="text-white _cuadro-regis col-12" for="password">Contraseña</label>
                            <input  name="password" type="password" class="password _inputsearch _cuadro-regis  col- text-center"  aria-describedby="passwordHelp" placeholder="Ingrese su contraseña" value="">
                            <ion-icon class="icono _eyeicon" name="eye"></ion-icon><ion-icon class="icono2 _eyeicon" name="eye-off"></ion-icon>
                        </article>

                        <article class="form-group">
                            <label class="text-white _cuadro-regis col-12" for="passwordRepeat">Confirmar contraseña</label>
                            <input  name="passwordRepeat" type="password" class="password _inputsearch _cuadro-regis col- text-center" aria-describedby="passwordRepeatHelp" placeholder="Confirme su contraseña" value="">
                            <ion-icon class="icono _eyeicon" name="eye"></ion-icon><ion-icon class="icono2 _eyeicon" name="eye-off"></ion-icon>
                        </article>

                        <article class="form-group">
                            <label class="text-white _cuadro-regis" for="ciudadFavorita">Ciudades Favoritas</label>
                            <input  name="ciudadFavorita" type="text" class="_cuadro-regis form-control col-4 text-center" id="ciudadFavorita" aria-describedby="ciudadFavoritaHelp" placeholder="Ingrese su ciudades favoritas" value="">
                        </article>

                        <button type="submit" class="_registrarBot btn btn-secondary">Registrarme</button>

                    </section>

                </form>  

            </div>

        </main>


    </div>
    
<!-- ionicons -->
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<!-- bootstrap -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- js -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous" ></script>
  <script type="text/javascript" src="js/style.js"></script>
</body>
</html>
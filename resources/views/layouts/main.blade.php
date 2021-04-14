<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
          rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="script" href="{{asset('styles.sass')}}">
</head>
<body>
<nav class="navbar navbar-light bg-main">

    <div>

        <h6>Login</h6>
        <form class="usser" action="{{route('ingreso.form')}}" method="post">
            {{csrf_field()}}
            <center>
                @if(isset($estatus))
                    @if($estatus == "success")
                        <label class="text-success">{{$mensaje}}</label>
                    @elseif($estatus == "error")
                        <label class="text-warning">{{$mensaje}}</label>
                    @endif
                @endif
            </center>
            <input type="submit" value="Ingresar" class="button" name="login">
            <input type="email" name="correo" placeholder="Correo">
            <input type="password" name="contrasenia" placeholder="Contraseña">
        </form>
    </div>
    <div align="right">
        <a class="navbar-brand m-auto" >
            <img src="{{asset('images/unnamed.jpg')}}" width="120" alt="" loading="lazy">
        </a>
    </div>
</nav>


<!-- Contenido -->
<section class="container-fluid content">
    <!-- Categorías -->
    <div class="row justify-content-center">
        <div class="col-10 col-md-12">
            <nav class="text-center my-5">
                <a  class="mx-3 pb-3 link-category d-block d-md-inline selected-category" >Red Social</a>
                <a  class="mx-3 pb-3 link-category d-block d-md-inline" >Laravel</a>
                <a  class="mx-3 pb-3 link-category d-block d-md-inline" >Desarrollo web</a>
            </nav>

        </div>
    </div>

    <!-- FOR M -->
    <section class="container-fluid content">

        <!-- Posts -->
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row">
                    <!-- Post 1 -->
                    <div class="col-md-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 18rem;">
                            <label class="text-danger">
                                @if(isset($estatus))
                                    <label class="text-danger">{{$mensaje}}</label>
                                @endif
                            </label>
                            <h5>Registro para nuevos usuarios</h5>
                            <form action="{{route('registro.form')}}" method="post">
                                {{csrf_field()}}
                                <input type="text" name="nombre" placeholder="Nombre">
                                <br>
                                <br>
                                <input type="text" name="apellido" placeholder="Apellido">
                                <br>
                                <br>
                                <input type="number" placeholder="Edad" name="edad">
                                <br>
                                <br>
                                <input type="email" name="correo" placeholder="Correo">
                                <br>
                                <br>
                                <input type="password" placeholder="Contraseña" name="contrasenia">
                                <br>
                                <br>
                                <input type="password" placeholder="Repetir Contraseña" name="contrasenia2">
                                <br>
                                <br>
                                <input type="radio" placeholder="Hombre" name="masculino" value="M">Masculino
                                <input type="radio" placeholder="Hombre" name="femenino" VALUE="F">Femenino
                                <br>
                                <br>
                                <input type="submit" value="Registrar" class="button" name="registro">
                            </form>
                        </div>
                    </div>
                    <!-- Post 2 -->
                    <div class="col-md-4 col-12 justify-content-center mb-5">
                        <div class="card m-auto" style="width: 50rem;">
                            <img class="card-img-top"  src="{{asset('images/K4.png')}}">

                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <!-- Paginador -->

                </div>
            </div>
        </div>
    </section>
    <footer class="container-fluid bg-main">
        <div class="row text-center p-4">
            <div class="mb-3">
                <img src="{{asset('images/logo.png')}}" width="120" id="logofooter">
            </div>
            <div id="col-md-10">

                <p class="mt-3">Copyright © 2021 neutroREM, RedSocial. <br> Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>

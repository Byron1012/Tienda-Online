<script type='text/javascript' src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
        <script>
            $(window).load(function () {//la funcion window.load carga el script por defecto
                function persona() {
                    var nombre
                    var status
                }

                function ponerDatos(nombre) {
                    this.nombre = nombre;
                    this.status = "";
                }
                function Saludo() {
                    this.status = "Saludo";
                    var nombre = this.nombre;
                    var idDiv = "#" + nombre;
                    var div = $(idDiv);
                    $.ajax({
                        async: true,
                        cache: false,
                        dataType: "html",
                        type: 'POST',
                        url: "ajax.php",
                        data: "nombre=" + nombre,
                        success: function (respuesta) {
                            div.html(respuesta);
                        },
                        beforeSend: function () {},
                        error: function (objXMLHttpRequest) {}
                    });
                }
                function terminar() {
                    var nombre = this.nombre;
                    var idDiv = "#" + nombre;
                    var div = $(idDiv);
                    $.ajax({
                        async: true,
                        cache: false,
                        dataType: "html",
                        type: 'POST',
                        url: "ajax2.php",
                        data: "nombre=" + nombre,
                        success: function (respuesta) {
                            div.html(respuesta);
                        },
                        beforeSend: function () {},
                        error: function (objXMLHttpRequest) {}
                    });
                }
                persona.prototype.ponerDatos = ponerDatos;
                persona.prototype.Saludo = Saludo;
                persona.prototype.terminar = terminar;
                var usuario = new persona();
                usuario.ponerDatos('usuariio');
                usuario.Saludo();
                usuario.terminar();
            });
        </script>
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <ol class="breadcrumb" style="background-color: #ffffff;">
                    <li class="breadcrumb-item"><a href="#"><span>LOGIN</span></a></li>
                    <li class="breadcrumb-item active"><span>Iniciar Sesión</span></li>
                </ol>
                <h2 class="text-info">Iniciar Sesión<br></h2>
                <h2 class="h1" id="usuariio" style="color:blue"></h2>
                <p>Ingrese a su email y contraseña con la cual se registro.</p>
            </div>
            <form action="?c=Usuario&a=CargarLogin" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="email">Correo</label><input class="form-control item" type="email" id="correo" name="correo" required=""></div>
                <div class="form-group"><label for="password">Contraseña</label><input class="form-control" type="password" id="contrasena" name="contrasena" required=""></div>
                <button class="btn btn-primary btn-block" type="submit">Iniciar Sesión</button></form>
        </div>
    </section>
</main>
<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <ol class="breadcrumb" style="background-color: #ffffff;">
                    <li class="breadcrumb-item"><a href="#"><span>LOGIN</span></a></li>
                    <li class="breadcrumb-item active"><span>Registro</span></li>
                </ol>
                <h2 class="text-info">Registro</h2>
                <p>Ingrese los siguientes datos.</p>
            </div>
            <form action="?c=Usuario&a=CrearRegistro" method="post" enctype="multipart/form-data">
                <div class="form-group"><label for="name">Nombre</label><input class="form-control item" type="text" id="nombre" name="nombre" required=""></div>
                <div class="form-group"><label for="email">Correo</label><input class="form-control item" type="email" id="correo" name="correo" required=""></div>
                <div class="form-group"><label for="password">Contraseña</label><input class="form-control item" type="password" id="contrasena" name="contrasena" required=""></div>
                <button class="btn btn-primary btn-block" type="submit">Registrarse</button>
            </form>
        </div>
    </section>
</main>
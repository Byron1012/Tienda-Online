<main class="page contact-us-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Contactos</h2>
                <p>Dejenos saber su opinio.</p>
            </div>
            <form action="?c=Contactos&a=Registrar" method="post" enctype="multipart/form-data">
                <div class="form-group"><label>Nombre</label><input class="form-control" type="text" id="nombre" name="nombre" required=""></div>
                <div class="form-group"><label>Asunto</label><input class="form-control" type="text" id="asunto" name="asunto" required=""></div>
                <div class="form-group"><label>Correo</label><input class="form-control" type="correo" id="correo" name="correo" required=""></div>
                <div class="form-group"><label>Mensaje</label><textarea class="form-control" id="mensaje" name="mensaje" required=""></textarea></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Enviar</button></div>
            </form>
        </div>
    </section>
</main>
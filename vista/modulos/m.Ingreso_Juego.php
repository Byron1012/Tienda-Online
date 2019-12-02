<main class="page registration-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <ol class="breadcrumb" style="background-color: #ffffff;">
                    <li class="breadcrumb-item"><a href="#"><span>ADMIN</span></a></li>
                    <li class="breadcrumb-item"><a href="index.php?c=Juego&a=Inventario"><span>Inventario</span></a></li>
                    <li class="breadcrumb-item active"><span>Ingreso de productos</span></li>
                </ol>
                <h2 class="text-info"><?php echo $alm->id != null ? "Editar Producto" : 'Nuevo Registro'; ?> de Video Juego</h2>
                <p><?php echo $alm->id != null ? "Modifique" : 'Ingrese'; ?> los siguientes datos.</p>
            </div>
            <form action="?c=Juego&a=CrearRegistroJuego" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
                <input type="hidden" name="url" value="<?php echo $alm->url; ?>" />
                
                <div class="form-group"><label for="name">Nombre</label>
                    <!-- Start: #nombre --><input class="form-control item" type="text" value="<?php echo $alm->nombre; ?>" id="nombre" name="nombre" required="">
                    <!-- End: #nombre -->
                </div>
                <div class="form-group"><label for="password">Cantidad</label><input class="form-control item" type="number" value="<?php echo $alm->cantidad; ?>" id="cantidad" name="cantidad" required=""></div>
                <div class="form-group"><label for="Descuento">Descuento</label><input class="form-control item" type="number" value="<?php echo $alm->descuento; ?>" id="descuento" name="descuento" required=""></div>
                <div class="form-group"><label for="name">Precio</label><input class="form-control item" type="number" value="<?php echo $alm->precio; ?>" id="precio" name="precio" required="" step="0.01"></div>
                <div class="form-group"><label for="name">Subir Imagen</label>
                    <div class="input-group">
                        <div class="input-group-prepend"><input type="file" id="imagen"  name="imagen" src="" class="imagen" <?php echo $alm->id != null ? " " : 'required=""'; ?> accept="image/*"></div>
                        <?php if($alm->id>0){ ?>
                        <div>
                            <label class="text-justify"><br>La imagen ingresada anteriormente es esta:</label>
                            <div><img src="<?php echo $alm->url; ?>" style="width: 100px;height: 100px;"></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="form-group"><label for="password">Categoria</label><select class="form-control item" value="<?php echo $alm->categoria; ?>" id="categoria" name="categoria" ><optgroup label="¿A que categoria pertenece este video juego?"><option value="Acción" selected="">Acción</option><option value="Aventura">Aventura</option><option value="Deportes">Deportes</option><option value="Estrategias">Estrategias</option><option value="Carreras">Carreras</option><option value="Terror">Terror</option></optgroup></select></div>
                <div
                    class="form-group"><label for="password">Edición Limitada</label><select class="form-control item" value="<?php echo $alm->edicionLimitada; ?>" id="edicionLimitada" name="edicionLimitada"><optgroup label="¿Es edición limitada?"><option value="Si" selected="">Si</option><option value="No">No</option></optgroup></select></div>
                <div
                    class="form-group"><label for="password">Incluye DLC</label><select class="form-control item" value="<?php echo $alm->incluyeDLC; ?>" id="incluyeDLC" name="incluyeDLC"><optgroup label="¿Incluye DLC?"><option value="Si" selected="">Si</option><option value="No">No</option></optgroup></select></div>
                <div class="form-group"><label for="password">Descripción Corta</label><textarea class="form-control form-control-lg item" id="descripcionCorta" name="descripcionCorta" required=""><?php echo $alm->descripcionCorta; ?></textarea></div>
                <div class="form-group"><label for="password">Descripción Larga</label></div><textarea class="form-control form-control-lg item" id="descripcionLarga" name="descripcionLarga" required=""><?php echo $alm->descripcionLarga; ?></textarea>
                <div class="form-group">
                    <div class="form-row" style="padding-left: 0px;padding-bottom: 0px;padding-right: 0px;padding-top: 18px;">
                        <div class="col-md-6"><button class="btn btn-primary btn-block" type="submit">Guardar</button></div>
                        <div class="col-md-6"><button class="btn btn-danger btn-block" type="reset">Reiniciar</button></div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
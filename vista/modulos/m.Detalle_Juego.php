<main class="page product-page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <ol class="breadcrumb" style="background-color: #ffffff;">
                    <li class="breadcrumb-item"><a href="index.php?c=Juego&a=CargarCatalogo"><span>CATALOGO</span></a></li>
                    <li class="breadcrumb-item active"><span>PRODUCTO</span></li>
                </ol>
                <h2 class="text-info">Video Juego</h2>
                <p>Detalle mas especifico del video juego.</p>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery">
                                <div class="sp-wrap">
                                    <a href="<?php echo $alm->url; ?>">
                                        <img class="img-fluid d-block mx-auto" src="<?php echo $alm->url;?>" alt="Imagen de juego">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3><?php echo $alm->nombre;?></h3>
                                <div class="price">
                                    <?php if($alm->descuento>0){?>
                                    <h3>Descuento: <?php echo $alm->descuento;?>%</h3>
                                    <?php }?>
                                    <h3>$<?php echo $alm->precio;?></h3>
                                </div>
                                <div class="rating"><a class="btn btn-primary" role="button" href="index.php?c=Carrito&a=AgregarCarrito&IdJuego=<?php echo $alm->id; ?>" style="margin: 0px;padding-top: 10px;padding-right: 20px;padding-bottom: 10px;padding-left: 12px;"><i class="icon-basket"></i>Añadir al carrito</a></div>
                                <div class="summary">
                                    <p><?php echo $alm->descripcionCorta;?><br></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div>
                        <ul class="nav nav-tabs" id="myTab">
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" id="description-tab" href="#description">Descripción</a></li>
                            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" id="specifications-tabs" href="#specifications">Especificaciones</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active fade show description" role="tabpanel" id="description">
                                <p><?php echo $alm->descripcionLarga;?><br></p>
                            </div>
                            <div class="tab-pane fade fade show specifications" role="tabpanel" id="specifications">
                                <div class="table-responsive table-bordered">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="stat">Categoria</td>
                                                <td><?php echo $alm->categoria;?></td>
                                            </tr>
                                            <tr>
                                                <td class="stat">Cantidad</td>
                                                <td><?php echo $alm->cantidad;?></td>
                                            </tr>
                                            <tr>
                                                <td class="stat">Precio</td>
                                                <td>$<?php echo $alm->precio;?></td>
                                            </tr>
                                            <?php if($alm->descuento>0){?>
                                            <tr>
                                                <td class="stat">Descuento</td>
                                                <td><?php echo $alm->descuento;?>%</td>
                                            </tr>
                                            <?php }?>
                                            <tr>
                                                <td class="stat">Incluye DLC</td>
                                                <td><?php echo $alm->incluyeDLC;?></td>
                                            </tr>
                                            <tr>
                                                <td class="stat">Edición Limitada</td>
                                                <td><?php echo $alm->edicionLimitada;?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


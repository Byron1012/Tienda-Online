<main class="page shopping-cart-page">
    <section class="clean-block clean-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Carrito de Compras</h2>
                <p>Detalle de todos los productos que ha seleccionado.</p>
            </div>
            <div class="content">
                <form action="?c=Carrito&a=Facturar" method="post" enctype="multipart/form-data">
                    <div class="row no-gutters">

                        <div class="col-md-12 col-lg-8">
                            <div class="items">
                                <?php
                                $alm = new Carrito();
                                $alm->id_usuario = $_SESSION['id'];
                                //echo count($alm);
                                //$alm->id_usuario;
                                $factura = new Factura();
                                $factura->id_usuario = $_SESSION['id'];
                                $factura->subtotal = 0;
                                $factura->total = 0;
                                ?>
                                <?php foreach ($this->model->Obtener($alm) as $r): ?>
                                    <?php
                                    ?>
                                    <div class="product">
                                        <div class="row justify-content-center align-items-center">
                                            <div class="col-md-3">
                                                <div class="product-image"><img class="img-fluid d-block mx-auto image" src="<?php echo $r->url; ?>"></div>
                                            </div>
                                            <div class="col-md-5 product-info"><a class="product-name" href="index.php?c=Juego&a=DetalleJuego&id=<?php echo $r->id_juego; ?>"><?php echo $r->nombre; ?></a>
                                                <div class="product-specs">
                                                    <div><span>Incluye DLC:&nbsp;</span><span class="value"><?php echo $r->incluyeDLC; ?></span></div>
                                                    <div><span>Edición Limitada:&nbsp;</span><span class="value"><?php echo $r->edicionLimitada; ?></span></div>
                                                    <div><span>Descuento:&nbsp;</span><span class="value"><?php echo $r->descuento; ?>%</span></div>
                                                </div>
                                                <button class="btn btn-danger btn-sm" type="button" id="IdJuegoCarrito" data-id="<?php echo $r->id; ?>" value="<?php echo $r->id; ?>" data-toggle="modal" data-target="#ModalEliminar">Eliminar</button></div>
                                            <!--
                                                <div class="col-6 col-md-2 quantity"><label class="d-none d-md-block" for="quantity">Cantidad</label><input type="number" id="number" class="form-control quantity-input" value="<?php echo $r->cantidad_carrito; ?>" disabled></div>
                                            -->
                                                <div class="col-6 col-md-2 price"><span>$<?php echo $r->precio; ?></span></div>
                                        </div>
                                    </div>
                                    <?php
                                    $PrecioDescuento = 0;
                                    $PrecioDescuento = ($r->precio * $r->descuento) / 100;
                                    $factura->subtotal = $factura->subtotal + $r->precio - $PrecioDescuento;
                                    $factura->total = $factura->subtotal + $PrecioDescuento;
                                    ?>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $alm->id_usuario; ?>" />
                        <input type="hidden" name="subtotal" value="<?php echo $factura->subtotal; ?>" />
                        <input type="hidden" name="iva" value="<?php echo ($factura->subtotal * 12) / 100; ?>" />
                        <input type="hidden" name="total" value="<?php echo $factura->total; ?>" />

                        <div class="col-md-12 col-lg-4">
                            <div class="summary">
                                <h3>Total</h3>
                                <h4><span class="text">Subtotal</span><span class="price">$<?php echo $factura->subtotal; ?></span></h4>
                                <h4><span class="text">Iva 12%</span><span class="price">$<?php echo ($factura->subtotal * 12) / 100; ?></span></h4>
                                <h4><span class="text">Total</span><span class="price">$<?php echo $factura->total; ?></span></h4>
                                <button class="btn btn-primary btn-block btn-lg" type="submit">Comprar</button></div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </section>
    <div class="modal fade" role="dialog" tabindex="-1" id="ModalEliminar">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><strong>Desea eliminar este video juego?</strong></h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                <div class="modal-body">
                    <p>Seleccione "Eliminar" a continuación si está listo para eliminar el juego.<br></p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Cerrar</button>
                    <button class="btn btn-danger" name="IdJuegoCarrito" id="IdJuegoCarrito" type="button" onclick="EliminarJuegoCarrito()">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</main>
<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Catalogo de Video Juegos&nbsp;</h2>
                <p>Disfruta de una gran variedad de juegos que tenemos para ti.</p>
            </div>
            <div class="content">
                <div class="row">
                    <?php foreach ($this->model->Listar() as $r): ?>
                    <div class="col-sm-6 col-md-4 product-item">
                        <div class="product-container" style="padding: 0px 15px;margin: 22px;">
                            <div class="row">
                                <div class="col-md-12"><a class="product-image" href="index.php?c=Juego&a=DetalleJuego&id=<?php echo $r->id; ?>" style="margin: 12px 0px 18px;"><img src="<?php echo $r->url; ?>" style="width: 160px;height: 200px;"></a></div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <h2><a href="#"><?php echo $r->nombre; ?></a></h2>
                                </div>
                                <div class="col-4">
                                    <p class="product-price"><?php echo $r->cantidad; ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p class="product-description"><?php echo $r->descripcionCorta; ?></p>
                                    <div class="row">
                                        <div class="col-6"><a href="index.php?c=Juego&a=DetalleJuego&id=<?php echo $r->id; ?>"><button class="btn btn-light" type="button">Comprar!</button></a></div>
                                        <div class="col-6">
                                            <p class="product-price">$<?php echo $r->precio; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- 
                <nav style="padding: 10px;">
                    <ul class="pagination">
                        <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>-->
            </div>
        </div>
    </section>
</main>